<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('User', '', TRUE);
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index() 
    {
        redirect('profile/edit', 'refresh');
    }

    public function edit()
    {
        if (!$this->session->userdata('logged_in'))
        {
            redirect('login', 'refresh');
            return;
        }

        $this->form_validation->set_error_delimiters(
            '<div class="alert-box warning radious">',
            '<a href="#" class="close">&times;</a></div>'
        );
        $data['title'] = 'Mi cuenta de usuario';
        $usr = $this->User->get($this->session->userdata('user_id'));
        $data['user'] = $usr;

        if (isset($_POST) && isset($_POST['do_edit']))
        {
            $this->form_validation->set_rules('full_name', 'Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean');
            
            if ($this->form_validation->run() === TRUE)
            {
                $this->User->update(
                    $usr->id,
                    $this->input->post('full_name'),
                    $this->input->post('email'),
                    $this->input->post('password')
                );
                $this->session->set_flashdata('message', 'Listo!');
                redirect('profile/edit', 'refresh');
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('profile');
        $this->load->view('templates/footer');
    }

    public function callback_email_check ($email)
    {
        $userid = $this->session->userdata('user_id');

        if ($this->User->can_change_email($user_id, $email))
        {
            $this->form_validation->set_message('email', 'Alguien mas ya tiene ese email. Debes escoger otro.');
            return FALSE;
        }
        return TRUE;
    }
}
