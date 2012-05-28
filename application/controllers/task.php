<?php

class Task extends CI_Controller {

    function __construct() {
        
        parent::__construct();
    }

    /*
     * Private functions to manipulate tasks
     */

//  Expected $params array: owner_id, category_id, title, description, budget, country, city, expires_on, show_avg_bid, payment_method, status
    function create_task() {
        
        $params = array(
            'cat_id' => $_POST['task_category_id'],
            'user_id' => '',
            'budget' => $_POST['task_budget'],
            'title' => $_POST['task_title'],
            'description' => $_POST['task_description'],
            'added_on' => date('Y-m-d h:i:s'),
            'expiration_date' => date('Y-m-d h:i:s', strtotime('+' . $_POST['task_validity'] . ' days')),
            'address' => $_POST['task_address'],
            'bidder_location' => $_POST['bidder_location'],
            'promoted' => 'no',
            'status' => $_POST['task_status']
        );

        if ($this->task_model->create_task($params)) {
            echo 'Congratulations! Your task has just been submitted.<br><br>';
        } else {
            echo 'Oops! An error has occurred, please try again later.';
        }
    }

    function add_task() {
        
        $data = array();
        $params = array();
        $params['cat_id'] = 0;
        $params['category_status'] = 'active';
        $data['page_title'] = 'Add new task';
        $data['view_name'] = 'tasks/add_task';
        $data['categories'] = $this->category_model->get_category($params);
        $data['show_fb'] = TRUE;
        $this->load->view('template', $data);
    }

    function browse_tasks() {
        
        $data = array();
        $params = array();
        $params['cat_id'] = 0;
        $params['category_status'] = 'active';
        $data['page_title'] = 'Browse tasks';
        $data['view_name'] = 'tasks/browse_tasks';
        $data['show_map'] = TRUE;
        $data['categories'] = $this->category_model->get_category($params);
        $this->load->view('template', $data);
    }

    function get_tasks_table() {
        
        $data = array();
        $data['results_no'] = $this->task_model->count_filtered_tasks($_POST);
        $data['data'] = $this->task_model->read_task($_POST);
        $data['result_pages_no'] = ceil($data['results_no'] / $_POST['results_per_page']);
        echo $this->load->view('tasks/tasks_table', $data);
    }

    function task_details($task_id) {
        
        $data = array();
        $params = array();
        $params['category_status'] = 'active';
        
        $data['view_name'] = 'tasks/task_details';
        $data['show_fb'] = true;
        $data['data'] = $this->task_model->read_task($task_id);  
        
        $params['cat_id'] = $data['data'][0]->cat_id;
        
        $data['data']['user'] = $this->user_model->get_user_info($task_id);
        $data['data']['category'] = $this->category_model->get_category($params);
        
        $data['page_title'] = $data['data'][0]->title;
        
        $this->load->view('template', $data);
    }

//  $params: task_id, owner_id, category_id, title, description, budget, country, city, expires_on, show_avg_bid, payment_method, status
    function update_task($params) {
        
        $update_task_action = $this->tasks_model->update_task($params);
        return $update_task_action;
    }

//  $params array: task_id
    function delete_task($params) {
        
        $delete_task_action = $this->tasks_model->delete_task($params);
        return $delete_task_action;
    }

    function show_task_on_map() {
        
        $data = array();
        $params = array('status' => 'new');
        $params = array('task_id' => 1);
        $data = $this->task_model->read_task($params);
        print json_encode($data);
    }

}

?>
