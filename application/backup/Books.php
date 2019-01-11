<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Books extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Books_model');
        $this->load->model('Categories_model');
        $this->load->library('form_validation');
        $this->load->helper('file');
        $this->load->helper(array('email', 'url', 'form'));
        
    }

    public function index()
    {
        $data = array(
            'books_data' => $this->Books_model->get_all()
        );
        $this->load->view('books/books_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Books_model->get_by_id($id);
        if ($row) {
            $data = array(
		'books_id' => $row->books_id,
		'title' => $row->title,
		'Release_date' => $row->Release_date,
		'categories_id' => $row->categories_id,
		'authors' => $row->authors,
		'publishers' => $row->publishers,
	    );
            $this->load->view('books/books_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('books'));
        }
    }

    public function create($error = null) 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('books/create_action'),
        'books_id' => $this->Books_model->get_kode(),
        'cover' => set_value('cover'),
	    'title' => set_value('title'),
	    'Release_date' => set_value('Release_date'),
	    'categories_id' => set_value('categories_id'),
	    'authors' => set_value('authors'),
	    'publishers' => set_value('publishers'),
        'error' => $error['error']
	);
        $this->load->view('books/books_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config['upload_path']          = './upload/cover/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $this->input->post('books_id',TRUE);
            $config['overwrite']            = true;
            $config['max_size']             = 1024; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->do_upload('cover');
            if ($this->upload->do_upload('cover')) {
                $data = array(
                    'books_id' => $this->input->post('books_id',TRUE),
                    'title' => $this->input->post('title',TRUE),
                    'Release_date' => $this->input->post('Release_date',TRUE),
                    'authors' => $this->input->post('authors',TRUE),
                    'publishers' => $this->input->post('publishers',TRUE),
                    'cover' => $this->input->post('books_id',TRUE),
                );

                $postx = $this->input->post();
                $categories = array();
                foreach($postx['categories_name'] AS $key => $val){
                    $categories[] = array(
                        "categories_name" => $postx['categories_name'][$key],
                        "books_id" => $postx['books_id']
                    );
                }

                $this->Categories_model->insert($categories);
                $this->Books_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('books'));
            }else{
                $error = array('error' => $this->upload->display_errors());
                $this->create($error);
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->Books_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('books/update_action'),
		'books_id' => set_value('books_id', $row->books_id),
		'title' => set_value('title', $row->title),
		'Release_date' => set_value('Release_date', $row->Release_date),
		'categories_id' => set_value('categories_id', $row->categories_id),
		'authors' => set_value('authors', $row->authors),
		'publishers' => set_value('publishers', $row->publishers),
	    );
            $this->load->view('books/books_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('books'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('books_id', TRUE));
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'Release_date' => $this->input->post('Release_date',TRUE),
		'categories_id' => $this->input->post('categories_id',TRUE),
		'authors' => $this->input->post('authors',TRUE),
		'publishers' => $this->input->post('publishers',TRUE),
	    );

            $this->Books_model->update($this->input->post('books_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('books'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Books_model->get_by_id($id);

        if ($row) {
            $this->Books_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('books'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('books'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('Release_date', 'release date', 'trim|required');
	$this->form_validation->set_rules('authors', 'authors', 'trim|required');
	$this->form_validation->set_rules('publishers', 'publishers', 'trim|required');

	$this->form_validation->set_rules('books_id', 'books_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Books.php */
/* Location: ./application/controllers/Books.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-08 14:36:45 */
/* http://harviacode.com */