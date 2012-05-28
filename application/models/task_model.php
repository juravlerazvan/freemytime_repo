<?php

class Task_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create_task($params) {
        $resultStatus = TRUE;

// begin transaction
        $this->db->trans_start();
        $this->db->insert('fmt_tasks', $params);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $error_message = 'Error ocurred on inserting task, parameters: ';
            foreach ($params as $key => $value) {
                $error_message += $key . '=' . $value . '|';
            }
            $error_message += ' Transaction rolled back.';
            log_message('error', $error_message);
            $resultStatus = FALSE;
        }
        return $resultStatus;
    }

    /* Params:
     * 
     * @task_id: specific task id
     *  or
     * @task_id: "all" 
     * @category id
     * @description
     * @budget
     * @address
     * @expiration_period
     * @status
     * @offset
     * @results_per_page
     */

    function read_task($params) {
        if (isset($params['task_id']) && $params['task_id'] != 0 && $params['task_id'] != 'all') {
            $this->db->select('fmt_tasks.task_id, fmt_tasks.cat_id, fmt_tasks.user_id,
                fmt_tasks.budget, fmt_tasks.title, fmt_tasks.description, fmt_tasks.added_on,
                fmt_tasks.expiration_date, fmt_tasks.address, fmt_tasks.bidder_location,
                fmt_tasks.payment_method, fmt_tasks.promoted, fmt_tasks.status,
                fmt_auctions.bidder_id, fmt_auctions.bid_value, fmt_auctions.comments');
            $this->db->from('fmt_tasks');
            $this->db->join('fmt_auctions', 'fmt_auctions.task_id = fmt_tasks.task_id', 'left');
            $this->db->where('fmt_tasks.task_id', $params['task_id']);
        } else {
            $this->db->select('fmt_tasks.task_id, fmt_tasks.cat_id, fmt_tasks.user_id,
                fmt_tasks.budget, fmt_tasks.title, fmt_tasks.description, fmt_tasks.added_on,
                fmt_tasks.expiration_date, fmt_tasks.address, fmt_tasks.bidder_location,
                fmt_tasks.payment_method, fmt_tasks.promoted, fmt_tasks.status,
                fmt_auctions.bidder_id, fmt_auctions.bid_value, fmt_auctions.comments');
            $this->db->from('fmt_tasks', 'fmt_auctions');
            $this->db->join('fmt_auctions', 'fmt_tasks.task_id = fmt_auctions.task_id', 'left');
            if (isset($params['filter_category']) && $params['filter_category'] != 'all') {
                $this->db->where('fmt_tasks.cat_id', $params['filter_category']);
            }
            if (isset($params['filter_description']) && $params['filter_description'] != '') {
                $this->db->like('fmt_tasks.description', $params['filter_description']);
            }
            if (isset($params['filter_budget']) && $params['filter_budget'] != '') {
                $this->db->where('fmt_tasks.budget <=', $params['filter_budget']);
            }
            if (isset($params['filter_location']) && $params['filter_location'] != '') {
                $this->db->like('fmt_tasks.address ', $params['filter_location']);
            }
            if (isset($params['expiration_period']) && $params['expiration_period'] != '') {
                $this->db->where('fmt_tasks.expiration_period <=', $params['expiration_period']);
            }
            if (isset($params['status']) && $params['status'] != '') {
                $this->db->where('fmt_tasks.status', $params['status']);
            }
            (!isset($params['offset'])) ? $offset = 0 : $offset = $params['offset'];
            (!isset($params['results_per_page'])) ? $results_limit = 999999999999 : $results_limit = $params['results_per_page'];
            $this->db->limit($results_limit, $offset);
        }

        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_tasks($params) {

        $this->db->from('fmt_tasks', 'fmt_auctions');
        $this->db->join('fmt_auctions', 'fmt_tasks.task_id = fmt_auctions.task_id', 'left');
        if ($params['filter_category'] != 'all') {
            $this->db->where('fmt_tasks.cat_id', $params['filter_category']);
        }
        if ($params['filter_description'] != '') {
            $this->db->like('fmt_tasks.description', $params['filter_description']);
        }
        if ($params['filter_budget'] != '') {
            $this->db->where('fmt_tasks.budget <=', $params['filter_budget']);
        }
        if ($params['filter_location'] != '') {
            $this->db->like('fmt_tasks.address', $params['filter_location']);
        }
        if ($params['expiration_period'] != '') {
            $this->db->where('fmt_tasks.expiration_period <=', $params['expiration_period']);
        }

        return $this->db->count_all_results();
    }

    function count_all_active_tasks() {
        $this->db->where('status', 'new');
        return $this->db->count_all_results('fmt_tasks');
    }

    function update_task($params) {
        $result_status = TRUE;
        $dynamic_query = '';

        foreach ($params as $set_key => $set_value) {
            $dynamic_query += $set_key . '=' . $set_value;
            if (next($params)) {
                $dynamic_query += ' AND ';
            }
        }
        $update_task_query = "UPDATE fmt_tasks SET " . $dynamic_query . " WHERE task_id = " . $params['task_id'];

        $this->db->trans_start();
        $this->db->query($update_task_query);
        if ($this->db->trans_status() === FALSE) {
            $error_message = 'Error ocurred on updating task, parameters: ';
            foreach ($params as $key => $value) {
                $error_message += $key . '=' . $value . '|';
            }
            $error_message += ' Transaction rolled back.';
            log_message('error', $error_message);
            $result_status = FALSE;
        }
        return $result_status;
    }

    function delete_task($params) {
        $result_status = TRUE;
        $delete_task = "DELETE FROM fmt_tasks WHERE task_id = '" . $params['task_id'] . "'";

        $this->db->trans_start();
        $this->$this->db->query($delete_task);
        $this->$this->db->query($delete_auctions);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $error_message = 'Error ocurred on deleting task, parameters: ';
            foreach ($params as $key => $value) {
                $error_message += $key . '=' . $value . '|';
            }
            $error_message += ' Transaction rolled back.';
            log_message('error', $error_message);
            $result_status = FALSE;
        }
        return $result_status;
    }

}

?>
