<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Store_pictures extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Store_pictures_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'store_pictures/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'store_pictures/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'store_pictures/index.html';
            $config['first_url'] = base_url() . 'store_pictures/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Store_pictures_model->total_rows($q);
        $store_pictures = $this->Store_pictures_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'store_pictures_data' => $store_pictures,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('store_pictures/store_pictures_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Store_pictures_model->get_by_id($id);
        if ($row) {
            $data = array(
		'store_pictures_id' => $row->store_pictures_id,
		'store_pictures_name' => $row->store_pictures_name,
		'stores_id' => $row->stores_id,
	    );
            $this->load->view('store_pictures/store_pictures_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('store_pictures'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('store_pictures/create_action'),
	    'store_pictures_id' => set_value('store_pictures_id'),
	    'store_pictures_name' => set_value('store_pictures_name'),
	    'stores_id' => set_value('stores_id'),
	);
        $this->load->view('store_pictures/store_pictures_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'store_pictures_name' => $this->input->post('store_pictures_name',TRUE),
		'stores_id' => $this->input->post('stores_id',TRUE),
	    );

            $this->Store_pictures_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('store_pictures'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Store_pictures_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('store_pictures/update_action'),
		'store_pictures_id' => set_value('store_pictures_id', $row->store_pictures_id),
		'store_pictures_name' => set_value('store_pictures_name', $row->store_pictures_name),
		'stores_id' => set_value('stores_id', $row->stores_id),
	    );
            $this->load->view('store_pictures/store_pictures_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('store_pictures'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('store_pictures_id', TRUE));
        } else {
            $data = array(
		'store_pictures_name' => $this->input->post('store_pictures_name',TRUE),
		'stores_id' => $this->input->post('stores_id',TRUE),
	    );

            $this->Store_pictures_model->update($this->input->post('store_pictures_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('store_pictures'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Store_pictures_model->get_by_id($id);

        if ($row) {
            $this->Store_pictures_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('store_pictures'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('store_pictures'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('store_pictures_name', 'store pictures name', 'trim|required');
	$this->form_validation->set_rules('stores_id', 'stores id', 'trim|required');

	$this->form_validation->set_rules('store_pictures_id', 'store_pictures_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Store_pictures.php */
/* Location: ./application/controllers/Store_pictures.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-10 16:37:37 */
/* http://harviacode.com */