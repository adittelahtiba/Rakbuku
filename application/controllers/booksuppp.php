<?php 

$excelreader = new PHPExcel_Reader_Excel2007();
$loadexcel = $excelreader->load('upload/xxxxxxxxxx22.xlsx');
$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true, true);





$numrow = 1;
$data = array();
$post = $this->Books_model->get_kode();
foreach($sheet AS $row){
    if($numrow > 1){
         array_push($data, array(
            "books_id" => $x4=$post++,
            'title'=>$row['A'],
            'Release_date'=>$row['B'],
            'authors'=>$row['C'],
            'publishers'=>$row['D'],
            'cover'=>$x4,
        ));
    }
    $numrow++;
}
$this->Books_model->insert_b($data);


?>