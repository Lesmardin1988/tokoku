<?php
	$sid = session_id();
	$query = mysql_fetch_array(mysql_query("SELECT SUM(jumlah) as totaljumlah FROM orders_temp WHERE id_session='$sid'"));
  if ($query[totaljumlah] != ""){
    echo "<p align=right><img src='images/keranjang.png'><b><i><a href='keranjang-belanja.html'><br>
	Keranjang Belanja ($query[totaljumlah])</a></i></b></p>";
  }
  else{
    echo "<p align=right><img src='images/keranjang.png'><b><i>
	<br>Keranjang Belanja (0)</i></b></p>";
  }
?>
