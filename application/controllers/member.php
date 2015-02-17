<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User', '', TRUE);
        $this->load->library('form_validation');
    }

    function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if($this->form_validation->run() == FALSE)
        {
            $this->form_validation->set_message('Invalid username or password');
            $this->load->view('login');
            return;
        }
        $data = $this->User->check_login(
            $this->input->post('email'),
            $this->input->post('password')
        );
        if ($data == FALSE) {
            $this->form_validation->set_message('Invalid username or password');
            $this->load->view('login');
            return;                    
        }

        $sess_array = array(
           'id' => $data->id,
           'email' => $data->email
        );
        $this->session->set_userdata('logged_in', $sess_array);
        redirect('dashboard', 'refresh');
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_start();
        session_destroy();
        redirect('login', 'refresh');
    }

    function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('login');
        }
        else
        {
            $result = $this->User->add(
                $this->input->post('name'),
                $this->input->post('email'),
                $this->input->post('password')
            );
            $sess_array = array(
                'id' => $data->id,
                'email' => $data->email
            );
            $this->session->set_userdata('logged_in', $sess_array);
            redirect('dashboard', 'refresh');
        }
    }
}
