<?
require("fungsi_kalender.php");
echo "<h3>KALENDER</h3><p align=center>";

$tgl_skrg=date("d");
$bln_skrg=date("n");
$thn_skrg=date("Y");

echo buatkalender($tgl_skrg,$bln_skrg,$thn_skrg);
echo "<hr color='#FFFFFF'>"; ?>