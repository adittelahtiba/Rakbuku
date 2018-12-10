<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Store_pictures_model extends CI_Model
{

    public $table = 'store_pictures';
    public $id = 'store_pictures_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('store_pictures_id,store_pictures_name,stores_id');
        $this->datatables->from('store_pictures');
        //add this line for join
        //$this->datatables->join('table2', 'store_pictures.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('store_pictures/read/$1'),'Read')." | ".anchor(site_url('store_pictures/update/$1'),'Update')." | ".anchor(site_url('store_pictures/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'store_pictures_id');
        return $this->datatables->generate();
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
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('store_pictures_id', $q);
	$this->db->or_like('store_pictures_name', $q);
	$this->db->or_like('stores_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('store_pictures_id', $q);
	$this->db->or_like('store_pictures_name', $q);
	$this->db->or_like('stores_id', $q);
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

}

/* End of file Store_pictures_model.php */
/* Location: ./application/models/Store_pictures_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-10 15:19:36 */
/* http://harviacode.com */