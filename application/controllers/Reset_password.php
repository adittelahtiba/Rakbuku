<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reset_password extends CI_Controller {
 	
 	function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Owners_model');
        $this->load->library('form_validation');
        $this->load->library('encryption');
    }

    public function index() {
        $data = array(
            'title' => 'Reset password',
            'action' => site_url('reset_password/action'),
            'email' => set_value('email'),
            'button' => 'Kirim',
        );
        $this->load->view('login/reset_password', $data);
    }

    public function action() {
       $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'email' => $this->input->post('email',TRUE),
        );

            $this->reset_password_mail();
            $this->session->set_flashdata('message', 'Email Reset Password Akan Segera Terkirim Ke Email Anda, Silahkan Perikasa Email Anda Untuk Melakukan Reset Password');
            redirect(site_url('auth'));
        }
    }

    function reset_password_mail() {
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "Wisatabandungdotcom@gmail.com";
        $config['smtp_pass'] = "Wisatabandungdotcom13";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        
        $ci->email->initialize($config);
 
        $ci->email->from('Wisatabandungdotcom@gmail.com', 'Admin Rakbuku');
        $list = array($this->input->post('email'));
        $ci->email->to($list);
        $email = $this->session->userdata($this->input->post('email'));
        $ssemail = $this->input->post('email');
        $row = $this->Owners_model->get_by_email($ssemail);
        
        $code = $row->code;
        $ci->email->subject('Reset password Rakbuku');
        $ci->email->message('<!DOCTYPE html><html><head></head><body>
                                <p> Hai, <br> Anda Akan Melakukan Reset Password Silahkan Lanjutkan dengan mengklik tombol di bawah ini. <br>
                                '. anchor(site_url('Reset_password/Reset/'.$code),'Aktifkan Akun')  .' <br>
                                Terima Kasih!
                                </body></html>');
        if ($this->email->send()) {
            
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function reset($kode)
    {   
        $row = $this->Owners_model->get_by_code($kode);
        if ($row) {
            $code = $row->code;
            $id = $row->owners_id;
            if ($code == $kode) {
                $data = array(
                    'title' => 'Reset password',
                    'action' => site_url('reset_password/reset_action'),
                    'password' => set_value('password'),
                    'button' => 'Ubah',
                    'tkode' => 'Ubah',
                    'xcode' => $code,
                    'owners_id'=> $row->owners_id,
                );
                $this->load->view('login/reset', $data);
            }
        }else{
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('auth'));
        }
    }

    public function reset_action(){

        $this->form_validation->set_rules('password', 'password', 'trim|required|callback_reg_pass');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->reset($this->input->post('xcode', TRUE));
        } else {
            $data = array(
                'password' => $this->input->post('password',TRUE),
            );

            $this->Owners_model->update($this->input->post('owners_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Selamat anda sukses mereset password');
            redirect(site_url('auth'));
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

    public function _rules(){
        $this->form_validation->set_rules('email', 'email', 'trim|required|callback_reg_email');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
 
}
 
/* End of file auth.php */
/* Location: ./application/controllers/auth.php */

?>