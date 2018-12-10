<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Owners extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Owners_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'owners/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'owners/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'owners/index.html';
            $config['first_url'] = base_url() . 'owners/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Owners_model->total_rows($q);
        $owners = $this->Owners_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'owners_data' => $owners,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('owners/owners_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Owners_model->get_by_id($id);
        if ($row) {
            $data = array(
		'owners_id' => $row->owners_id,
		'name' => $row->name,
		'address' => $row->address,
		'birth_date' => $row->birth_date,
		'gender' => $row->gender,
		'telp_number' => $row->telp_number,
		'email' => $row->email,
	    );
            $this->load->view('owners/owners_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('owners'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('owners/create_action'),
	    'owners_id' => set_value('owners_id'),
	    'name' => set_value('name'),
	    'address' => set_value('address'),
	    'birth_date' => set_value('birth_date'),
	    'gender' => set_value('gender'),
	    'telp_number' => set_value('telp_number'),
	    'email' => set_value('email'),
	);
        $this->load->view('owners/owners_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'address' => $this->input->post('address',TRUE),
		'birth_date' => $this->input->post('birth_date',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'telp_number' => $this->input->post('telp_number',TRUE),
		'email' => $this->input->post('email',TRUE),
	    );

            $this->Owners_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('owners'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Owners_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('owners/update_action'),
		'owners_id' => set_value('owners_id', $row->owners_id),
		'name' => set_value('name', $row->name),
		'address' => set_value('address', $row->address),
		'birth_date' => set_value('birth_date', $row->birth_date),
		'gender' => set_value('gender', $row->gender),
		'telp_number' => set_value('telp_number', $row->telp_number),
		'email' => set_value('email', $row->email),
	    );
            $this->load->view('owners/owners_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('owners'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('owners_id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'address' => $this->input->post('address',TRUE),
		'birth_date' => $this->input->post('birth_date',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'telp_number' => $this->input->post('telp_number',TRUE),
		'email' => $this->input->post('email',TRUE),
	    );

            $this->Owners_model->update($this->input->post('owners_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('owners'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Owners_model->get_by_id($id);

        if ($row) {
            $this->Owners_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('owners'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('owners'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('birth_date', 'birth date', 'trim|required');
	$this->form_validation->set_rules('gender', 'gender', 'trim|required');
	$this->form_validation->set_rules('telp_number', 'telp number', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');

	$this->form_validation->set_rules('owners_id', 'owners_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Owners.php */
/* Location: ./application/controllers/Owners.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-10 16:37:36 */
/* http://harviacode.com */