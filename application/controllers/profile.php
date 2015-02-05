<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Mis cuenta de usuario';
        $this->load->view('templates/header', $data);
        $this->load->view('profile');
        $this->load->view('templates/footer');
    }
}
