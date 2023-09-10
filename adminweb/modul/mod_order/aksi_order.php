<?php
session_start();
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Update status order
if ($module=='order' AND $act=='update'){
  mysql_query("UPDATE orders SET status_order='$_POST[status_order]' where id_orders='$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
