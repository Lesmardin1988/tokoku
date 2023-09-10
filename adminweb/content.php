<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";
include "../config/fungsi_rupiah.php";

// Bagian Home
if ($_GET[module]=='home'){
  echo "<h2>Selamat Datang</h2>
          <p>Anda Log In sebagai <b>$_SESSION[namalengkap]</b>, Silahkan melanjutkan.<br> Klik menu pilihan yang berada 
          di sebelah kiri untuk mengelola content website. </p>
          <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
          <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
}

// Bagian Modul
elseif ($_GET[module]=='modul'){
  include "modul/mod_modul/modul.php";
}

// Bagian Kategori
elseif ($_GET[module]=='kategori'){
  include "modul/mod_kategori/kategori.php";
}

// Bagian Produk
elseif ($_GET[module]=='produk'){
  include "modul/mod_produk/produk.php";
}


// Bagian Order
elseif ($_GET[module]=='order'){
  include "modul/mod_order/order.php";
}

// Bagian Profil
elseif ($_GET[module]=='profil'){
  include "modul/mod_profil/profil.php";
}

// Bagian Order
elseif ($_GET[module]=='hubungi'){
  include "modul/mod_hubungi/hubungi.php";
}

// Bagian Cara Pembelian
elseif ($_GET[module]=='carabeli'){
  include "modul/mod_carabeli/carabeli.php";
}

// Bagian Banner
elseif ($_GET[module]=='banner'){
  include "modul/mod_banner/banner.php";
}

// Bagian Kota/Ongkos Kirim
elseif ($_GET[module]=='ongkoskirim'){
  include "modul/mod_ongkoskirim/ongkoskirim.php";
}

// Bagian Password
elseif ($_GET[module]=='password'){
  include "modul/mod_password/password.php";
}

// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
