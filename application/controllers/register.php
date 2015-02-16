<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Register extends CI_Controller 
{
    public function __constructor()
    {
        parent::__construct();
        $this->load->model('user','',TRUE);
    }

    public function index() {
       //This method will have the credentials validation
       $this->load->library('form_validation');
     
       $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
       $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
       $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length|callback_check_database');
     
       if($this->form_validation->run() == FALSE)
       {
            //Field validation failed.  User redirected to login page
            $this->load->view('login');
       }
       else
       {
            //Go to private area
            redirect('dashboard', 'refresh');
       }
    }
}