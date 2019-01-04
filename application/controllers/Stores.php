<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stores extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Stores_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'stores/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'stores/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'stores/index.html';
            $config['first_url'] = base_url() . 'stores/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Stores_model->total_rows($q);
        $stores = $this->Stores_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'stores_data' => $stores,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('stores/stores_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Stores_model->get_by_id($id);
        if ($row) {
            $data = array(
		'stores_id' => $row->stores_id,
		'store_name' => $row->store_name,
		'description' => $row->description,
		'address' => $row->address,
		'open' => $row->open,
		'contact' => $row->contact,
		'opening_at' => $row->opening_at,
		'closing_at' => $row->closing_at,
	    );
            $this->load->view('stores/stores_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stores'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('stores/create_action'),
	    'stores_id' => set_value('stores_id'),
	    'store_name' => set_value('store_name'),
	    'description' => set_value('description'),
	    'address' => set_value('address'),
	    'open' => set_value('open'),
	    'contact' => set_value('contact'),
	    'opening_at' => set_value('opening_at'),
	    'closing_at' => set_value('closing_at'),
	);
        $this->load->view('stores/stores_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'store_name' => $this->input->post('store_name',TRUE),
		'description' => $this->input->post('description',TRUE),
		'address' => $this->input->post('address',TRUE),
		'open' => $this->input->post('open',TRUE),
		'contact' => $this->input->post('contact',TRUE),
		'opening_at' => $this->input->post('opening_at',TRUE),
		'closing_at' => $this->input->post('closing_at',TRUE),
	    );

            $this->Stores_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('stores'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Stores_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('stores/update_action'),
		'stores_id' => set_value('stores_id', $row->stores_id),
		'store_name' => set_value('store_name', $row->store_name),
		'description' => set_value('description', $row->description),
		'address' => set_value('address', $row->address),
		'open' => set_value('open', $row->open),
		'contact' => set_value('contact', $row->contact),
		'opening_at' => set_value('opening_at', $row->opening_at),
		'closing_at' => set_value('closing_at', $row->closing_at),
	    );
            $this->load->view('stores/stores_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stores'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('stores_id', TRUE));
        } else {
            $data = array(
		'store_name' => $this->input->post('store_name',TRUE),
		'description' => $this->input->post('description',TRUE),
		'address' => $this->input->post('address',TRUE),
		'open' => $this->input->post('open',TRUE),
		'contact' => $this->input->post('contact',TRUE),
		'opening_at' => $this->input->post('opening_at',TRUE),
		'closing_at' => $this->input->post('closing_at',TRUE),
	    );

            $this->Stores_model->update($this->input->post('stores_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('stores'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Stores_model->get_by_id($id);

        if ($row) {
            $this->Stores_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('stores'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stores'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('store_name', 'store name', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('open', 'open', 'trim|required');
	$this->form_validation->set_rules('contact', 'contact', 'trim|required');
	$this->form_validation->set_rules('opening_at', 'opening at', 'trim|required');
	$this->form_validation->set_rules('closing_at', 'closing at', 'trim|required');

	$this->form_validation->set_rules('stores_id', 'stores_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Stores.php */
/* Location: ./application/controllers/Stores.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-04 07:14:55 */
/* http://harviacode.com */