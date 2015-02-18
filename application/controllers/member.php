<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User', '', TRUE);
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function login()
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

        $sess_array = [
           'logged_in'=> TRUE,
           'user_id' => $data->id
        ];
        $this->session->set_userdata($sess_array);
        redirect('dashboard', 'refresh');
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        session_start();
        session_destroy();
        redirect('login', 'refresh');
    }

    public function register()
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
            $id = $this->User->add(
                $this->input->post('name'),
                $this->input->post('email'),
                $this->input->post('password')
            );
            $sess_array = [
               'logged_in'=> TRUE,
               'user_id' => $id
            ];
            $this->session->set_userdata($sess_array);
            redirect('dashboard', 'refresh');
        }
    }
}
