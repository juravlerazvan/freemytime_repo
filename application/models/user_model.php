<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author Razvan Juravle <juravle.razvan@gmail.com>
 */
class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_user_info($task_id) {
        
        $this->db->select('fmt_users.*');
        $this->db->from('fmt_users');
        $this->db->from('fmt_tasks');
        
        if(isset($task_id) && $task_id != '' && $task_id != 'all' && $task_id != null) {
            $this->db->where('fmt_users.id = fmt_tasks.user_id');
            $this->db->where('fmt_tasks.task_id', $task_id);
            $this->db->limit(1);
        }
                        
        $query = $this->db->get();
        return $query->result();
    }

}

?>
