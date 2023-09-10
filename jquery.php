<html>
<head>
	  <script language="javascript" src="jquery/jquery-1.4.js"></script>
	  <script language="javascript" src="jquery/headline.js"></script>
    <script type="text/javascript"> 
      $(document).ready(function(){
	  		// untuk permulaan, tampilkan content nomor 1 '#slideAwal'
	  		bukaContent($('#slideAwal'),'div1');			
	    });
	  </script>	
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-size: 12px;
	font-weight: bold;
	color:#000000;
}
-->
</style>
</head>

<body>
<div id="divTrigger">
      <a href="javascript:;" onClick="bukaContent(this,'div1')" id="slideAwal">1</a>
      <a href="javascript:;" onClick="bukaContent(this,'div2')">2</a>
	  <a href="javascript:;" onClick="bukaContent(this,'div3')">3</a>
	  <a href="javascript:;" onClick="bukaContent(this,'div4')">4</a>
	  <a href="javascript:;" onClick="bukaContent(this,'div5')">5</a>
</div>

    <div id="divContent">
      <div id="div1"><center><img src="photos/image1.jpg" width="550" height="350" border="0">
      </center></div>
	  <div id="div2"><center><img src="photos/image2.jpg" width="550" height="350" border="0" />
	  </center></div>
	  <div id="div3"><center><img src="photos/image3.jpg" width="550" height="350" border="0" />
	  </center></div>
	  <div id="div4"><center><img src="photos/image4.jpg" width="550" height="350" border="0" />
	  </center></div>
	  <div id="div5"><center><img src="photos/image5.jpg" width="550" height="350" border="0" />
	  </center></div>
    </div>
</body>
</html> 
