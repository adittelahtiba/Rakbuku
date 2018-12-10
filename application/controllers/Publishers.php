<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Publishers extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Publishers_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'publishers/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'publishers/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'publishers/index.html';
            $config['first_url'] = base_url() . 'publishers/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Publishers_model->total_rows($q);
        $publishers = $this->Publishers_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'publishers_data' => $publishers,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('publishers/publishers_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Publishers_model->get_by_id($id);
        if ($row) {
            $data = array(
		'publishers_id' => $row->publishers_id,
		'publishers_name' => $row->publishers_name,
		'address' => $row->address,
	    );
            $this->load->view('publishers/publishers_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('publishers'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('publishers/create_action'),
	    'publishers_id' => set_value('publishers_id'),
	    'publishers_name' => set_value('publishers_name'),
	    'address' => set_value('address'),
	);
        $this->load->view('publishers/publishers_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'publishers_name' => $this->input->post('publishers_name',TRUE),
		'address' => $this->input->post('address',TRUE),
	    );

            $this->Publishers_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('publishers'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Publishers_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('publishers/update_action'),
		'publishers_id' => set_value('publishers_id', $row->publishers_id),
		'publishers_name' => set_value('publishers_name', $row->publishers_name),
		'address' => set_value('address', $row->address),
	    );
            $this->load->view('publishers/publishers_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('publishers'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('publishers_id', TRUE));
        } else {
            $data = array(
		'publishers_name' => $this->input->post('publishers_name',TRUE),
		'address' => $this->input->post('address',TRUE),
	    );

            $this->Publishers_model->update($this->input->post('publishers_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('publishers'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Publishers_model->get_by_id($id);

        if ($row) {
            $this->Publishers_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('publishers'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('publishers'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('publishers_name', 'publishers name', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');

	$this->form_validation->set_rules('publishers_id', 'publishers_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Publishers.php */
/* Location: ./application/controllers/Publishers.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-10 16:37:36 */
/* http://harviacode.com */