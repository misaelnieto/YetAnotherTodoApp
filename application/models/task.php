<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task extends CI_Model {

    var $id ='';
    var $text ='';
    var $completed ='';
    var $task_list_id ='';
    var $created ='';
    var $updated ='';

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function get ($id) {
        $q = $this->db->get_where('tasks', array('id' => $id), 1);
        return $q->row();
    }

    public function all_from_list($tasklist_id)
    {
        $query = $this->db->query('SELECT id, text FROM tasks WHERE completed=0 AND task_list_id='.$tasklist_id);
        return $query->result_array();
    }

    public function add($task_list_id, $text) {
        $data = array(
           'text' => $text,
           'task_list_id' => $task_list_id
        );
        $this->db->insert('tasks', $data);
    }

    public function update($id, $text)
    {
        $data = array(
           'text' => $text
        );
        $this->db->where('id', $id);
        $this->db->update('tasks', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tasks'); 
    }
}
