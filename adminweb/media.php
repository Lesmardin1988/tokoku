<?php
session_start();

if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
  <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript" src="../nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
</script>
<meta name="keywords" content="" />
<meta name="description"">
<meta name="author" content=" ">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">

<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">
<link href="style1.css" rel="stylesheet" type="text/css" media="screen" />
<style type="text/css">
<!--
.style1 {
	color: #FFFFCC;
	font-weight: bold;
	font-size: x-large;
	font-style: italic;
}
.style4 {color: #000000; font-weight: bold; }
.style5 {color: #000000}
-->
</style>
</head>
<body>
<div id="wrapper">

	<div id="header"></div>
	<!-- end #header -->
<hr />
<div id="logo">
	  <h1 class="style1"></h1>
  </div>
	<hr />
	<!-- end #logo -->
	
<!-- end #header-wrapper -->

<div id="page"><!-- end #content -->
	<div id="menu">
      <ul>
        <li><strong><a href=?module=home class="style5">&#187; Home</a></strong></li>
        <?php include "menu.php"; ?>
        <li><a href=logout.php><span class="style4">&#187; Logout</span></a></li>
      </ul>
	    <p>&nbsp;</p>
 	</div>

  <div id="content">
		<?php include "content.php"; ?>
  </div><!-- end #sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page -->
</div>
<div id="footer">
	<p>Copyright &copy; <? print(date("Y")) ?> by <strong>Berdikariolshop@gmail.com </strong></p>
</div>
<!-- end #footer -->
</body>
</html>

<?php
}
?>
