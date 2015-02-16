<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Api extends REST_Controller
{
    public function test_get()
    {
        $data = array('hola', 'mundo');
        $this->response($data, 200);
    }

    public function lists_get()
    {
        $this->load->model('Task_List');
        $data = array('status'=>'OK', 'data'=> $this->Task_List->all());
        $this->response($data, 200);
    }

    public function list_put()
    {
        $this->load->model('Task_List');
        $this->Task_List->add($this->put('title'));
    }

    public function list_post()
    {
        $this->load->model('Task_List');
        $this->Task_List->update($this->post('title'), $this->post('title'));
    }

    public function task_put()
    {
        $this->load->model('Task');
        $this->Task->add($this->put('parent_list_id'), $this->put('text'));
    }

    public function task_post()
    {
        $this->load->model('Task');
        $this->Task->update($this->post('id'), $this->post('text'));
    }

    public function task_delete()
    {
        $this->load->model('Task');
        $this->Task->delete($this->delete('id'));
    }
}