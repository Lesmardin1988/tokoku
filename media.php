<?php 
  session_start();	
  include "config/koneksi.php";
	include "config/fungsi_indotgl.php";
	include "config/class_paging.php";
	include "config/fungsi_combobox.php";
	include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_rupiah.php";
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php include "dina_titel.php"; ?></title>
<meta name="keywords" content="<?php include "dina_meta.php"; ?>" />
<meta name="description"<?php include "dinameta.php"; ?>">
<meta name="author" content=" ">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">

<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">

<script language='javascript' type='text/javascript'></script>
<script type="text/javascript" src="basiccalendar.js"></script>
<link href="css/styleku.css" rel="stylesheet" type="text/css">

<style>
/*Sticky*/
.my-sticky.active{
     position:fixed;
     top: 0;
     left: 0;
     width: 100%;
     z-index:999 
}

</style>
</head>
<body>
<div class="topnav">
  <a href="index.php"class="current_page_item">Home</a>
  <a href="profil-kami.html">Profil</a>
  <a href="semua-produk.html">Produk</a>
  <a href="cara-pembelian.html">Cara Membeli</a>
  <a href="hubungi-kami.html">Hubungi Kami</a>
   <a href="keranjang-belanja.html">Keranjang Belanja</a>
  <a href="adminweb/index.php" style="float:right">Login</a>
</div>
<div class="card">
<div class="header">
  <h1>&nbsp;</h1>
  <img src="images/logo.png">
  <p>Distribusi Outlet Terpercaya dan Nyaman.</p>
</div>
</div>
<div><span class="style2">
  <marquee direction="left" scrollamount="5" onMouseOver="stop()" onMouseOut="start()">
  <strong>Selamat Datang di Website Kami </strong>
          </marquee>
</span></div>
<div class="row">
  <div class="leftcolumn">
  
  <div class="card">
      <div class="fakeimgkiri" style="height:450px;">
	  	<?php include "profile.php"; ?>
		
	  </div>
    </div>
  
    <div class="card">
      <div class="fakeimgkiri">
     
		<?php
			$hal=$_GET['hal'];
				if(!isset($hal)){
					include "home.php";
				} else if ($hal=='home.html'){
					include "home.php";
				
				} else if($hal=='hasil_polling.html'){
					include "hasil_polling.php";
				
				} else {
				include "file_tidak_ada.php";
				}
			?>
			<?php include "kanan.php"; ?>
	  </div>
	   
    </div>
    <div class="card">
      <h2>Best Seller</h2>
      <div class="fakeimgkiri">
	  	 
			<?php include "bestseller.php"; ?>
	  </div>
      
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
	<p><strong>Hari : <? print(date("D,d F Y")) ?></strong></p>
        <div class="fakeimgkanan" align="center">
        <h2>KALENDER</h2>
        <?php include"calender.php"; ?>
      </div>
    </div>
	
	<div class="card">
      <div class="fakeimgkanan" align="left">
		<h2>KATEGORI</h2>
        <?php include "kiri.php"; ?>
      </div>
    </div>
    <div class="card">
      <h3>Statistik Pengunjung</h3>
     <?php include "hitspengunjung.php"; ?>
	  
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <table width="373" border="0">
	    <tr>
			<td><div><a href="http://lesmardin1988.wordpress.com/" target="_blank"><img src="Image/logo-wordpress.png" alt="" width="160" title="klik untuk melihat " /></a></div>
		    <center><a href="http://lesmardin1988.wordpress.com/" target="_blank"></a></center></td>
			<td><div><a href="https://www.instagram.com/lesmardin1988/" target="_blank"><img src="Image/instagram.png" alt="" width="160" title="klik untuk melihat " /></a></div>
		      <center><a href="https://www.instagram.com/lesmardin1988/" target="_blank"></a></center></td>
        </tr>
		<tr>
			<td><div><a href="https://www.facebook.com/Lesmardin/" target="_blank"><img src="Image/facebook.png" alt="" width="160" title="klik untuk melihat " /></a></div>
		    <center><a href="https://www.facebook.com/Lesmardin/" target="_blank"></a></center></td>
			<td><div><a href="https://twitter.com/Lesmardin" target="_blank"><img src="Image/twiter.png" alt="" width="160" title="klik untuk melihat " /></a></div>
		    <center><a href="https://twitter.com/Lesmardin" target="_blank"></a></center></td>
        </tr>
      </table>
    </div>
  </div>
</div>

<div class="footer">
  <div align="center">
      Copyright &copy; <? print(date("Y")) ?><span class="style4"><em> </em>By Lesmardin Hasugian</span><br>
      Blog : <a href="http://lesmardin1988.wordpress.com/" target="_blank">Lesmardin1988.wordpress.com<a/>
  </div></p>
</div>

</body>
</html>


