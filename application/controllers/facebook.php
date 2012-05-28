<?php

class Facebook extends CI_Controller {

    function __construct() {
        parent::__construct();

        // $this->load->add_package_path('/Users/elliot/github/codeigniter-facebook/application/');
        $this->load->library('facebook');
        $this->facebook->enable_debug(TRUE);
    }

    function login() {
        // This is the easiest way to keep your code up-to-date. Use git to checkout the 
        // codeigniter-facebook repo to a location outside of your site directory.
        // 
        // Add the 'application' directory from the repo as a package path:
        // $this->load->add_package_path('/var/www/haughin.com/codeigniter-facebook/application/');
        // 
        // Then when you want to grab a fresh copy of the code, you can just run a git pull 
        // on your codeigniter-facebook directory.

        if (!$this->facebook->logged_in()) {
            // From now on, when we call login() or login_url(), the auth
            // will redirect back to this url.

            $this->facebook->set_callback(site_url('facebook'));

            // Header redirection to auth.

            $this->facebook->login();

            // You can alternatively create links in your HTML using
            // $this->facebook->login_url(); as the href parameter.
        } else {
            redirect('facebook');
        }
    }

    function logout() {
        $this->facebook->logout();
        redirect('/home');
    }

}