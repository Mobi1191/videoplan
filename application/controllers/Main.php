<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $isLoggedIn = $this->session->userdata('isloggedin');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            redirect('/login');
        }
       
        $this->load->model('user_model');
    }

	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('main');
		$this->load->view('includes/footer');
	}

	public function logo_upload() {
		if(isset($_FILES["logoimagefile"]["type"]))
		{
		    $validextensions = array("jpeg", "jpg", "png", "JPG", "PNG");
		    $temporary = explode(".", $_FILES["logoimagefile"]["name"]);
		    $file_extension = end($temporary);
		    if ((($_FILES["logoimagefile"]["type"] == "image/png") || ($_FILES["logoimagefile"]["type"] == "image/jpg") || ($_FILES["logoimagefile"]["type"] == "image/jpeg")
		        ) && ($_FILES["logoimagefile"]["size"] < 100000000)//Approx. 100kb files can be uploaded.
		        && in_array($file_extension, $validextensions)) {
		        if ($_FILES["logoimagefile"]["error"] > 0)
		        {
		            echo json_encode(array('success' => '0', 'msg' => $_FILES["logoimagefile"]["error"]));
		        }
		        else
		        {
		            $sourcePath = $_FILES['logoimagefile']['tmp_name']; // Storing source path of the file in a variable
		            $targetPath = FCPATH."/assets/uploads/profile/";//.$_FILES['logoimagefile']['name']; // Target path where
		            $ext = pathinfo($_FILES['logoimagefile']['name'], PATHINFO_EXTENSION);
		            $dest_filename = md5(uniqid(rand(),true)).'.'.$ext;
		            move_uploaded_file($sourcePath,$targetPath.$dest_filename) ; // Moving Uploaded file
		            echo json_encode(array(
		                'success' => '1',
		                'msg'     => "<span id='success'>Uploaded Successfully</span><br/>",
		                'name'    => $dest_filename));
		        }
		    }
		    else
		    {
		        echo json_encode(array('success' => '0', 'msg' => "<span id='invalid'>***Invalid file Size or Type***<span>"));
		    }
		}
	}

	function validate_phoneUS($number){
	    $numStripX = array('(', ')', '-', '.', '+');
	    $numCheck = str_replace($numStripX, '', $number); 
	    $firstNum = substr($number, 0, 1);
	    if(($firstNum == 0) || ($firstNum == 1)) {return false;}
	    elseif(!is_numeric($numCheck)){return false;}
	    elseif(strlen($numCheck) > 10){return false;}
	    elseif(strlen($numCheck) < 10){return false;}
	    else{
	        $formats = array('###-###-####', '(###) ###-####', '(###)###-####', '##########', '###.###.####', '(###) ###.####', '(###)###.####');
	        $format = trim(preg_replace("/[0-9]/", "#", $number));
	        return (in_array($format, $formats)) ? true : false;
	    }
	}

	public function saveprofile() {

		$this->form_validation->set_rules('name_or_business','name_or_business','trim|required');
		// $this->form_validation->set_rules('logo_image','logo_image','trim|required');
		$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|max_length[128]');
        // $this->form_validation->set_rules('user_pwd', 'Password', 'required|max_length[32]');
        $this->form_validation->set_rules('cell_number','cell_number','trim|required');

		if($this->form_validation->run() == FALSE)
		{
		    echo json_encode(array('success' => '0', 'msg' => 'Parameters are invalid'));
		    exit();
		} else {
		    $name_or_business = $this->input->post('name_or_business');
		    $cell_number = $this->input->post('cell_number');
		    $user_email = $this->input->post('user_email');
		    $user_name = $this->input->post('user_name');
		    $user_pwd = $this->input->post('user_pwd');
		    $logo_image = $this->input->post('logo_image');

		    if (!$this->validate_phoneUS($cell_number)) {
		     echo json_encode(array('success' => '0', 'msg' => 'Phone number is invailid!'));
		        exit();   
		    }

		    $data['name_or_business'] 	= $name_or_business;
		    $data['cell_number']		= $cell_number;
		    $data['user_email']			= $user_email;
		    $data['user_name']			= $user_name;
		    $data['logo_image']			= $logo_image == "" ? $this->session->userdata('logo_image') : $logo_image;

		    $this->session->set_userdata($data);
		    if ($user_pwd != ""){
		    	$data['password'] = password_hash($user_pwd, PASSWORD_DEFAULT);
		    }

		    $this->user_model->updateUserProfile($this->session->userdata('user_id'), $data);
		    echo json_encode(array('success' => '1', 'msg' => 'Profile is Saved Successfully!'));
		    exit();  
		    
		}

	}

	public function removetokenandgotogooglelogin() {
		$this->session->set_userdata('google_access_token', '');
		$client = new Google_Client();
		$client->setClientId(GOOGLE_CLIENT_ID);
		$client->setClientSecret(GOOGLE_CLIENT_SECRET);
		$client->setRedirectUri(GOOGLE_REDIRECT_URI);
		$client->addScope("email");
		$client->addScope("profile");
		$client->addScope("https://www.googleapis.com/auth/drive");
		$client->addScope("https://www.googleapis.com/auth/youtube");
		// $client->addScope("https://www.googleapis.com/auth/userinfo.email");
		// $client->addScope("https://www.googleapis.com/auth/userinfo.profile");
		$yt_service = new Google_Service_YouTube($client);
		$dr_service = new Google_Service_Drive($client);
		// $service = new Google_Service_Oauth2($client);
		$authUrl = $client->createAuthUrl();
		header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
		exit;
	}

	public function googlelogin(){
       $client = new Google_Client();
		$client->setClientId(GOOGLE_CLIENT_ID);
		$client->setClientSecret(GOOGLE_CLIENT_SECRET);
		$client->setRedirectUri(GOOGLE_REDIRECT_URI);
		$client->addScope("https://www.googleapis.com/auth/drive");
		$client->addScope("https://www.googleapis.com/auth/youtube");
		// add "?logout" to the URL to remove a token from the session
		if (isset($_REQUEST['logout'])) {
		  unset($_SESSION['multi-api-token']);
		}
		/************************************************
		 * If we have a code back from the OAuth 2.0 flow,
		 * we need to exchange that with the
		 * Google_Client::fetchAccessTokenWithAuthCode()
		 * function. We store the resultant access token
		 * bundle in the session, and redirect to ourself.
		 ************************************************/
		if (isset($_GET['code'])) {
		  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
		  $client->setAccessToken($token);
		  // store in the session also
		  $_SESSION['multi-api-token'] = $token;
		  // redirect back to the example
		  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
		}
		// set the access token as part of the client
		if (!empty($_SESSION['multi-api-token'])) {
		  $client->setAccessToken($_SESSION['multi-api-token']);
		  if ($client->isAccessTokenExpired()) {
		    unset($_SESSION['multi-api-token']);
		  }
		} else {
		  $authUrl = $client->createAuthUrl();
		}
		/************************************************
		  We are going to create both YouTube and Drive
		  services, and query both.
		 ************************************************/
		$yt_service = new Google_Service_YouTube($client);
		$dr_service = new Google_Service_Drive($client);
		/************************************************
		  If we're signed in, retrieve channels from YouTube
		  and a list of files from Drive.
		 ************************************************/
		if ($client->getAccessToken()) {
		  $_SESSION['multi-api-token'] = $client->getAccessToken();
		  $dr_results = $dr_service->files->listFiles(array('pageSize' => 10));
		  $yt_channels = $yt_service->channels->listChannels('contentDetails', array("mine" => true));
		  $likePlaylist = $yt_channels[0]->contentDetails->relatedPlaylists->likes;
		  $yt_results = $yt_service->playlistItems->listPlaylistItems(
		      "snippet",
		      array("playlistId" => $likePlaylist)
		  );
		}

		 if (!isset($authUrl)) {
		 	 var_dump($dr_results);
		 	 var_dump($yt_results);
  			}
		 

    }

    public function googleloggedin() {
    	$client = new Google_Client();
		$client->setClientId(GOOGLE_CLIENT_ID);
		$client->setClientSecret(GOOGLE_CLIENT_SECRET);
		$client->setRedirectUri(GOOGLE_REDIRECT_URI);
		// $client->setApplicationName('My Project');
		$client->addScope("email");
		$client->addScope("profile");

		$client->addScope("https://www.googleapis.com/auth/drive");
		$client->addScope("https://www.googleapis.com/auth/youtube");
		// $client->addScope("https://www.googleapis.com/auth/userinfo.email");
		// $client->addScope("https://www.googleapis.com/auth/userinfo.profile");
		$yt_service = new Google_Service_YouTube($client);
		$dr_service = new Google_Service_Drive($client);
		$service = new Google_Service_Oauth2($client);
		$client->setAccessToken($this->session->userdata('access_token'));

		$user = $service->userinfo->get(); //get user info 
		$dr_results = $dr_service->files->listFiles(array('pageSize' => 10));
  		$yt_channels = $yt_service->channels->listChannels('contentDetails', array("mine" => true));
		// var_dump($dr_results);
		// var_dump($yt_channels);
		// var_dump($user);


		// echo "<script>window.location = '" . base_url() . "';</script>";
		$this->load->view('googledriverpickup');
    }

    public function googledriver() {
    	$this->load->view('googledriverpickup');
    	
    }
}
