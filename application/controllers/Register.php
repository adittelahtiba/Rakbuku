<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Owners_model');
        $this->load->model('Stores_model');
        $this->load->model('Store_pictures_model');
        $this->load->helper(array('email', 'url', 'form'));
        $this->load->library('form_validation');
        $this->load->helper('file');
        $this->load->helper('date');
    }

    public function index($error = null)
    {
        $data = array(
            'button' => 'Create',
            'action' => base_url('register/index_action'),
            'owners_id' => set_value('owners_id'),
            'name' => set_value('name'),
            'email' => set_value('email'),
            'gender' => set_value('gender'),
            'birth_date' => set_value('birth_date'),
            'username' => set_value('username'),
            'password' => set_value('password'),

        );

        $data2 = array(
            'stores_id' => $this->Stores_model->get_kode(),
            'stores_name' => set_value('stores_name'),
            'description' => set_value('description'),
            'address' => set_value('address'),
            'open' => set_value('open'),
            'contact' => set_value('contact'),
            'opening_at' => set_value('opening_at'),
            'closing_at' => set_value('closing_at'),
            'lat' => set_value('lat'),
            'lang' => set_value('lang'),
            'error' => $error['error']
        );


        $load=$data+$data2;

        $this->load->view('Front/reg', $load);
    }

    public function index_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $config = array();
            $config['upload_path']    ='./upload/store_pictures/'; 
            $config['allowed_types'] = 'gif|jpg|png';
            // $config['max_size']      = '0';
            $config['overwrite']     = TRUE;

            $this->load->library('upload');

            $gambar = array();

            $files = $_FILES;
            $postx = $this->input->post();
            $store_pictures_name = $this->input->post('store_pictures_name');
            if (count($_FILES['store_pictures_name']['name'])<3) {
                $error = array('error' => '<span class="text-danger">Upload Foto Wisata Minimal 3</span>');
                $this->index($error);
            }else{
                for($i=0; $i< count($_FILES['store_pictures_name']['name']); $i++)
                {           

                    $_FILES['userfile']['name']= $files['store_pictures_name']['name'][$i];
                    $_FILES['userfile']['type']= $files['store_pictures_name']['type'][$i];
                    $_FILES['userfile']['tmp_name']= $files['store_pictures_name']['tmp_name'][$i];
                    $_FILES['userfile']['error']= $files['store_pictures_name']['error'][$i];
                    $_FILES['userfile']['size']= $files['store_pictures_name']['size'][$i];
                    
                    $image = explode(".", $_FILES['userfile']['name']);
                    $rename = $this->input->post('stores_id',TRUE) . $i . '.' . end($image);
                    
                    
                    $config['file_name']    = $rename;
                    $this->upload->initialize($config);
                    $this->upload->do_upload();
                    
                    $fileData = $this->upload->data();
                    $gambar[$i]['store_pictures_name'] = $fileData['file_name'];
                    $gambar[$i]['stores_id'] = $this->input->post('stores_id',TRUE);
                    
                }

                if(!$this->upload->do_upload('userfile')){ //berfungsi untuk melakukan fungsi upload
                    $error = array('error' => $this->upload->display_errors());
                    $this->index($error);
                }else{
                    $data = array(
                        'name' => $this->input->post('name',TRUE),
                        'email' => $this->input->post('email',TRUE),
                        'gender' => $this->input->post('gender',TRUE),
                        'birth_date' => $this->input->post('birth_date',TRUE),
                        'username' => $this->input->post('username',TRUE),
                        'password' => $this->input->post('password',TRUE),
                        'code' => $hash = sha1($this->input->post('stores_id')),
                        'stores_id' => $this->input->post('stores_id',TRUE),

                    );

                     $data2 = array(
                        'stores_id' => $this->input->post('stores_id',TRUE),
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

                    $this->Store_pictures_model->insert($gambar);
                    $this->Stores_model->insert($data2);
                    $this->Owners_model->insert($data);
                    $this->sendMail();
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Tambah Data Berhasil.</div>');
                    redirect('welcome');
                }
            }
        }
    }

     function sendMail() {
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "Wisatabandungdotcom@gmail.com";
        $config['smtp_pass'] = "Wisatabandungdotcom1440";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        
        $ci->email->initialize($config);
 
        $ci->email->from('Wisatabandungdotcom@gmail.com', 'Admin Wisata Bandung');
        $list = array($this->input->post('email'));
        $ci->email->to($list);
        $email = $this->session->userdata($this->input->post('email'));
        $username = $this->input->post('username');
        $owners_id = $this->input->post('owners_id');
        $kode = $hash = sha1($this->input->post('stores_id'));
        $ci->email->subject('Aktifasi akun anda di website wisata bandung');
        $ci->email->message('<!DOCTYPE html><html><head></head><body>
                                <p> Hai, '.$this->input->post('nama_pemilik'). '<br> Akun anda akan diregistrasi dengan username ' . $username .' Silahkan lanjutkan proses registrasi dengan mengklik tombol di bawah ini. <br>
                                '. anchor(site_url('Register/Aktifasi/'.$kode),'Aktifkan Akun')  .' <br>
                                Terima Kasih!
                                </body></html>');
        if ($this->email->send()) {
            
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function Aktifasi($kode){
        $row = $this->Owners_model->get_by_code($kode);
        
        if ($row) {
            $code = $row->code;
            $id = $row->owners_id;
            if ($code == $kode) {
                $Aktifasi = $this->Owners_model->register($id);

                $this->session->set_flashdata('message', '<div class="alert alert-success">Selamat anda sukses mendaftar di rakbuku, silahkan login</div>');
                redirect('Welcome');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Registrasi gagal</div>');
                redirect('Welcome');
            }
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
    $this->form_validation->set_rules('stores_name', 'store name', 'trim|required|is_unique[stores.stores_name]');
    $this->form_validation->set_rules('description', 'description', 'trim|required');
    $this->form_validation->set_rules('address', 'address', 'trim|required');
    $this->form_validation->set_rules('lat', 'lat', 'trim|required');
    $this->form_validation->set_rules('lang', 'lang', 'trim|required');
    $this->form_validation->set_rules('open', 'open', 'trim|required');
    $this->form_validation->set_rules('contact', 'contact', 'trim|required');
    
    $this->form_validation->set_rules('name', 'name', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[owners.email]|callback_reg_email');
    $this->form_validation->set_rules('gender', 'gender', 'trim|required');
    $this->form_validation->set_rules('birth_date', 'birth date', 'trim|required');
    $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[owners.username]');
    $this->form_validation->set_rules('password', 'password', 'trim|required|callback_reg_pass');
    
    

    $this->form_validation->set_rules('owners_id', 'owners_id', 'trim');

    $this->form_validation->set_rules('stores_id', 'stores_id', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}