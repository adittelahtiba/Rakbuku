<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Books_model extends CI_Model
{

    public $table = 'books';
    public $id = 'books_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_kode(){
        $this->db->select('RIGHT(books.books_id,4) as kode', FALSE);
        $this->db->order_by('books_id','DESC');    
        $this->db->limit(1);
          $query = $this->db->get('books');      //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
           //jika kode ternyata sudah ada.      
           $data = $query->row();      
           $kode = intval($data->kode) + 1;    
          }
          else {      
           //jika kode belum ada      
           $kode = 1;    
          }
          $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
          $d = date('Ymd');
          $kodejadi = "book-".$d.'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
          return $kodejadi;  
    }

    function get_categories(){
      $this->db->join('categories', 'categories.books_id=books.books_id');
      return $this->db->get('books')->result();
    }

    function get_categoriesdb($id){
      $this->db->join('categories', 'categories.books_id=books.books_id');
      $this->db->where('books.books_id=', $id);
      return $this->db->get('books')->result();
    }

    function get_cover_code(){
        $this->db->select('RIGHT(books.books_id,4) as kode', FALSE);
        $this->db->order_by('books_id','DESC');    
        $this->db->limit(1);
          $query = $this->db->get('books');      //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
           //jika kode ternyata sudah ada.      
           $data = $query->row();      
           $kode = intval($data->kode) + 1;    
          }
          else {      
           //jika kode belum ada      
           $kode = 1;    
          }
          $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
          $d = date('Ymd');
          $username = $this->session->userdata('username');
          $kodejadi = $username .'-'. "book-".$d.'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
          return $kodejadi;  
    }

    // get all
    function get_all()
    {
        $this->db->order_by('books.books_id', $this->order);
        $this->db->join('stores', 'booklist.stores_id=stores.stores_id');
        $this->db->join('books', 'booklist.books_id=books.books_id');
        return $this->db->get('booklist')->result();
    }

    function get_by_owners()
    {
        $this->db->order_by('books.books_id', $this->order);
        $this->db->join('stores', 'booklist.stores_id=stores.stores_id');
        $this->db->join('books', 'booklist.books_id=books.books_id');
        $this->db->join('owners', 'owners.stores_id=stores.stores_id');
        $this->db->where('owners.owners_id', $this->session->userdata('id'));
        return $this->db->get('booklist')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('books_id', $q);
	$this->db->or_like('title', $q);
	$this->db->or_like('Release_date', $q);
	$this->db->or_like('categories_id', $q);
	$this->db->or_like('authors', $q);
	$this->db->or_like('publishers', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('books_id', $q);
	$this->db->or_like('title', $q);
	$this->db->or_like('Release_date', $q);
	$this->db->or_like('categories_id', $q);
	$this->db->or_like('authors', $q);
	$this->db->or_like('publishers', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // public function upload_file($filename)
    // {
    //   $this->load->library('upload'); // Load librari upload
      
    //   $config['upload_path'] = './upload/';
    //   $config['allowed_types'] = 'xlsx';
    //   $config['max_size']  = '2048';
    //   $config['overwrite'] = true;
    //   $config['file_name'] = $filename;
    
    //   $this->upload->initialize($config); // Load konfigurasi uploadnya
    //   if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
    //     // Jika berhasil :
    //     $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
    //     return $return;
    //   }else{
    //     // Jika gagal :
    //     $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
    //     return $return;
    //   }
    // }

    function insert_b($data)
    {
        $this->db->insert_batch($this->table, $data);
    }

}

/* End of file Books_model.php */
/* Location: ./application/models/Books_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-08 14:36:45 */
/* http://harviacode.com */