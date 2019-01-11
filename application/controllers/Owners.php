<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Owners extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged')) {
            $this->session->set_flashdata('message', '<div class="alert media fade in alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Anda Belum Login, Silahkan Login Terlebih Dahulu.<br></div>');
            redirect(site_url('auth'));
        }
        $this->load->model('Owners_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'owners_data' => $this->Owners_model->get_all()
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
		'email' => $row->email,
		'gender' => $row->gender,
		'birth_date' => $row->birth_date,
		'username' => $row->username,
		'password' => $row->password,
		'is_verify' => $row->is_verify,
		'stores_id' => $row->stores_id,
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
	    'email' => set_value('email'),
	    'gender' => set_value('gender'),
	    'birth_date' => set_value('birth_date'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'is_verify' => set_value('is_verify'),
	    'stores_id' => set_value('stores_id'),
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
		'email' => $this->input->post('email',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'birth_date' => $this->input->post('birth_date',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'is_verify' => $this->input->post('is_verify',TRUE),
		'stores_id' => $this->input->post('stores_id',TRUE),
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
		'email' => set_value('email', $row->email),
		'gender' => set_value('gender', $row->gender),
		'birth_date' => set_value('birth_date', $row->birth_date),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'is_verify' => set_value('is_verify', $row->is_verify),
		'stores_id' => set_value('stores_id', $row->stores_id),
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
		'email' => $this->input->post('email',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'birth_date' => $this->input->post('birth_date',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'is_verify' => $this->input->post('is_verify',TRUE),
		'stores_id' => $this->input->post('stores_id',TRUE),
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
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('gender', 'gender', 'trim|required');
	$this->form_validation->set_rules('birth_date', 'birth date', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('is_verify', 'is verify', 'trim|required');
	$this->form_validation->set_rules('stores_id', 'stores id', 'trim|required');

	$this->form_validation->set_rules('owners_id', 'owners_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Owners.php */
/* Location: ./application/controllers/Owners.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-02 14:35:38 */
/* http://harviacode.com */