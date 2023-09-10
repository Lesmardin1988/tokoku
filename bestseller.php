<?php

// Halaman utama (Home)
if ($_GET[module]=='home'){

  // Tampilkan 10 produk terbaru
  $sql=mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 10");
  
  $kolom = 10;
  echo "<table><tr>";

  $i=0;
  while ($r=mysql_fetch_array($sql)){
    $harga     = number_format($r[harga],0,",",".");
    $deskripsi = nl2br($r[deskripsi]); // membuat paragraf 
    $isi       = substr($deskripsi,0,120); // ambil sebanyak 120 karakter
    $isi       = substr($deskripsi,0,strrpos($isi," ")); // potong per spasi kalimat
    if ($i >= $kolom){
      echo "</tr><tr>";
      $i=0;
    }
    $i++;
    echo "<td align=center><br><img src='foto_produk/small_$r[gambar]' hspace=20 border=0><br /><span class=judul><a href=produk-$r[id_produk]-$r[produk_seo].html>$r[nama_produk]</a></span><br /><br /></td>";
  }
echo "</tr></table><br />";
}

?>
