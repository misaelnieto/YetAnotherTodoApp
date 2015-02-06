<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function all_from_list($tasklist_id)
    {
        $this->db->select('id, text');
        $this->db->where('completed = 0');
        $this->db->where('parent_list', $tasklist_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add($parent_list_id, $text) {
        $data = array(
           'text' => $text,
           'parent_list' => $parent_list_id
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
