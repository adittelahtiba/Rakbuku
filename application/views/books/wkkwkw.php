
                                        <?php
                                         //string yang akan dipecah
                                         $teks = "Mangga,Apel,Durian";
                                         //pecah string berdasarkan string "," 
                                         $pecah = explode(",", $teks);
                                         //mencari element array 0
                                         for ($i=0; $i < count($pecah); $i++) { 
                                             echo $pecah[$i];
                                             echo "<br>";
                                         }
                                         
                                         
                                         //tampilkan hasil pemecahan
                                         
                                         ?>