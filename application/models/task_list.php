<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task_List extends CI_Model {

    public function __construct()
    {
        $this->load->database();
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

    public function add($title)
    {
        $data = array(
           'title' => $title
        );
        $this->db->insert('tasks_lists', $data);
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
