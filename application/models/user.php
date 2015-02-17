<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model
{
    var $id='';
    var $name='';
    var $email='';
    var $password='';
    var $created='';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //returns user object if login sucess
    function check_login($email, $password)
    {
        $this->db->select('id, email, password');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->limit(1);

        $query = $this->db->get();
        if($query -> num_rows() == 1)
        {
            $usr = $query->row();
            if (password_verify($password, $usr->password))
            {
                return $usr;
            }
        }
        return FALSE;
    }

    public function add($name, $email, $password)
    {
        $data = array(
            'full_name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        );
        $this->db->insert('users', $data);
    }

}
