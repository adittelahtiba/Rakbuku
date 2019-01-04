<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Auth_model extends CI_Model {

   

    function __construct()
    {
        parent::__construct();
    }
    
//    untuk mengcek jumlah username dan password yang sesuai
    function login($username,$password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query =  $this->db->get('admins');
        return $query->num_rows();
    }
    
//    untuk mengambil data hasil login
    function data_login($username,$password) {
        $this->db->get('admins');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('admins')->row();
    }

    
    function loginown($NIK,$password) {
        $this->db->where('username', $NIK);
        $this->db->where('password', $password);
        $this->db->where('is_verify=', '1');
        $query =  $this->db->get('owners');
        return $query->num_rows();
    }
    
    function data_loginown($NIK,$password) {
        $this->db->get('owners');
        $this->db->where('username', $NIK);
        $this->db->where('password', $password);
        $this->db->where('is_verify=', '1');
        return $this->db->get('owners')->row();
    }
}