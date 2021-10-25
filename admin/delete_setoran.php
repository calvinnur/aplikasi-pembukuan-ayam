<?php 
require_once("library.php");
$call = new admin;
$id = $_GET["id"];
$waktu = $_GET["waktu"];
$time = strtotime($waktu);
$hari = date("d",$time);
$bulan = date("M",$time);
$tahun = date("Y",$time);
echo $call->setoran_delete($id);
echo "<script>
    alert('data berhasil dihapus');
    window.location='../setoran.php?hari=$hari&bulan=$bulan&tahun=$tahun';
    </script>
    ";


?>