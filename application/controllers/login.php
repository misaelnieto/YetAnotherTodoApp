<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('logged_in'))
        {
            redirect('dashboard', 'refresh');
            return;
        }

        $this->load->helper('form');
        $this->load->view('login');
    }
}
