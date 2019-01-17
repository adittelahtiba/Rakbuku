<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stores_model extends CI_Model
{

    public $table = 'stores';
    public $id = 'stores_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_name_by_id($id)
    {
        $this->db->select('store_naxxme');
        $this->db->where($this->id, $id);
        $this->db->get($this->table);
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('stores_id', $q);
	$this->db->or_like('store_name', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('open', $q);
	$this->db->or_like('contact', $q);
	$this->db->or_like('opening_at', $q);
	$this->db->or_like('closing_at', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('stores_id', $q);
	$this->db->or_like('store_name', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('open', $q);
	$this->db->or_like('contact', $q);
	$this->db->or_like('opening_at', $q);
	$this->db->or_like('closing_at', $q);
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

    function get_gambar(){
      $this->db->join('store_pictures', 'store_pictures.stores_id=stores.stores_id');
      return $this->db->get('stores')->result();
    }

    function get_gambardb($id){
        $this->db->join('store_pictures', 'store_pictures.stores_id=stores.stores_id');
        $this->db->where('stores.stores_id=', $id);
        return $this->db->get('stores')->result();
    }

    function get_kode(){
        $this->db->select('RIGHT(stores.stores_id,4) as kode', FALSE);
        $this->db->order_by('stores_id','DESC');    
        $this->db->limit(1);
          $query = $this->db->get('stores');      //cek dulu apakah ada sudah ada kode di tabel.    
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
          $kodejadi = "str-".$d.'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
          return $kodejadi;  
    }

}

/* End of file Stores_model.php */
/* Location: ./application/models/Stores_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-04 07:14:55 */
/* http://harviacode.com */