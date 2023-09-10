<script language="javascript">
function validasi(form){
  if (form.nama.value == ""){
    alert("Anda belum mengisikan Nama.");
    form.nama.focus();
    return (false);
  }    
  if (form.alamat.value == ""){
    alert("Anda belum mengisikan Alamat.");
    form.alamat.focus();
    return (false);
  }
  if (form.telpon.value == ""){
    alert("Anda belum mengisikan Telpon.");
    form.telpon.focus();
    return (false);
  }
  if (form.email.value == ""){
    alert("Anda belum mengisikan Email.");
    form.email.focus();
    return (false);
  }
  if (form.kota.value == 0){
    alert("Anda belum mengisikan Kota.");
    form.kota.focus();
    return (false);
  }
  return (true);
}


function harusangka(jumlah){
  var karakter = (jumlah.which) ? jumlah.which : event.keyCode
  if (karakter > 31 && (karakter < 48 || karakter > 57))
    return false;

  return true;
}
</script>

<?php

// Halaman utama (Home)
if ($_GET[module]=='home'){

  // Tampilkan berapa item yang sudah dimasukkan ke Keranjang Belanja 
  require_once "item.php";

  echo "<br /><span class=judul>&#187; <b>Produk Terbaru</b></span><br /><br />";

  // Tampilkan 6 produk terbaru
  $sql=mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 6");
  
  $kolom = 3;
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
    echo "<td align=center><br><img src='foto_produk/small_$r[gambar]' hspace=20 border=0><br /><br />Rp. <b>$harga</b><br /><br /></td>
          <td><br /><span class=judul><a href=produk-$r[id_produk]-$r[produk_seo].html>$r[nama_produk]</a></span><br /><br />
          $isi ... <a href=produk-$r[id_produk]-$r[produk_seo].html>Selengkapnya</a><br /><br />
          <a href=aksi.php?module=keranjang&act=tambah&id=$r[id_produk]><img src='images/belii.jpg' border=0></a><br /><br /></td>";
  }
echo "</tr></table><br />";
}


// Modul detail produk
elseif ($_GET[module]=='detailproduk'){
  // Tampilkan berapa item yang sudah dimasukkan ke Keranjang Belanja 
  require_once "item.php";
  
  // Tampilkan detail produk berdasarkan produk yang dipilih
	$detail=mysql_query("SELECT * FROM produk,kategori    
                      WHERE kategori.id_kategori=produk.id_kategori 
                      AND id_produk='$_GET[id]'");
	$d   = mysql_fetch_array($detail);
	$tgl = tgl_indo($d[tanggal]);
  $deskripsi = nl2br($d[deskripsi]); // membuat paragraf pada isi berita
  $harga     = number_format($d[harga],0,",",".");
 // $berat = number_format($d[berat],","kg");

	echo "<span class=date>$tgl</span><br />";
	echo "<span class=judul>$d[nama_produk]</span><br />";
	echo "Kategori: <a href=kategori-$d[id_kategori]-$d[kategori_seo].html><b>$d[nama_kategori]</b></a></span><br /><br />";
  // Apabila ada gambar dalam berita, tampilkan   
 	if ($d[gambar]!=''){
		echo "<span class=image><img src='foto_produk/$d[gambar]' border=0></span>";
	}
	echo "$deskripsi <br />Rp. <b>$harga</b> (stok: $d[stok])<br /><br />
        <a href=aksi.php?module=keranjang&act=tambah&id=$d[id_produk]><img src='images/belii.jpg' border=0></a><br />";	 		   
}


// Modul produk per kategori
elseif ($_GET[module]=='detailkategori'){
  // Tampilkan berapa item yang sudah dimasukkan ke Keranjang Belanja 
  require_once "item.php";

  // Tampilkan nama kategori
  $sq = mysql_query("SELECT nama_kategori from kategori where id_kategori='$_GET[id]'");
  $n = mysql_fetch_array($sq);
  echo "<span class=judul_head>&#187; Kategori : <b>$n[nama_kategori]</b></span><br />";
  
  $p      = new Paging3;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas);
  
  // Tampilkan daftar produk yang sesuai dengan kategori yang dipilih
 	$sql   = "SELECT * FROM produk WHERE id_kategori='$_GET[id]' 
            ORDER BY id_produk DESC LIMIT $posisi,$batas";		 
	$hasil = mysql_query($sql);
	$jumlah = mysql_num_rows($hasil);

	// Apabila ditemukan produk dalam kategori
	if ($jumlah > 0){
    $kolom = 3;
    echo "<table><tr>";

    $i=0;
   while($r=mysql_fetch_array($hasil)){
    $harga = number_format($r[harga],0,",",".");
    // Tampilkan hanya sebagian isi berita
    $isi_produk = nl2br($r[deskripsi]); // membuat paragraf pada isi berita
    $isi = substr($isi_produk,0,120); // ambil sebanyak 120 karakter
    $isi = substr($isi_produk,0,strrpos($isi," ")); // potong per spasi kalimat

    if ($i >= $kolom){
      echo "</tr><tr>";
      $i=0;
    }
    $i++;
    echo "<td align=center><br><img src='foto_produk/small_$r[gambar]' hspace=20 border=0><br /><br />Rp. <b>$harga</b> <br />(stok: $r[stok])<br /><br /></td>
          <td><br /><span class=judul><a href=produk-$r[id_produk]-$r[produk_seo].html>$r[nama_produk]</a></span><br /><br />
          $isi ... <a href=produk-$r[id_produk]-$r[produk_seo].html>Selengkapnya</a><br /><br />
          <a href=aksi.php?module=keranjang&act=tambah&id=$r[id_produk]><img src='images/belii.jpg' border=0></a><br /><br /></td>";
  }
  echo "</tr></table><br />";

  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk WHERE id_kategori='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halkategori], $jmlhalaman);

  echo "Hal: $linkHalaman<br /><br />";
  }
  else{
    echo "<p align=center>Produk Yang ada inginkan belum tersedia</p>";
  }
}

