<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task_List extends CI_Model {

    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function get ($id) {
        $q = $this->db->get_where('task_lists', array('id' => $id), 1);
        return $q->row();
    }

    public function all()
    {
        $this->load->model('Task');
        $query = $this->db->query('SELECT id, title FROM task_lists');
        $result = $query->result_array();
        foreach ($result as &$row)
        {
            $row["tasks"] = $this->Task->all_from_list($row['id']);
        }
        return $result;
    }

    public function all_from_user($user_id)
    {
        $this->load->model('Task');
        $this->db->where('user_id', $user_id);
        $query = $this->db->query('SELECT id, title FROM task_lists');
        $result = $query->result_array();
        foreach ($result as &$row)
        {
            $row["tasks"] = $this->Task->all_from_list($row['id']);
        }
        return $result;
    }

    public function add($title, $user_id)
    {
        $data = array(
           'title' => $title,
           'user_id' => $user_id
        );
        $this->db->insert('task_lists', $data);
    }

    public function update($id, $title)
    {
        $data = array(
           'title' => $title
        );
        $this->db->where('id', $id);
        $this->db->update('tasks_lists', $data);
    }
}
