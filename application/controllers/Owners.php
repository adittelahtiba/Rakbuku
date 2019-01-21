<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Owners extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda Belum Login, Silahkan Login Terlebih Dahulu.</div>');
            redirect(site_url('Welcome'));
        }
        $this->load->model('Owners_model');
        $this->load->model('Stores_model');
        $this->load->model('Store_pictures_model');
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

        $rowstore = $this->Stores_model->get_by_id($row->stores_id);
        //$rowpicstore = $this->Store_pictures_model->get_by_id($row->stores_id);
        if ($row) {
            $data = array(
        		'owners_id' => $row->owners_id,
        		'name' => $row->name,
        		'email' => $row->email,
        		'gender' => $row->gender,
        		'birth_date' => $row->birth_date,
        		'username' => $row->username,
        		'is_verify' => $row->is_verify,
                'stores_name' => $rowstore->stores_name,
                'description' => $rowstore->description,
                'address' => $rowstore->address,
                'open' => $rowstore->open,
                'contact' => $rowstore->contact,
                'opening_at' => $rowstore->opening_at,
                'closing_at' => $rowstore->closing_at,
                'store_p' => $this->Stores_model->get_gambardb($row->stores_id),
    	    );
            $this->load->view('owners/owners_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Yang Di cari Tidak Ditemukan.</div>');
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
            $this->session->set_flashdata('message', '<div class="alert alert-success">Tambah Data Berhasil.</div>');
            redirect(site_url('owners'));
        }
    }
    
    public function update($id) 
    {
        if ($this->session->userdata('id') !== $id or $this->session->userdata('is_admin') == TRUE) {
            echo "<script>window.location.href='javascript:history.back(-2);'</script>";
        }else{
        
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
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Yang Di cari Tidak Ditemukan.</div>');
                redirect(site_url('owners'));
            }
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $row = $this->Owners_model->get_by_id($this->input->post('owners_id',TRUE));

        if ($this->input->post('password',TRUE) !== '') {
            $this->form_validation->set_rules('password', 'password', 'trim|required|callback_reg_pass');
        }
        if ($this->input->post('email',TRUE) <> $row->email) {
            $this->form_validation->set_rules('email', 'email', 'trim|required|callback_reg_email|is_unique[owners.email]');
        }
        if ($this->input->post('username',TRUE) <> $row->username) {
            $this->form_validation->set_rules('username', 'username', 'trim|required|callback_reg_username|is_unique[owners.username]');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('owners_id', TRUE));

        } else {

            if ($this->input->post('email',TRUE) !== $row->email) {
                if ($this->input->post('password',TRUE) !== '') {
                    $data = array(
                        'name' => $this->input->post('name',TRUE),
                        'email' => $this->input->post('email',TRUE),
                        'gender' => $this->input->post('gender',TRUE),
                        'birth_date' => $this->input->post('birth_date',TRUE),
                        'username' => $this->input->post('username',TRUE),
                        'password' => $this->input->post('password',TRUE),
                    );    
                }else{
                    $data = array(
                        'name' => $this->input->post('name',TRUE),
                        'email' => $this->input->post('email',TRUE),
                        'gender' => $this->input->post('gender',TRUE),
                        'birth_date' => $this->input->post('birth_date',TRUE),
                        'username' => $this->input->post('username',TRUE),
                    );  
                }
            }else{
                if ($this->input->post('password',TRUE) !== '') {
                    $this->form_validation->set_rules('password', 'password', 'trim|required|callback_reg_pass');
                    $data = array(
                        'name' => $this->input->post('name',TRUE),
                        'gender' => $this->input->post('gender',TRUE),
                        'birth_date' => $this->input->post('birth_date',TRUE),
                        'username' => $this->input->post('username',TRUE),
                        'password' => $this->input->post('password',TRUE),
                    );    
                }else{
                    $data = array(
                        'name' => $this->input->post('name',TRUE),
                        'gender' => $this->input->post('gender',TRUE),
                        'birth_date' => $this->input->post('birth_date',TRUE),
                        'username' => $this->input->post('username',TRUE),
                    );  
                }
            }

            $this->Owners_model->update($this->input->post('owners_id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Ubah Data Berhasil.</div>');
            if ($this->session->userdata('is_admin') == FALSE) {
                redirect(site_url('dashboard'));
            }else{
                redirect(site_url('owners'));    
            }
            
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Owners_model->get_by_id($id);

        if ($row) {
            $this->Owners_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Hapus Data Berhasil.</div>');
            redirect(site_url('owners'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Yang Di cari Tidak Ditemukan.</div>');
            redirect(site_url('owners'));
        }
    }

    public function reg_email($str){
        if (!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $str)) {
            $this->form_validation->set_message('reg_email', 'Email is Invalid');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function reg_username($str){
        if (!preg_match("/^[a-zA-Z]*$/", $str)) {
            $this->form_validation->set_message('reg_username', 'Only Letters Are Allowed For Lastname');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function reg_pass($str){
        if (!preg_match('/^\S*(?=\S{7,15})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $str)) {
            $this->form_validation->set_message('reg_pass', 'Password Must Be Between 7 and 15 Characters and Must Contain At Least One Lowercase Letter One Uppercase Letter and One Digit');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('gender', 'gender', 'trim|required');
	$this->form_validation->set_rules('birth_date', 'birth date', 'trim|required');
	
	$this->form_validation->set_rules('owners_id', 'owners_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Owners.php */
/* Location: ./application/controllers/Owners.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-02 14:35:38 */
/* http://harviacode.com */