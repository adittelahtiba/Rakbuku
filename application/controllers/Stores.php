<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stores extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Stores_model');
        $this->load->model('Store_pictures_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'stores/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'stores/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'stores/index.html';
            $config['first_url'] = base_url() . 'stores/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Stores_model->total_rows($q);
        $stores = $this->Stores_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'stores_data' => $stores,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('stores/stores_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Stores_model->get_by_id($id);
        if ($row) {
            $data = array(
		'stores_id' => $row->stores_id,
		'stores_name' => $row->stores_name,
		'description' => $row->description,
		'address' => $row->address,
		'open' => $row->open,
		'contact' => $row->contact,
		'opening_at' => $row->opening_at,
		'closing_at' => $row->closing_at,
	    );
            $this->load->view('stores/stores_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stores'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('stores/create_action'),
	    'stores_id' => set_value('stores_id'),
	    'stores_name' => set_value('stores_name'),
	    'description' => set_value('description'),
	    'address' => set_value('address'),
	    'open' => set_value('open'),
	    'contact' => set_value('contact'),
	    'opening_at' => set_value('opening_at'),
	    'closing_at' => set_value('closing_at'),
	);
        $this->load->view('stores/stores_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'stores_name' => $this->input->post('stores_name',TRUE),
		'description' => $this->input->post('description',TRUE),
		'address' => $this->input->post('address',TRUE),
		'open' => $this->input->post('open',TRUE),
		'contact' => $this->input->post('contact',TRUE),
		'opening_at' => $this->input->post('opening_at',TRUE),
		'closing_at' => $this->input->post('closing_at',TRUE),
	    );

            $this->Stores_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('stores'));
        }
    }
    
    public function update($id, $error = null) 
    {
        $row = $this->Stores_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('stores/update_action'),
        		'stores_id' => set_value('stores_id', $row->stores_id),
        		'stores_name' => set_value('stores_name', $row->stores_name),
        		'description' => set_value('description', $row->description),
        		'address' => set_value('address', $row->address),
        		'open' => set_value('open', $row->open),
                'lat' => set_value('lat', $row->lat),
                'lang' => set_value('lang', $row->lang),
        		'contact' => set_value('contact', $row->contact),
        		'opening_at' => set_value('opening_at', $row->opening_at),
        		'closing_at' => set_value('closing_at', $row->closing_at),
                'store_p' => $this->Stores_model->get_gambar(),
                'error' => $error['error']
	       );
            $this->load->view('stores/stores_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stores'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('stores_id', TRUE));
        } else {

        $post = $this->input->post();
            $config = array();
            $config['upload_path']    ='./upload/store_pictures/'; 
            $config['allowed_types'] = 'gif|jpg|png';
            $config['overwrite']     = TRUE;
            $this->load->library('upload');
            $gambar = array();
            $files = $_FILES;
            $nama_gambar = $this->input->post('store_pictures_name');
            
            
            $xxxoo = $this->Stores_model->get_gambardb($this->input->post('stores_id',TRUE));
            $yy = count($xxxoo);
            for($i=0; $i< count($_FILES['store_pictures_name']['name']); $i++){
                $xooii = $yy + $i;
                $_FILES['userfile']['name']= $files['store_pictures_name']['name'][$i];
                $_FILES['userfile']['type']= $files['store_pictures_name']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['store_pictures_name']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['store_pictures_name']['error'][$i];
                $_FILES['userfile']['size']= $files['store_pictures_name']['size'][$i];

                $image = explode(".", $_FILES['userfile']['name']);
                $rename = $this->input->post('stores_id',TRUE) . $xooii . '.' . end($image);
                $config['file_name']    = $rename;

                $this->upload->initialize($config);
                $this->upload->do_upload();
                
                $fileData = $this->upload->data();
                $gambar[$i]['store_pictures_name'] = $fileData['file_name'];
                $gambar[$i]['stores_id'] = $this->input->post('stores_id',TRUE);
            }
            if(!$this->upload->do_upload('userfile')){ //berfungsi untuk melakukan fungsi upload
                $error = array('error' => $this->upload->display_errors());
                $this->update($this->input->post('stores_id', TRUE), $error);
            }else{
                $this->Store_pictures_model->insert($gambar);
            }

            if (!empty($_FILES['store_pictures_name1']['name'])) {
                $config1 = array();
                $config1['upload_path']    ='./upload/store_pictures/'; 
                $config1['allowed_types'] = 'gif|jpg|png';
                $config1['overwrite']     = TRUE;
                $this->load->library('upload');
                $gambar1 = array();
                $files = $_FILES;
                $store_pictures_name1 = $this->input->post('store_pictures_name1');
                $post = $this->input->post();
                
                $xxxoo = $this->Stores_model->get_gambardb($this->input->post('stores_id',TRUE));
                $yy = count($xxxoo);
                for($i=0; $i< count($_FILES['store_pictures_name1']['name']); $i++){
                    $xooii = $yy + $i;
                    $_FILES['userfile']['name']= $files['store_pictures_name1']['name'][$i];
                    $_FILES['userfile']['type']= $files['store_pictures_name1']['type'][$i];
                    $_FILES['userfile']['tmp_name']= $files['store_pictures_name1']['tmp_name'][$i];
                    $_FILES['userfile']['error']= $files['store_pictures_name1']['error'][$i];
                    $_FILES['userfile']['size']= $files['store_pictures_name1']['size'][$i];
                    
                    $image = explode(".", $_FILES['userfile']['name']);
                    $rename1 = $this->input->post('stores_id',TRUE) . $i . '.' . end($image);
                    
                    $config1['file_name']    = $rename1;
                    $this->upload->initialize($config1);
                    $this->upload->do_upload();
                    
                    $fileData = $this->upload->data();
                    $gambar1[$i]['store_pictures_id'] = $post['store_pictures_id1'][$i];
                    $gambar1[$i]['store_pictures_name'] = $fileData['file_name'];
                    //$gambar[$i]['id_wisata'] = $this->input->post('id_wisata',TRUE);
                }
                if(!$this->upload->do_upload('userfile')){ //berfungsi untuk melakukan fungsi upload
                    $error = array('error' => $this->upload->display_errors());
                    $this->update($this->input->post('stores_id', TRUE), $error);
                }else{
                    $this->Store_pictures_model->update($gambar1, 'store_pictures_id');
                }
            }

            $data = array(
        		'stores_name' => $this->input->post('stores_name',TRUE),
        		'description' => $this->input->post('description',TRUE),
        		'address' => $this->input->post('address',TRUE),
        		'open' => $this->input->post('open',TRUE),
        		'contact' => $this->input->post('contact',TRUE),
        		'opening_at' => $this->input->post('opening_at',TRUE),
        		'closing_at' => $this->input->post('closing_at',TRUE),
                'lat' => $this->input->post('lat',TRUE),
                'lang' => $this->input->post('lang',TRUE),
    	    );

            $this->Stores_model->update($this->input->post('stores_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            if ($this->session->userdata('is_admin') == FALSE) {
                redirect(site_url('dashboard'));
            }else{
                redirect(site_url('stores'));
            }
            
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Stores_model->get_by_id($id);

        if ($row) {
            $this->Stores_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('stores'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stores'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('stores_name', 'store name', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('open', 'open', 'trim|required');
	$this->form_validation->set_rules('contact', 'contact', 'trim|required');
	$this->form_validation->set_rules('opening_at', 'opening at', 'trim|required');
	$this->form_validation->set_rules('closing_at', 'closing at', 'trim|required');

	$this->form_validation->set_rules('stores_id', 'stores_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Stores.php */
/* Location: ./application/controllers/Stores.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-04 07:14:55 */
/* http://harviacode.com */