// Menu utama di header

// Modul profil
elseif ($_GET[module]=='profilkami'){
  // Tampilkan berapa item yang sudah dimasukkan ke Keranjang Belanja 
  require_once "item.php";

  echo "<span class=judul>&#187; <b>Profil</b></span><br /><br />"; 

  // Data profil mengacu pada id_modul=43
	$profil = mysql_query("SELECT * FROM modul WHERE id_modul='43'");
	$r      = mysql_fetch_array($profil);

  if ($r[gambar]!=''){
		echo "<span class=image><img src='images/$r[gambar]'></span>";
	}
	$isi_profil=nl2br($r[static_content]);
  echo "$isi_profil";  
}


// Modul cara pembelian
elseif ($_GET[module]=='carabeli'){
  // Tampilkan berapa item yang sudah dimasukkan ke Keranjang Belanja 
  require_once "item.php";

  echo "<span class=judul>&#187; <b>Cara Pembelian</b></span><br /><br />"; 

  // Data cara pembelian mengacu pada id_modul=53
	$crbeli = mysql_query("SELECT * FROM modul WHERE id_modul='53'");
	$r      = mysql_fetch_array($crbeli);

	$isi_carabeli=nl2br($r[static_content]);
  echo "$isi_carabeli";  
}


// Modul semua produk
elseif ($_GET[module]=='semuaproduk'){
  // Tampilkan berapa item yang sudah dimasukkan ke Keranjang Belanja 
  require_once "item.php";

  // Tampilkan semua produk
  echo "<span class=judul>&#187; <b>Produk</b></span><br /><br />"; 
  $p      = new Paging2;
  $batas  = 5;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua produk
  $sql=mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT $posisi,$batas");
  while($r=mysql_fetch_array($sql)){
    $harga = number_format($r[harga],0,",",".");
		echo "<table><tr><td><span class=judul><a href=produk-$r[id_produk]-$r[produk_seo].html>$r[nama_produk]</a></span><br />";
 		// Apabila ada gambar dalam produk, tampilkan
    if ($r[gambar]!=''){
			echo "<span class=image><img src='foto_produk/small_$r[gambar]' border=0></span>";
		}
    // Tampilkan hanya sebagian isi berita
    $isi_produk = nl2br($r[deskripsi]); // membuat paragraf pada isi berita
    $isi = substr($isi_produk,0,300); // ambil sebanyak 300 karakter
    $isi = substr($isi_produk,0,strrpos($isi," ")); // potong per spasi kalimat
    echo "$isi ... <a href=produk-$r[id_produk]-$r[produk_seo].html>Selengkapnya</a><br /><br />
          Rp. <b>$harga</b> (stok: $r[stok])<br /><a href=aksi.php?module=keranjang&act=tambah&id=$r[id_produk]><img src='images/belii.jpg' border=0></a><br />
          </td></tr></table><br />";
	 }
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halproduk], $jmlhalaman);

  echo "Hal: $linkHalaman<br /><br />";
}


