<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booklist extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Booklist_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'booklist/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'booklist/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'booklist/index.html';
            $config['first_url'] = base_url() . 'booklist/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Booklist_model->total_rows($q);
        $booklist = $this->Booklist_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'booklist_data' => $booklist,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('booklist/booklist_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Booklist_model->get_by_id($id);
        if ($row) {
            $data = array(
		'booklist_id' => $row->booklist_id,
		'stores_id' => $row->stores_id,
		'books_id' => $row->books_id,
		'book_stock' => $row->book_stock,
		'price' => $row->price,
	    );
            $this->load->view('booklist/booklist_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('booklist'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('booklist/create_action'),
	    'booklist_id' => set_value('booklist_id'),
	    'stores_id' => set_value('stores_id'),
	    'books_id' => set_value('books_id'),
	    'book_stock' => set_value('book_stock'),
	    'price' => set_value('price'),
	);
        $this->load->view('booklist/booklist_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'stores_id' => $this->input->post('stores_id',TRUE),
		'books_id' => $this->input->post('books_id',TRUE),
		'book_stock' => $this->input->post('book_stock',TRUE),
		'price' => $this->input->post('price',TRUE),
	    );

            $this->Booklist_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('booklist'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Booklist_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('booklist/update_action'),
		'booklist_id' => set_value('booklist_id', $row->booklist_id),
		'stores_id' => set_value('stores_id', $row->stores_id),
		'books_id' => set_value('books_id', $row->books_id),
		'book_stock' => set_value('book_stock', $row->book_stock),
		'price' => set_value('price', $row->price),
	    );
            $this->load->view('booklist/booklist_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('booklist'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('booklist_id', TRUE));
        } else {
            $data = array(
		'stores_id' => $this->input->post('stores_id',TRUE),
		'books_id' => $this->input->post('books_id',TRUE),
		'book_stock' => $this->input->post('book_stock',TRUE),
		'price' => $this->input->post('price',TRUE),
	    );

            $this->Booklist_model->update($this->input->post('booklist_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('booklist'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Booklist_model->get_by_id($id);

        if ($row) {
            $this->Booklist_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('booklist'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('booklist'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('stores_id', 'stores id', 'trim|required');
	$this->form_validation->set_rules('books_id', 'books id', 'trim|required');
	$this->form_validation->set_rules('book_stock', 'book stock', 'trim|required');
	$this->form_validation->set_rules('price', 'price', 'trim|required');

	$this->form_validation->set_rules('booklist_id', 'booklist_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Booklist.php */
/* Location: ./application/controllers/Booklist.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-10 16:37:35 */
/* http://harviacode.com */