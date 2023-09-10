<?php
// Menu Kategori
$kategori=mysql_query("select nama_kategori, kategori.id_kategori, kategori_seo,  
                       count(produk.id_produk) as jml 
                       from kategori left join produk 
                       on produk.id_kategori=kategori.id_kategori 
                       group by nama_kategori");
while($k=mysql_fetch_array($kategori)){
  echo "<span class=kategori>&nbsp; 
  <a href=kategori-$k[id_kategori].html>$k[nama_kategori] ($k[jml])</a></span><hr />";
}
echo "<br />";

?>
