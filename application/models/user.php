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

    public function get($id) {
        $this->db->select('id, email, full_name');
        $this->db->from('users');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query -> num_rows() == 1) {
            return $query->row();
        }
        return FALSE;
    }

    //returns user object if login sucess
    public function check_login($email, $password)
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

    public function can_change_email($id, $email)
    {
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('id <>', $id);
        $this->db->where('email', $email);
        return $this->db->count_all_results() == 0;
    }

    public function update($id, $full_name, $email, $password)
    {
        $data = [
            'full_name' => $full_name,
            'email' => $email
        ];
        if ($password != '')
        {
            $data['password'] = password_hash($password, PASSWORD_BCRYPT);
        }
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
}
