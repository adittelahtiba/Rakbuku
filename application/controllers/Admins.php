<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admins extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda Belum Login, Silahkan Login Terlebih Dahulu.</div>');
            redirect(site_url('welcome'));
        }

        $this->load->model('Admins_model');
        $this->load->library('form_validation');
    }

    public function dashboard() {
        $this->load->view('admins/dashboard');
    }

    public function index()
    {
        $this->_admin();
        $data = array(
            'admins_data' => $this->Admins_model->get_all()
        );
        $this->load->view('admins/admins_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Admins_model->get_by_id($id);
        if ($row) {
            $data = array(
		'admins_id' => $row->admins_id,
		'username' => $row->username,
		'password' => $row->password,
		'name' => $row->name,
		'Gender' => $row->Gender,
		'birth_date' => $row->birth_date,
		'Address' => $row->Address,
		'telp_number' => $row->telp_number,
        'email' => $row->email,
		'role' => $row->role,
	    );
            $this->load->view('admins/admins_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Yang Di cari Tidak Ditemukan.</div>');
            redirect(site_url('admins'));
        }
    }

    public function create() 
    {
        $this->_admin();
        $data = array(
            'button' => 'Create',
            'action' => site_url('admins/create_action'),
	    'admins_id' => $this->Admins_model->get_kode(),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'name' => set_value('name'),
	    'Gender' => set_value('Gender'),
	    'birth_date' => set_value('birth_date'),
	    'Address' => set_value('Address'),
	    'telp_number' => set_value('telp_number'),
        'email' => set_value('email'),
	    'role' => set_value('role'),
	);
        $this->load->view('admins/admins_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $this->_admin();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'admins_id' => $this->input->post('admins_id',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'name' => $this->input->post('name',TRUE),
		'Gender' => $this->input->post('Gender',TRUE),
		'birth_date' => $this->input->post('birth_date',TRUE),
		'Address' => $this->input->post('Address',TRUE),
		'telp_number' => $this->input->post('telp_number',TRUE),
        'email' => $this->input->post('email',TRUE),
		'role' => $this->input->post('role',TRUE),
	    );

            $this->Admins_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Tambah Data Berhasil.</div>');
            redirect(site_url('admins'));
        }
    }
    
    public function update($id) 
    {
        if($this->session->userdata('id')!==$id) {
            echo "<script>window.location.href='javascript:history.back(-2);'</script>";
        }
        if(!$this->session->userdata('is_admin')) {
            echo "<script>window.location.href='javascript:history.back(-2);'</script>";
        }
        $row = $this->Admins_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admins/update_action'),
		'admins_id' => set_value('admins_id', $row->admins_id),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'name' => set_value('name', $row->name),
		'Gender' => set_value('Gender', $row->Gender),
		'birth_date' => set_value('birth_date', $row->birth_date),
		'Address' => set_value('Address', $row->Address),
		'telp_number' => set_value('telp_number', $row->telp_number),
        'email' => set_value('email', $row->email),
		'role' => set_value('role', $row->role),
	    );
            $this->load->view('admins/admins_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Yang Di cari Tidak Ditemukan.</div>');
            redirect(site_url('admins'));
        }
    }
    
    public function update_action() 
    {
        if(!$this->session->userdata('is_admin')) {
            echo "<script>window.location.href='javascript:history.back(-2);'</script>";
        }

        $this->_rules();
        $row = $this->Admins_model->get_by_id($this->input->post('admins_id',TRUE));

        if ($this->input->post('password',TRUE) !== '') {
            $this->form_validation->set_rules('password', 'password', 'trim|required|callback_reg_pass');
        }
        if ($this->input->post('email',TRUE) <> $row->email) {
            $this->form_validation->set_rules('email', 'email', 'trim|required|callback_reg_email|is_unique[admins.email]');
        }
        if ($this->input->post('username',TRUE) <> $row->username) {
            $this->form_validation->set_rules('username', 'username', 'trim|required|callback_reg_username|is_unique[admins.username]');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('admins_id', TRUE));
        } else {
             if ($this->input->post('email',TRUE) !== $row->email) {
                if ($this->input->post('password',TRUE) !== '') {
                    $data = array(
                        'username' => $this->input->post('username',TRUE),
                        'password' => $this->input->post('password',TRUE),
                        'name' => $this->input->post('name',TRUE),
                        'Gender' => $this->input->post('Gender',TRUE),
                        'birth_date' => $this->input->post('birth_date',TRUE),
                        'Address' => $this->input->post('Address',TRUE),
                        'telp_number' => $this->input->post('telp_number',TRUE),
                        'email' => $this->input->post('email',TRUE),
                        'role' => $this->input->post('role',TRUE),
                    );
                }else{
                    $data = array(
                        'username' => $this->input->post('username',TRUE),
                        'name' => $this->input->post('name',TRUE),
                        'Gender' => $this->input->post('Gender',TRUE),
                        'birth_date' => $this->input->post('birth_date',TRUE),
                        'Address' => $this->input->post('Address',TRUE),
                        'telp_number' => $this->input->post('telp_number',TRUE),
                        'email' => $this->input->post('email',TRUE),
                        'role' => $this->input->post('role',TRUE),
                    );
                }
            }else{
                if ($this->input->post('password',TRUE) !== '') {
                    $data = array(
                        'username' => $this->input->post('username',TRUE),
                        'password' => $this->input->post('password',TRUE),
                        'name' => $this->input->post('name',TRUE),
                        'Gender' => $this->input->post('Gender',TRUE),
                        'birth_date' => $this->input->post('birth_date',TRUE),
                        'Address' => $this->input->post('Address',TRUE),
                        'telp_number' => $this->input->post('telp_number',TRUE),
                        'role' => $this->input->post('role',TRUE),
                    );
                }else{
                    $data = array(
                        'username' => $this->input->post('username',TRUE),
                        'name' => $this->input->post('name',TRUE),
                        'Gender' => $this->input->post('Gender',TRUE),
                        'birth_date' => $this->input->post('birth_date',TRUE),
                        'Address' => $this->input->post('Address',TRUE),
                        'telp_number' => $this->input->post('telp_number',TRUE),
                        'role' => $this->input->post('role',TRUE),
                    );
                }
            }
            

            $this->Admins_model->update($this->input->post('admins_id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Ubah Data Berhasil.</div>');
            redirect(site_url('admins'));
        }
    }
    
    public function delete($id) 
    {
        $this->_admin();
        $row = $this->Admins_model->get_by_id($id);

        if ($row) {
            $this->Admins_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Hapus Data Berhasil.</div>');
            redirect(site_url('admins'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Yang Di cari Tidak Ditemukan.</div>');
            redirect(site_url('admins'));
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

    public function _admin(){
        if($this->session->userdata('role')==0) {
            echo "<script>window.location.href='javascript:history.back(-2);'</script>";
        }elseif(!$this->session->userdata('is_admin')) {
            echo "<script>window.location.href='javascript:history.back(-2);'</script>";
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
    $this->form_validation->set_rules('Gender', 'gender', 'trim|required');
	$this->form_validation->set_rules('birth_date', 'birth date', 'trim|required');
	$this->form_validation->set_rules('Address', 'address', 'trim|required');
	$this->form_validation->set_rules('telp_number', 'telp number', 'trim|required|numeric');
	$this->form_validation->set_rules('role', 'role', 'trim|required');

	$this->form_validation->set_rules('admins_id', 'admins_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Admins.php */
/* Location: ./application/controllers/Admins.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-10 16:37:33 */
/* http://harviacode.com */