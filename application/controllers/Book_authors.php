<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Book_authors extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Book_authors_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'book_authors/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'book_authors/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'book_authors/index.html';
            $config['first_url'] = base_url() . 'book_authors/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Book_authors_model->total_rows($q);
        $book_authors = $this->Book_authors_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'book_authors_data' => $book_authors,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('book_authors/book_authors_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Book_authors_model->get_by_id($id);
        if ($row) {
            $data = array(
		'book_authors_id' => $row->book_authors_id,
		'books_id' => $row->books_id,
		'authors_id' => $row->authors_id,
	    );
            $this->load->view('book_authors/book_authors_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('book_authors'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('book_authors/create_action'),
	    'book_authors_id' => set_value('book_authors_id'),
	    'books_id' => set_value('books_id'),
	    'authors_id' => set_value('authors_id'),
	);
        $this->load->view('book_authors/book_authors_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'books_id' => $this->input->post('books_id',TRUE),
		'authors_id' => $this->input->post('authors_id',TRUE),
	    );

            $this->Book_authors_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('book_authors'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Book_authors_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('book_authors/update_action'),
		'book_authors_id' => set_value('book_authors_id', $row->book_authors_id),
		'books_id' => set_value('books_id', $row->books_id),
		'authors_id' => set_value('authors_id', $row->authors_id),
	    );
            $this->load->view('book_authors/book_authors_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('book_authors'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('book_authors_id', TRUE));
        } else {
            $data = array(
		'books_id' => $this->input->post('books_id',TRUE),
		'authors_id' => $this->input->post('authors_id',TRUE),
	    );

            $this->Book_authors_model->update($this->input->post('book_authors_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('book_authors'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Book_authors_model->get_by_id($id);

        if ($row) {
            $this->Book_authors_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('book_authors'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('book_authors'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('books_id', 'books id', 'trim|required');
	$this->form_validation->set_rules('authors_id', 'authors id', 'trim|required');

	$this->form_validation->set_rules('book_authors_id', 'book_authors_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Book_authors.php */
/* Location: ./application/controllers/Book_authors.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-10 16:37:34 */
/* http://harviacode.com */