  <?php
              $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
              $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
              $waktu   = time(); // 

              // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
              $s = mysql_query("SELECT * FROM tb_statistik WHERE ip='$ip' AND tanggal='$tanggal'");
              // Kalau belum ada, simpan data user tersebut ke database
              if(mysql_num_rows($s) == 0){
                mysql_query("INSERT INTO tb_statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
              } 
              else{
                mysql_query("UPDATE tb_statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
              }

              $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM tb_statistik WHERE tanggal='$tanggal' GROUP BY ip"));
              $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM tb_statistik"), 0); 
              $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM tb_statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
              $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM tb_statistik"), 0); 
              $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM tb_statistik"), 0); 
              $bataswaktu       = time() - 300;
              $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM tb_statistik WHERE online > '$bataswaktu'"));

              $path = "counter/";
              $ext = ".png";

              $tothitsgbr = sprintf("%06d", $tothitsgbr);
              for ( $i = 0; $i <= 9; $i++ ){
	               $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
              }

              echo "<p align=center>$tothitsgbr </p>
                    <table>
                    <tr><td class='news-title'><img src=counter/hariini.png> Pengunjung Hari ini</td><td class='news-title'> : $pengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total pengunjung </td><td class='news-title'> : $totalpengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/hariini.png> Hits hari ini </td><td class='news-title'> : $hits[hitstoday] </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total Hits </td><td class='news-title'> : $totalhits </td></tr>
                    <tr><td class='news-title'><img src=counter/online.png> Pengunjung Online </td><td class='news-title'> : $pengunjungonline </td></tr>
                    </table>";
            ?>