// Modul keranjang belanja
elseif ($_GET[module]=='keranjangbelanja'){
  // Tampilkan berapa item yang sudah dimasukkan ke Keranjang Belanja 
  require_once "item.php";

  // Tampilkan produk-produk yang telah dimasukkan ke keranjang belanja
  echo "<span class=judul>&#187; <b>Keranjang Belanja</b></span><br /><br />"; 
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM orders_temp, produk 
			                WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
  $ketemu=mysql_num_rows($sql);
  if($ketemu < 1){
    echo "<script>window.alert('Keranjang Belanjanya Masih Kosong');
        window.location=('index.php')</script>";
    }
  else{
    echo "<form method=post action=aksi.php?module=keranjang&act=update>
          <table border=0 cellpadding=3 align=center>
          <tr bgcolor=#D3DCE3><th>No</th><th>Produk</th><th>Nama Produk</th><th>Jumlah</th>
          <th>Harga</th><th>Sub Total</th><th>Hapus</th></tr>";  
  
  $no=1;
  while($r=mysql_fetch_array($sql)){
    $subtotal    = $r[harga] * $r[jumlah];
    $total       = $total + $subtotal;  
    $subtotal_rp = format_rupiah($subtotal);
    $total_rp    = format_rupiah($total);
    $harga       = format_rupiah($r[harga]);
    
    echo "<tr bgcolor=#cccccc><td>$no</td><input type=hidden name=id[$no] value=$r[id_orders_temp]>
              <td align=center><br><img src=foto_produk/small_$r[gambar]></td>
              <td>$r[nama_produk]</td>
              <td><input type=text name='jml[$no]' value=$r[jumlah] size=1 onkeypress=\"return harusangka(event)\"></td>
              <td>$harga</td>
              <td>$subtotal_rp</td>
              <td align=center><a href='aksi.php?module=keranjang&act=hapus&id=$r[id_orders_temp]'>
              <img src=images/Delete.png border=0 title=Hapus></a></td>
          </tr>";
    $no++; 
  } 
  echo "<tr><td colspan=5 align=right><br><b>Total</b>:</td><td colspan=2><br>Rp. <b>$total_rp</b></td></tr>
        <tr><td colspan=2><br /><a href=javascript:history.go(-1)><img src=images/lanjutkan.jpg border=0></a><br /></td>
        <td colspan=2><br /><input type=image src='images/update.jpg' border=0><br /></td>
        <td colspan=3 align=right><br /><a href=selesai-belanja.html><img src=images/selesai.jpg  border=0></a><br /></td></tr>
        </table></form><br />";
  echo "*) Apabila anda mengubah jumlah, setelah input data pada jumlah, tekan tombol <b>Update Keranjang</b>.  
        **) Total harga diatas belum termasuk ongkos kirim yang akan dihitung saat <b>Selesai Belanja</b>.<br /><br />";
  }
}

// Modul hubungi kami
elseif ($_GET[module]=='hubungikami'){
  // Tampilkan berapa item yang sudah dimasukkan ke Keranjang Belanja 
  require_once "item.php";

  echo "<span class=judul>&#187; <b>Hubungi Kami</b></span><br /><br />"; 
  echo "<b>Hubungi kami secara online dengan mengisi form dibawah ini:</b>
        <table width=100% style='border: 1pt dashed #0000CC;padding: 10px;'>
        <form action=hubungi-aksi.html method=POST>
        <tr><td>Nama</td><td> : <input type=text name=nama size=40></td></tr>
        <tr><td>Email</td><td> : <input type=text name=email size=40></td></tr>
        <tr><td>Subjek</td><td> : <input type=text name=subjek size=55></td></tr>
        <tr><td valign=top>Pesan</td><td><textarea name=pesan  style='width: 315px; height: 100px;'></textarea></td></tr>
        </td><td colspan=2><input type=submit name=submit value=Kirim></td></tr>
        </form></table><br />";
}


