<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __constructor()
    {
        parent::__construct();
        $this->load->model('user','',TRUE);
    }

    public function index()
    {
        //Nota: member/login es el que se hace cargo del proceso de login.
        if ($this->session->userdata('logged_in')) {
          //Go to private area
          redirect('dashboard', 'refresh');
          return;
        }
        //This method will have the credentials validation
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|');
        $this->form_validation->run();
        $this->load->view('login');
    }
}
