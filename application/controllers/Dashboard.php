<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
 	
 	function __construct()
    {
        parent::__construct();
        $this->load->model('Books_model');
        $this->load->library('form_validation');
        $this->load->library('encryption');
    }

    public function index() {
        $data = array(
            'books_data' => $this->Books_model->get_all()
        );
        $this->load->view('owners/Dashboard', $data);
    }
}