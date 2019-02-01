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
    
    public function delete($id) 
    {
        $row = $this->Store_pictures_model->get_by_id($id);

        if ($row) {
            $this->Store_pictures_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil dihapus.</div>');
            redirect(site_url('stores/update/' .$row->stores_id));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Yang Di cari Tidak Ditemukan.</div>');
            redirect(site_url('dashboard'));
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