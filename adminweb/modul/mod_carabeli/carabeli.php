<?php
$aksi="modul/mod_carabeli/aksi_carabeli.php";
switch($_GET[act]){
  // Tampil Cara Pembelian
  default:
    $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='53'");
    $r    = mysql_fetch_array($sql);

    echo "<h2>Cara Pembelian</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=carabeli&act=update>
          <input type=hidden name=id value=$r[id_modul]>
          <table>
         <tr><td><textarea name='isi' style='width: 500px; height: 300px;'>$r[static_content]</textarea></td></tr>
         <tr><td><input type=submit value=Update></td></tr>
         </form></table>";
    break;  
}
?>
