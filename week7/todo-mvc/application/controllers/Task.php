<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

    public function index()
    {
        $this->load->database();
        $this->load->model('Task_model');
        $data['todos'] = $this->Task_model->GetAll();
        $this->load->view('task/all', $data);
    }

    public function add()
    {
        $viewdata['feedback'] = "";
        // validate form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('todo_name', 'Todo', 'required');
        if ($this->form_validation->run() === FALSE)
        {
            // validation failed
        }
        else
        {
            // validation ok
            // save via model
            $this->load->model('Task_model');
            $data['name'] = $this->input->post('todo_name');
            $data['category'] = $this->input->post('todo_category');
            $this->Task_model->Save($data);
            $viewdata['feedback'] = "Your todo has been added.";
        }
        $this->load->view('task/add', $viewdata);
    }


}