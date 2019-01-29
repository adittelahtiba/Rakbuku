<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Books_model');
        $this->load->model('Adverts_model');
        $this->load->library('form_validation');
        $this->load->library('encryption');
    }

    public function index() {
        $data = array(
            'Adverts_data_total' => $this->Adverts_model->count_by_owners(),
            'Adverts_data' => $this->Adverts_model->get_by_owners(3),
            'books_data' => $this->Books_model->get_by_owners_limit(),
            'books_data_total' => $this->Books_model->get_total_by_owners_limit(),
        );
        $this->load->view('owners/dashboard', $data);
    }
}