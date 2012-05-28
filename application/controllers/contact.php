<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('email');
    }

    function index() {
        $data['page_title'] = 'Contact us';
        $data['view_name'] = 'contact/contact';
        $data['body_id'] = 'contact';
        $data['show_fb'] = TRUE;

        $this->load->view('template', $data);
    }

    function send_message() {
        $params = $_POST;
        $confirmation_message = 'Thanks for your message, we will contact you soon.<br><br>';

        $this->email->from($params['email'], $params['name']);
        $this->email->to('juravle.razvan@gmail.com');
        $this->email->reply_to('contact@freemytime.org', 'FreeMyTime');
        $this->email->subject('New message received via FreeMyTime ');       
        $this->email->message($params['textarea']);
        $this->email->send();  
        echo $confirmation_message;
    }
}