// Modul hubungi aksi
elseif ($_GET[module]=='hubungiaksi'){
  mysql_query("INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
  echo "<span class=posting>&#187; <b>Hubungi Kami</b></span><br /><br />"; 
  echo "<p align=center><b>Terimakasih telah menghubungi kami. <br /> Kami akan segera meresponnya.</b></p>";
}


// Modul selesai belanja
elseif ($_GET[module]=='selesaibelanja'){
  // Tampilkan berapa item yang sudah dimasukkan ke Keranjang Belanja 
  require_once "item.php";

  // Form untuk input data pembeli
  echo "<span class=judul_head>&#187; <b>Data Pembeli</b></span><br /><br /> 
      <form name='form' action=simpan-transaksi.html method=POST onSubmit=\"return validasi(this)\">
      <table>
      <tr><td>Nama</td><td> : <input type=text name=nama size=30></td></tr>
      <tr><td>Alamat Lengkap</td><td> : <input type=text name=alamat size=70></td></tr>
      <tr><td>Telpon/HP</td><td> : <input type=number name=telpon></td></tr>
      <tr><td>Email</td><td> : <input type=text name=email></td></tr>
      <tr><td valign=top>Kota Tujuan</td><td> :  
      <select name='kota'>
      <option value=0 selected>- Pilih Kota -</option>";
      $tampil=mysql_query("SELECT * FROM kota ORDER BY nama_kota");
      while($r=mysql_fetch_array($tampil)){
         echo "<option value=$r[id_kota]>$r[nama_kota]</option>";
      }
  echo "</select> <br /><br />*)  Apabila tidak terdapat nama kota tujuan Anda, pilih <b>Lainnya</b>
                  <br />**) Ongkos kirim dihitung berdasarkan kota tujuan</td></tr>
      <tr><td colspan=2><input type=submit value=Proses></td></tr>
      </table>";
}


