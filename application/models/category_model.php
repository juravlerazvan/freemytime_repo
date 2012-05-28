<?php

class Category_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create_category($params) {
        $resultStatus = TRUE;

        $insert_category_query = "INSERT INTO fmt_categories VALUES (
            " . escape_str($params['category']) . ",
            " . escape_str($params['status']) . " )";

        // begin transaction
        $this->db->trans_start();
        $this->db->query($insert_category_query);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $error_message = 'Error ocurred on inserting category, parameters: ';
            foreach ($params as $key => $value) {
                $error_message += $key . '=' . $value . '|';
            }
            $error_message += ' Transaction rolled back.';
            log_message('error', $error_message);
            $resultStatus = FALSE;
        }
        return $resultStatus;
    }

    /*
     *  Get category by id or all categories
     * @params['cat_id']: category id
     * @params['category_stauts'] : active/inactive
     */

    function get_category($params) {
        $this->db->from('fmt_categories');

        if ($params['cat_id'] != 0) {
            $this->db->where('cat_id', $params['cat_id']);
        } else {
            if (!isset($params['category_status'])) {
                $params['category_status'] = 'active';
            }
            $this->db->where('status', $params['category_status']);
            $this->db->order_by('category', 'asc');
        }

        $query = $this->db->get();
        return $query->result();
    }

    function update_category($params) {
        $result_status = TRUE;
        $dynamic_query = '';

        foreach ($params as $set_key => $set_value) {
            $dynamic_query += $set_key . '=' . $set_value;
            if (next($params)) {
                $dynamic_query += ' AND ';
            }
        }

        $update_category_query = "UPDATE fmt_categories SET " . $dynamic_query . "
             WHERE task_id = " . $params['task_id'];

        // begin transaction
        $this->db->trans_start();
        $this->db->query($update_category_query);
        if ($this->db->trans_status() === FALSE) {
            $error_message = 'Error ocurred on updating category, parameters: ';
            foreach ($params as $key => $value) {
                $error_message += $key . '=' . $value . '|';
            }
            $error_message += ' Transaction rolled back.';
            log_message('error', $error_message);
            $result_status = FALSE;
        }
        return $result_status;
    }

    function delete_category($params) {
        $result_status = TRUE;
        $delete_category = "DELETE FROM fmt_categories WHERE cat_id = '" . $params['cat_id'] . "'";

        // begin transaction
        $this->db->trans_start();
        $this->$this->db->query($delete_category);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $error_message = 'Error ocurred on deleting category, parameters: ';
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
