<?php 
require_once("library.php");
$call = new admin;
$waktu = $_POST["waktu"];
$time = strtotime($waktu);
$hari = date("d",$time);
$bulan = date("M",$time);
$tahun = date("Y",$time);
if($call->require_check()["status"] == false){
    echo "<script>
    alert('mohon isi form yang tersedia');
    window.location='../setoran.php?hari=$hari&bulan=$bulan&tahun=$tahun';
    </script>
    ";
    exit;
}

if($call->numeric_setoran() == false){
    echo "<script>
    alert('mohon isi form timbangan dan keranjang dengan angka');
    window.location='../setoran.php?hari=$hari&bulan=$bulan&tahun=$tahun';
    </script>
    ";
    exit;
}
echo $call->setoran_ubah();
echo "<script>
    alert('data berhasil diupdate');
    window.location='../setoran.php?hari=$hari&bulan=$bulan&tahun=$tahun';
    </script>
    ";


?>