<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $isLoggedIn = $this->session->userdata('isloggedin');
        if(isset($isLoggedIn) && $isLoggedIn == TRUE)
        {
            redirect('/main');
        }
        $this->load->model('user_model');
    }

	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('login');
	}

	public function signin() {
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');

        if($this->form_validation->run() == false)
        {
             $this->session->set_flashdata('error', 'Email or password mismatch');   
             redirect('/login');
        }  else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $result = $this->user_model->login($email, $password);
            
            if(count($result) > 0)
            {
                foreach ($result as $res)
                {
                    $sessionArray = array('user_id'=>$res->user_id,                    
	                                        'name_or_business'		=> $res->name_or_business,
	                                        'cell_number'			=> $res->cell_number,
	                                        'user_email'			=> $res->user_email,
	                                        'user_name'				=> $res->user_name,
	                                        'isloggedin' 			=> TRUE,
	                                        'logo_image' 			=> $res->logo_image
                                    );
                                    
                    $this->session->set_userdata($sessionArray);
                    
                    redirect('/main');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');
                
                redirect('/login');
            }

        }
	}

    
}
