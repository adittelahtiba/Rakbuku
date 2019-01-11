<html>
<head>
  <title>IMPORT EXCEL CI 3</title>
</head>
<body>
  <h1>Data Siswa</h1><hr>
  <a href="<?php echo base_url("books/form"); ?>">Import Data</a><br><br>
  <table border="1" cellpadding="8">
  <tr>
    <th>books_id</th>
    <th>title</th>
    <th>Release_date</th>
    <th>authors</th>
    <th>publishers</th>
    <th>cover</th>
  </tr>
  <?php
  if( ! empty($siswa)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa dari controller
      echo "<tr>";
      echo "<td>".$data->books_id."</td>";
      echo "<td>".$data->title."</td>";
      echo "<td>".$data->Release_date."</td>";
      echo "<td>".$data->authors."</td>";
      echo "<td>".$data->publishers."</td>";
      echo "<td>".$data->cover."</td>";
      echo "</tr>";
    }
  }else{ // Jika data tidak ada
    echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
  }
  ?>
  </table>
</body>
</html>