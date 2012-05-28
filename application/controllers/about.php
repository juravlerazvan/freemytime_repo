<?php

class About extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $data['page_title'] = 'About us';
        $data['view_name'] = 'about/about';
        $data['show_fb'] = TRUE;
        
        $this->load->view('template', $data);
    }
}
?>
