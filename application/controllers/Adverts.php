<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adverts extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged')) {
            $this->session->set_flashdata('message', '<div class="alert media fade in alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Anda Belum Login, Silahkan Login Terlebih Dahulu.<br></div>');
            redirect(site_url('Welcome'));
        }elseif(!$this->session->userdata('is_admin')) {
            echo "<script>window.location.href='javascript:history.back(-2);'</script>";
        }
        $this->load->model('Adverts_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'adverts_data' => $this->Adverts_model->get_all()
        );
        $this->load->view('adverts/adverts_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Adverts_model->get_by_id($id);
        if ($row) {
            $data = array(
		'adverts_id' => $row->adverts_id,
		'adverts_name' => $row->adverts_name,
		'stores_id' => $row->stores_id,
	    );
            $this->load->view('adverts/adverts_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('adverts'));
        }
    }

    public function create($error=null) 
    {
        $data = array(
            'button' => 'Create',
            'get_store' => $this->Adverts_model->get_store(),
            'action' => site_url('adverts/create_action'),
    	    'date_of_order' => set_value('date_of_order'),
            'date_of_com' => set_value('date_of_com'),
            'img' => set_value('img'),
    	    'stores_id' => set_value('stores_id'),
            'error' => $error['error']
        );
        $this->load->view('adverts/adverts_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config['upload_path']          = './upload/adverts/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $this->Adverts_model->get_kode();
            $config['overwrite']            = true;
            $config['max_size']             = 5024;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->do_upload('img');
            $fileData = $this->upload->data();
            if ($this->upload->do_upload('img')) {
            $data = array(
                'date_of_order' => $this->input->post('date_of_order',TRUE),
                'date_of_com' => $this->input->post('date_of_com',TRUE),
                'img' => $fileData['file_name'],
                'stores_id' => $this->input->post('stores_id',TRUE),
            );
            $this->Adverts_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('adverts'));
        }else{
            $error = array('error' => $this->upload->display_errors());
            $this->create($error);
        }
            
        }
    }
    
    public function update($id, $error=null) 
    {
        $row = $this->Adverts_model->get_by_id($id);

        if ($row) {
            $data = array(
                'get_store' => $this->Adverts_model->get_store(),
                'button' => 'Update',
                'action' => site_url('adverts/update_action'),
        		'adverts_id' => set_value('adverts_id', $row->adverts_id),
        		'stores_id' => set_value('stores_id', $row->stores_id),
                'date_of_order' => set_value('date_of_order', $row->date_of_order),
                'date_of_com' => set_value('date_of_com', $row->date_of_com),
                'img' => set_value('img', $row->img),
                'error' => $error['error']
	       );
            $this->load->view('adverts/adverts_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('adverts'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('adverts_id', TRUE));
        } else {
            $config['upload_path']          = './upload/adverts/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $this->input->post('img',TRUE);
            $config['overwrite']            = true;
            $config['max_size']             = 1024; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->do_upload('img');

            $data = array(
                'adverts_id' => $this->input->post('adverts_id',TRUE),
		          'date_of_order' => $this->input->post('date_of_order',TRUE),
                'date_of_com' => $this->input->post('date_of_com',TRUE),
                'img' => $fileData['file_name'],
                'stores_id' => $this->input->post('stores_id',TRUE),
	       );

            $this->Adverts_model->update($this->input->post('adverts_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('adverts'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Adverts_model->get_by_id($id);

        if ($row) {
            $this->Adverts_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('adverts'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('adverts'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('date_of_com', 'stores id', 'trim|required');
    $this->form_validation->set_rules('date_of_order', 'adverts name', 'trim|required');
    $this->form_validation->set_rules('stores_id', 'stores id', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Adverts.php */
/* Location: ./application/controllers/Adverts.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-10 16:37:33 */
/* http://harviacode.com */