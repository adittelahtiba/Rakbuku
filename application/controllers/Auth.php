<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
 	
 	function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
        $this->load->library('encryption');
    }

  public function index() {
        $data = array(
            'title' => 'Login Page',
            'action' => site_url('auth/login'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'button' => 'Login',
        );
        $this->load->view('login/login', $data);
    }

    public function login() {
        $this->login_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $login = $this->Auth_model->login($this->input->post('username'), ($this->input->post('password')));

            $loginown = $this->Auth_model->loginown($this->input->post('username'), ($this->input->post('password')));
            if ($login==1) {
                $row = $this->Auth_model->data_login($this->input->post('username'),($this->input->post('password')));
                $data = array(
                    'logged' => TRUE,
                    'username' => $row->username,
                    'id' => $row->admins_id,
                    'role'=>$row->role,
                    'is_admin'=>TRUE,
                );
                $this->session->set_userdata($data);
                redirect(site_url('admins/dashboard'));
            }elseif ($loginown==1) {
                $row = $this->Auth_model->data_loginown($this->input->post('username'), ($this->input->post('password')));
                $data = array(
                    'logged' => TRUE,
                    'id' => $row->owners_id,
                    'username' => $row->username,
                    'stores_id' => $row->stores_id,
                    'is_admin'=>FALSE,
                );
                $this->session->set_userdata($data);
                redirect(site_url('dashboard'));
        
             }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Username atau Password Salah.</div>');
                redirect(site_url('auth'));
            }
        } 
    }

    public function login_rules(){
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    

    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil Logout.</div>');
        redirect(site_url('Auth'));
    }
 
}
 
/* End of file auth.php */
/* Location: ./application/controllers/auth.php */

?>