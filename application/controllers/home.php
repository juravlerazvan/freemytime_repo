<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Task_model');
    }

    function index() {
        $data = array ();
        $data['page_title'] = 'Welcome';
        $data['view_name'] = 'home/home';
        $data['show_fb'] = TRUE;
        $data['available_task_counter'] = $this->task_model->count_all_active_tasks();

        $this->load->view('template', $data);
    }

}