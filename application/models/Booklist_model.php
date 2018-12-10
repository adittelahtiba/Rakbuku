<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booklist_model extends CI_Model
{

    public $table = 'booklist';
    public $id = 'booklist_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('booklist_id,stores_id,books_id,book_stock,price');
        $this->datatables->from('booklist');
        //add this line for join
        //$this->datatables->join('table2', 'booklist.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('booklist/read/$1'),'Read')." | ".anchor(site_url('booklist/update/$1'),'Update')." | ".anchor(site_url('booklist/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'booklist_id');
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
        $this->db->like('booklist_id', $q);
	$this->db->or_like('stores_id', $q);
	$this->db->or_like('books_id', $q);
	$this->db->or_like('book_stock', $q);
	$this->db->or_like('price', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('booklist_id', $q);
	$this->db->or_like('stores_id', $q);
	$this->db->or_like('books_id', $q);
	$this->db->or_like('book_stock', $q);
	$this->db->or_like('price', $q);
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

/* End of file Booklist_model.php */
/* Location: ./application/models/Booklist_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-12-10 15:19:35 */
/* http://harviacode.com */