<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Categories_model');
        $this->load->model('Booklist_model');
        $this->load->model('Books_model');
        $this->load->model('Stores_model');
        $this->load->model('Adverts_model');
        $this->load->library('form_validation');
        $this->load->library('encryption');
        
        $data = array();
        $adsrow = $this->Adverts_model->get_is_datecom_all();
        if ($adsrow) {
            foreach ($adsrow as $key => $value) {
            $idadv = $value->adverts_id;
            $data[] = array(
                "is_active" => '0',
                "adverts_id" =>  $idadv,
            );
        }
        $this->Adverts_model->update_b($data, 'adverts_id');
        }
        
    }

    public function index()
    {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'Welcome/book_search.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Welcome/book_search.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Welcome/book_search.html';
            $config['first_url'] = base_url() . 'Welcome/book_search.html';
        }

        $config['per_page'] = 3;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Stores_model->total_rows($q);
        $detail = $this->Stores_model->get_limit($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'q' => $q,
            'thedata' => $detail,
            'pagination' => $this->pagination->create_links(),
            'title' => 'Login Page',
            'action' => base_url('Welcome/login'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'Adverts' => $this->Adverts_model->get_is_active_all(),
            'kategori' => $this->Categories_model->get_all_groupby(),
            'store_limit' => $this->Stores_model->get_limit(),
            'button' => 'Login',
        );

        $this->load->view('Front/welcome', $data);
    }
    
    public function login() {
        $this->login_rules();
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $login = $this->Auth_model->login($this->input->post('username'), ($hash = sha1($this->input->post('password'))));

            $loginown = $this->Auth_model->loginown($this->input->post('username'), ($hash = sha1($this->input->post('password'))));
            if ($login==1) {
                $row = $this->Auth_model->data_login($this->input->post('username'),($hash = sha1($this->input->post('password'))));
                $data = array(
                    'logged' => TRUE,
                    'username' => $row->username,
                    'id' => $row->admins_id,
                    'role'=>$row->role,
                    'is_admin'=>TRUE,
                );
                $this->session->set_userdata($data);
                redirect('admins/dashboard');
            }elseif ($loginown==1) {
                $row = $this->Auth_model->data_loginown($this->input->post('username'), ($hash = sha1($this->input->post('password'))));
                $data = array(
                    'logged' => TRUE,
                    'id' => $row->owners_id,
                    'username' => $row->username,
                    'stores_id' => $row->stores_id,
                    'is_admin'=>FALSE,
                );
                $this->session->set_userdata($data);
                redirect('dashboard');
        
             }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Username atau Password Salah.</div>');
                redirect('welcome');
            }
        } 
    }   

    public function book_search()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $kateg = urldecode($this->input->get('kateg', TRUE));

        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'Welcome/book_search.html?q=' . urlencode($q) . 'kateg=' . urlencode($kateg);
            $config['first_url'] = base_url() . 'Welcome/book_search.html?q=' . urlencode($q) . 'kateg=' . urlencode($kateg);
        } else {
            $config['base_url'] = base_url() . 'Welcome/book_search.html';
            $config['first_url'] = base_url() . 'Welcome/book_search.html';
        }

        $config['per_page'] = 6;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Booklist_model->s_total_rows($q, $kateg);
        $store_data = $this->Booklist_model->s_get_limit_data($config['per_page'], $start, $q, $kateg);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kateg' => $kateg,
            'q' => $q,
            'thedata' => $store_data,
            'pagination' => $this->pagination->create_links(),
            'title' => 'Login Page',
            'action' => base_url('welcome/login'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'kategorilist' => $this->Categories_model->get_data_limit(),
            'kategori' => $this->Categories_model->get_all_groupby(),
            'store_limit' => $this->Stores_model->get_limit(),
            'button' => 'Login',
        );

        $this->load->view('Front/search', $data);
    }

    public function store_search()
    {
        $q = urldecode($this->input->get('q', TRUE));

        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'Welcome/search.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'Welcome/search.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'Welcome/search.html';
            $config['first_url'] = base_url() . 'Welcome/search.html';
        }

        $config['per_page'] = 6;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Stores_model->total_rows($q);
        $store_data = $this->Stores_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'q' => $q,
            'thedata' => $store_data,
            'pagination' => $this->pagination->create_links(),
            'title' => 'Login Page',
            'action' => base_url('welcome/login'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'kategorilist' => $this->Categories_model->get_data_limit(),
            'kategori' => $this->Categories_model->get_all_groupby(),
            'store_limit' => $this->Stores_model->get_limit(),
            'button' => 'Login',
        );

        $this->load->view('Front/stsearch', $data);
    }

    public function detail($id)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'Welcome/detail/'.$id;
            $config['first_url'] = base_url() . 'Welcome/detail/'.$id;
        } else {
            $config['base_url'] = base_url() . 'Welcome/detail/'.$id.'.html';
            $config['first_url'] = base_url() . 'Welcome/detail/'.$id.'.html';
        }

        $config['per_page'] = 3;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Booklist_model->total_rows($q, $id);
        $detail = $this->Booklist_model->get_limit_data($config['per_page'], $start, $q, $id);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $row = $this->Stores_model->get_by_id($id);
        $data = array(
            'action' => base_url('welcome/login'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'q' => $q,
            'thedata' => $detail,
            'stores_id' => $row->stores_id,
            'stores_name' => $row->stores_name,
            'description' => $row->description,
            'address' => $row->address,
            'open' => $row->open,
            'contact' => $row->contact,
            'lat' => $row->lat,
            'lang' => $row->lang,
            'opening_at' => $row->opening_at,
            'closing_at' => $row->closing_at,
            'pagination' => $this->pagination->create_links(),
            'gambartoko' => $this->Stores_model->get_gambardb($id),
            'kategori' => $this->Categories_model->get_all(),
            'kateggroupbyname' => $this->Categories_model->get_groupbyname($id),
            'store_limit' => $this->Stores_model->get_limit(),
        );

        $this->load->view('Front/stores_detail', $data);
    }

    public function bookdetail($id)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'Welcome/detail/'.$id;
            $config['first_url'] = base_url() . 'Welcome/detail/'.$id;
        } else {
            $config['base_url'] = base_url() . 'Welcome/detail/'.$id.'.html';
            $config['first_url'] = base_url() . 'Welcome/detail/'.$id.'.html';
        }

        $config['per_page'] = 3;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Booklist_model->total_rows($q, $id);
        $detail = $this->Booklist_model->get_limit_data($config['per_page'], $start, $q, $id);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $row = $this->Books_model->get_by_id($id);
        $row2 = $this->Booklist_model->get_by_books_id($id);
        $data = array(
            'action' => base_url('welcome/login'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'q' => $q,
            'thedata' => $detail,
            'books_id' => set_value('books_id', $row->books_id),
            'title' => set_value('title', $row->title),
            'Release_date' => set_value('Release_date', $row->Release_date),
            'authors' => set_value('authors', $row->authors),
            'cover' => set_value('cover', $row->cover),
            'categories' => $this->Books_model->get_categoriesdb($row->books_id),
            'publishers' => set_value('publishers', $row->publishers),
            'ISBN' => set_value('ISBN', $row->ISBN),
            'price' => set_value('price', $row2->price),
            'book_stock' => set_value('book_stock', $row2->book_stock),
            'kategori' => $this->Categories_model->get_all(),
        );

        $this->load->view('Front/bookdetail', $data);
    }



    public function login_rules(){
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil Logout.</div>');
        redirect('welcome');
    }
}