// Modul simpan transaksi
elseif ($_GET[module]=='simpantransaksi'){
$kar1=strstr($_POST[email], "@");
$kar2=strstr($_POST[email], ".com");

if (empty($_POST[nama]) || empty($_POST[alamat]) || empty($_POST[telpon]) || empty($_POST[email]) || empty($_POST[kota])){
  echo "Data yang Anda isikan belum lengkap<br />
  	    <a href='selesai-belanja.html'><b>Ulangi Lagi</b>";
}
elseif (!ereg("[a-z|A-Z]","$_POST[nama]")){
  echo "Nama tidak boleh diisi dengan angka atau simbol.<br />
 	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
elseif (!ereg("[0-9]","$_POST[telpon]")){
  echo "Nomor Telpon tidak boleh diisi dengan Huruf atau simbol!<br />
 	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
elseif (strlen($kar1)==0 OR strlen($kar2)==0){
  echo "Alamat email Anda tidak valid, 
sebaiknya gunakan alamat dari Yahoo atau Gmail.<br />
 	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
else{
// fungsi untuk mendapatkan isi keranjang belanja
function isi_keranjang(){
	$isikeranjang = array();
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM orders_temp WHERE id_session='$sid'");
	
	while ($r=mysql_fetch_array($sql)) {
		$isikeranjang[] = $r;
	}
	return $isikeranjang;
}

$tgl_skrg = date("Ymd");
$jam_skrg = date("H:i:s");

// simpan data pemesanan 
mysql_query("INSERT INTO orders(nama_kustomer, alamat, telpon, email, tgl_order, jam_order, id_kota) 
             VALUES('$_POST[nama]','$_POST[alamat]','$_POST[telpon]','$_POST[email]','$tgl_skrg','$jam_skrg','$_POST[kota]')");
  
// mendapatkan nomor orders
$id_orders=mysql_insert_id();

// panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
$isikeranjang = isi_keranjang();
$jml          = count($isikeranjang);

// simpan data detail pemesanan  
for ($i = 0; $i < $jml; $i++){
  mysql_query("INSERT INTO orders_detail(id_orders, id_produk, jumlah) 
               VALUES('$id_orders',{$isikeranjang[$i]['id_produk']}, {$isikeranjang[$i]['jumlah']})");
}

// proses penghapusan data
$lama = 2; // lama data adalah 2 hari
mysql_query("DELETE * FROM orders
          WHERE DATEDIFF(CURDATE(), tgl_order) > $lama");  

// update/kurangi stok produk
for ($i = 0; $i < $jml; $i++) {
	mysql_query("UPDATE produk SET stok = stok - {$isikeranjang[$i]['jumlah']}
						    WHERE id_produk = {$isikeranjang[$i]['id_produk']}");
}

// update/tambahkan produk yang dibeli (best seller)
for ($i = 0; $i < $jml; $i++) {
	mysql_query("UPDATE produk SET dibeli = dibeli + {$isikeranjang[$i]['jumlah']}
						    WHERE id_produk = {$isikeranjang[$i]['id_produk']}");
}

// setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara (orders_temp)
for ($i = 0; $i < $jml; $i++) {
  mysql_query("DELETE FROM orders_temp
	  	         WHERE id_orders_temp = {$isikeranjang[$i]['id_orders_temp']}");
}

echo "<span class=judul_head>&#187; <b>Proses Transaksi Selesai</b></span><br /><br /> 
      Data pemesan beserta ordernya adalah sebagai berikut: <br />
      <table>
      <tr><td>Nama           </td><td> : <b>$_POST[nama]</b> </td></tr>
      <tr><td>Alamat Lengkap </td><td> : $_POST[alamat] </td></tr>
      <tr><td>Telpon         </td><td> : $_POST[telpon] </td></tr>
      <tr><td>E-mail         </td><td> : $_POST[email] </td></tr></table><hr /><br />
      
      Nomor Order: <b>$id_orders</b><br /><br />";

      $daftarproduk=mysql_query("SELECT * FROM orders_detail,produk 
                                 WHERE orders_detail.id_produk=produk.id_produk 
                                 AND id_orders='$id_orders'");

echo "<table cellpadding=5>
      <tr bgcolor=#D3DCE3><th>No</th><th>Nama Produk</th><th>Jumlah</th><th>Harga</th><th>Sub Total</th></tr>";
      
$pesan="Terimakasih telah melakukan pemesanan online di berdikariolshop.com <br /><br />  
        Nama: $_POST[nama] <br />
        Alamat: $_POST[alamat] <br/>
        Telpon: $_POST[telpon] <br /><hr />
        
        Nomor Order: $id_orders <br />
        Data order Anda adalah sebagai berikut: <br /><br />";
        
$no=1;
while ($d=mysql_fetch_array($daftarproduk)){
   $subtotal    = $d[harga] * $d[jumlah];
   $total       = $total + $subtotal;
   $subtotal_rp = format_rupiah($subtotal);    
   $total_rp    = format_rupiah($total);    
   $harga       = format_rupiah($d[harga]);

   echo "<tr bgcolor=#cccccc><td>$no</td><td>$d[nama_produk]</td><td align=center>$d[jumlah]</td><td>Rp. $harga</td><td>Rp. $subtotal_rp</td></tr>";

   $pesan.="$d[jumlah] $d[nama_produk] -> Rp. $harga -> Subtotal: Rp. $subtotal_rp <br />";
   $no++;
}

$ongkos=mysql_fetch_array(mysql_query("SELECT ongkos_kirim FROM kota WHERE id_kota='$_POST[kota]'"));
$berat=mysql_fetch_array(mysql_query("SELECT berat FROM produk WHERE id_produk=orders_detail.id_produk"));
$berat2=2;
	if ($berat <= 1){
		$ongkoskirim = $ongkos[ongkos_kirim];
	}
	else{
		$ongkoskirim = (($ongkos[ongkos_kirim]) * $berat2);
	}

$grandtotal    = $total + $ongkoskirim; 

$ongkoskirim_rp = format_rupiah($ongkoskirim);
$grandtotal_rp  = format_rupiah($grandtotal);    


$pesan.="<br /><br />Total : Rp. $total_rp 
         <br />Ongkos kirim: Rp. $ongkoskirim_rp
         <br />Grand Total : Rp. $grandtotal_rp 
         <br /><br />Silahkan lakukan pembayaran ke ....... <b></b> ";

$subjek="Pemesanan Online dari Distro Kita";

// Kirim email ke kustomer
mail($_POST[email],$subjek,$pesan,"From: admin@distrokita.com");

// Kirim email ke pengelola toko online
mail("Distrokita.com",$subjek,$pesan,"From: admin@Distrokita.com");

echo "<tr><td colspan=4 align=right>Total : Rp. </td><td align=right><b>$total_rp</b></td></tr>
      <tr><td colspan=4 align=right>Ongkos Kirim : Rp. </td><td align=right><b>$ongkoskirim_rp</b></td></tr>      
      <tr><td colspan=4 align=right>Grand Total : Rp. </td><td align=right><b>$grandtotal_rp</b></td></tr>
      </table>";
echo "<hr /><p>Data order dan nomor rekening transfer sudah terkirim ke email Anda. <br />
               Apabila Anda tidak melakukan pembayaran dalam 2 hari, maka data order Anda akan terhapus (transaksi batal)</p><br />";      
}
}
?>
