<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Books extends CI_Controller
{
    function __construct()
    {
        
        parent::__construct();

        if ($this->session->userdata('logged')<>1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda Belum Login, Silahkan Login Terlebih Dahulu.</div>');
            redirect(site_url('Welcome'));
        }
        $this->load->model('Books_model');
        $this->load->model('Booklist_model');
        $this->load->model('Categories_model');
        $this->load->library('form_validation');
        $this->load->helper('file');
        $this->load->helper(array('email', 'url', 'form'));
        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');
        
    }

    public function index()
    {
        if ($this->session->userdata('is_admin')) {
            $data = array(
                'books_data' => $this->Books_model->get_all()
            );    
        }elseif (!$this->session->userdata('is_admin')) {
            $data = array(
                'books_data' => $this->Books_model->get_by_owners()
            );    
        }
        
        $this->load->view('books/books_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Books_model->get_by_id($id);
        $row2 = $this->Booklist_model->get_by_books_id($id);

        if ($row) {
            $data = array(
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
            );
            $this->load->view('books/books_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Yang Di cari Tidak Ditemukan.</div>');
            redirect(site_url('books'));
        }
    }

    public function create($error = null) 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('books/create_action'),
        'books_id' => $this->Books_model->get_kode(),
        'categories' => $this->Books_model->get_categories(),
        'title' => set_value('title'),
	    'Release_date' => set_value('Release_date'),
	    'categories_id' => set_value('categories_id'),
	    'authors' => set_value('authors'),
        'ISBN' => set_value('ISBN'),
	    'publishers' => set_value('publishers'),
        'cover' => set_value('cover'),
        'price' => set_value('price'),
        'book_stock' => set_value('book_stock'),
        'error' => $error['error']
	);
        $this->load->view('books/books_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config['upload_path']          = './upload/cover/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $this->Books_model->get_cover_code();
            $config['overwrite']            = true;
            $config['max_size']             = 1024; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->do_upload('cover');
            $fileData = $this->upload->data();
            if ($this->upload->do_upload('cover')) {
                $data = array(
                    'books_id' => $this->input->post('books_id',TRUE),
                    'title' => $this->input->post('title',TRUE),
                    'Release_date' => $this->input->post('Release_date',TRUE),
                    'authors' => $this->input->post('authors',TRUE),
                    'ISBN' => $this->input->post('ISBN',TRUE),
                    'publishers' => $this->input->post('publishers',TRUE),
                    'cover' => $fileData['file_name'],
                );

                $data2 = array(
                    'stores_id' => $this->session->userdata('stores_id'),
                    'books_id' => $this->input->post('books_id',TRUE),
                    'book_stock' => $this->input->post('book_stock',TRUE),  
                    'price' => $this->input->post('price',TRUE),
                    
                );
                $postx = $this->input->post();
                $categories = array();
                foreach($postx['categories_name'] AS $key => $val){
                    $categories[] = array(
                        "categories_name" => $postx['categories_name'][$key],
                        "books_id" => $postx['books_id']
                    );
                }

                $this->Categories_model->insert($categories);
                $this->Books_model->insert($data);
                $this->Booklist_model->insert($data2);

                $this->session->set_flashdata('message', '<div class="alert media fade in alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Data berhasil ditambahkan.<br></div>');
                redirect(site_url('books'));
            }else{
                $error = array('error' => $this->upload->display_errors());
                $this->create($error);
            }
        }
    }
    
    public function update($id, $error=null) 
    {
        $row = $this->Books_model->get_by_id($id);
        $row2 = $this->Booklist_model->get_by_books_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('books/update_action'),
		'books_id' => set_value('books_id', $row->books_id),
		'title' => set_value('title', $row->title),
		'Release_date' => set_value('Release_date', $row->Release_date),
		'authors' => set_value('authors', $row->authors),
        'cover' => set_value('cover', $row->cover),
        'categories' => $this->Books_model->get_categories(),
		'publishers' => set_value('publishers', $row->publishers),
        'ISBN' => set_value('ISBN', $row->ISBN),
        'price' => set_value('price', $row2->price),
        'book_stock' => set_value('book_stock', $row2->book_stock),
        'error' => $error['error'],
	    );
            $this->load->view('books/books_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert media fade in alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Data tidak ditemukan.<br></div>');
            redirect(site_url('books'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('books_id', TRUE));
        } else {
            
            $config['upload_path']          = './upload/cover/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $this->input->post('cover1',TRUE);
            $config['overwrite']            = true;
            $config['max_size']             = 1024; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->do_upload('cover');
            
            $post = $this->input->post();

            $data = array(
        		'title' => $this->input->post('title',TRUE),
        		'Release_date' => $this->input->post('Release_date',TRUE),
        		'authors' => $this->input->post('authors',TRUE),
        		'publishers' => $this->input->post('publishers',TRUE),
            );

            
            $categories_ubah = array();
            foreach($post['categories_name1'] AS $key => $val){
                $categories_ubah[] = array(
                    "categories_id" => $post['categories_id1'][$key],
                    "categories_name" => $post['categories_name1'][$key],
                );
            }
            $this->Categories_model->update($categories_ubah, 'categories_id');

            $categories_tambah = array();
            foreach($post['categories_name'] AS $key => $val){
                if ($post['categories_name'][$key] !== '') {
                    $categories_tambah[] = array(
                        "categories_name" => $post['categories_name'][$key],
                        "books_id" => $post['books_id'],
                    );
                }
            }
            if (count($categories_tambah)>0) {
                $this->Categories_model->insert($categories_tambah);
            }
            
            $this->Books_model->update($this->input->post('books_id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert media fade in alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Data berhasil diubah.<br></div>');
            redirect(site_url('books'));
            
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Books_model->get_by_id($id);

        if ($row) {
            $this->Books_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert media fade in alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Data berhasil dihapus.<br></div>');
            redirect(site_url('books'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert media fade in alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Data tidak ditemukan.<br></div>');
            redirect(site_url('books'));
        }
    }

    public function form(){
        $date = date('Ymd');
        $thename = $this->session->userdata('username') .$date .'1'. '.xlsx';
        $j=1;
        while (file_exists('./upload/excel/'.$thename)) {
            $k = $j++;
            $thename = $this->session->userdata('username') .$date .$k. '.xlsx';
        }
        $config['upload_path'] = './upload/excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size']  = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $thename;
        $this->load->library('upload', $config);
        
        $this->upload->do_upload('filename');
              
        if($this->upload->do_upload('filename')){
            $objReader  = new PHPExcel_Reader_Excel2007();
            $objPHPExcel = $objReader->load('upload/excel/' .$thename);
            $drawings = $objPHPExcel->getActiveSheet()->getDrawingCollection(); 
            $sheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true ,true, true);

            $numrow = 1;
            $numrow2 = 1;
            $numrow3 = 1;
            $data = array();
            $datacateg=array();
            $databooklist=array();
            $post = $this->Books_model->get_kode();
            $post2 = $this->Categories_model->get_kode();
            $post3 = $this->Booklist_model->get_kode();
            $i=1;
            $ow=0;
            $h=0;
            foreach($sheet AS $row){
                if($numrow > 1){
                     array_push($data, array(
                        "books_id" => $x4=$post++,
                        'title'=>$row['A'],
                        'Release_date'=>$row['B'],
                        'authors'=>$row['C'],
                        'ISBN'=>$row['D'],
                        'publishers'=>$row['E'],
                    ));
                }
                $numrow++;
            }

            foreach($sheet AS $row2){
                if($numrow3 > 1){
                     array_push($databooklist, array(
                        'stores_id'=>$this->session->userdata('stores_id'),
                        "books_id" => $post3++,
                        'price'=>$row2['H'],
                        'book_stock'=>$row2['I'],
                    ));
                }
                $numrow3++;
            }


            foreach ($drawings as $drawing) {
                
                if ($drawing instanceof PHPExcel_Worksheet_MemoryDrawing) {
                    ob_start();
                    call_user_func($drawing->getRenderingFunction(), $drawing->getImageResource());
                    $imageContents = ob_get_contents();
                    ob_end_clean();
                    
                    switch ($drawing->getMimeType()) {
                        case PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_PNG:
                        $extension = 'png';
                        break;
                    }

                }else{
                    $zipReader = fopen($drawing->getPath(),'r');
                    $imageContents = '';

                    while (!feof($zipReader)) {
                        $imageContents .= fread($zipReader,1024);
                    }

                    fclose($zipReader);
                        $extension = $drawing->getExtension();
                    }
                    $image_name = $this->session->userdata('username').'-'.$data[$ow++]['books_id'].'jpg';
                    file_put_contents('./upload/cover/'.$image_name,$imageContents);
                    array_push($data[$h++], $image_name);
                }
                
                foreach($data as &$val){
                    $val['cover'] = $val['0'];
                    unset($val['0']);
                }

                foreach($sheet AS $row){
                    if($numrow2 > 1){
                         array_push($datacateg, array(
                            'categories_name'=>$row['F'],
                        ));
                    }
                    $numrow2++;
                }
                $dir=0;
                $row=0;
                $le = 0;
                $opop=0;
                foreach ($datacateg as $key) {
                    $pecah1 = explode(",", $datacateg[$opop++]['categories_name']);                  

                    $llll = array_chunk($pecah1, 1);
                    
                    foreach ($llll as &$key12) {
                        $key12['categories_name'] = $key12['0'];
                        unset($key12['0']);
                    }
                    
                    array_unshift($llll[0] , $x4=$post2--);
                    array_unshift($llll[1], $post2++);

                    foreach ($llll as &$key12) {
                        $key12['books_id'] = $key12['0'];
                        unset($key12['0']);
                    }
                    $this->Categories_model->insert($llll);

                }
                
                $this->Books_model->insert_b($data);
                $this->Booklist_model->insert_b($databooklist);
                $this->session->set_flashdata('message', '<div class="alert media fade in alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>Data berhasil ditambahkan.<br></div>');
                redirect(site_url('books'));
        }
        
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('Release_date', 'release date', 'trim|required');
	$this->form_validation->set_rules('authors', 'authors', 'trim|required');
	$this->form_validation->set_rules('publishers', 'publishers', 'trim|required');

	$this->form_validation->set_rules('books_id', 'books_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Books.php */
/* Location: ./application/controllers/Books.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-08 14:36:45 */
/* http://harviacode.com */