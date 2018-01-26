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

	
}
