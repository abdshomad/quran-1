<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Error404 extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('error_404');
    }

}