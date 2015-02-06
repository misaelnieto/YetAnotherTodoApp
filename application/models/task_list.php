<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TaskList extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function all()
    {
        $this->load->model('Task');
        $this->db->select('id, title');
        $query = $this->db->get();
        $result = $query->result();
        foreach ($result as &$row)
            $row["tasks"] = $this->models->Task->all_from_list($row['id']);
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
