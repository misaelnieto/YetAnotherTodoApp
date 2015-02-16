<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');
        if ($this->session->userdata('logged_in'))
        {
            $data['title'] = 'Mis tareas';
            $this->load->view('templates/header', $data);
            $this->load->view('dashboard');
            $this->load->view('templates/footer');
            return;
        }
        
        redirect('login', 'refresh');
    }
}
