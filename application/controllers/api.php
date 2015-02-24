<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Api extends REST_Controller
{
    public function __constructor()
    {
        parent::__construct();
        $this->load->model('user','',TRUE);
        $this->load->model('Task_List');
        $this->load->model('Task');
    }

    public function test_get()
    {
        $data = array('hola', 'mundo');
        $this->response($data, 200);
    }

    public function lists_get()
    {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('Task_List');
            $data = array('status'=>'OK', 'data'=> $this->Task_List->all_from_user($this->session->userdata('user_id')));
            $this->response($data, 200);
        }
        $this->response(400);
    }

    public function lists_put()
    {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('Task_List');
            $this->Task_List->add(
                $this->put('title'),
                $this->session->userdata('user_id')
            );
            $nw_id = $this->db->insert_id();
            $data = array('status'=>'OK', 'data'=> $this->Task_List->get($nw_id));
            $this->response($data, 200);
        }
        $this->response(400);
    }

    public function lists_post()
    {
        $this->load->model('Task_List');
        $this->Task_List->update($this->post('title'), $this->post('title'));
    }

    public function task_put()
    {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('Task');
            $this->Task->add(intval($this->put('task_list_id')), $this->put('text'));
            $nw_id = $this->db->insert_id();
            $data = array('status'=>'OK', 'data'=> $this->Task->get($nw_id));
            $this->response($data, 200);
        }
        $this->response(400);
    }

    public function task_post()
    {
        $this->load->model('Task');
        $this->Task->update($this->post('id'), $this->post('text'));
    }

    public function task_delete()
    {
        if ($this->session->userdata('logged_in')) {
            $this->load->model('Task_List');
            $this->load->model('Task');
            $task = $this->Task->get($this->delete('id'));
            $list = $this->Task_List->get($task->task_list_id);
            if ($list->user_id == $this->session->userdata('user_id')) {
                $this->Task->delete($this->delete('id'));
                $this->response($data, 200);
            } else {
                $this->response(400);
            }
        }
        $this->response(400);
    }
}