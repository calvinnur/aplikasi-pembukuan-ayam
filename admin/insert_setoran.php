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
    alert('mohon isi form yang telah tersedia');
    window.location='../setoran.php?hari=$hari&bulan=$bulan&tahun=$tahun';
    </script>
    ";
    exit;
}

if($call->numeric_setoran() == false){
    echo "<script>
    alert('mohon isi dengan angka');
    window.location='../setoran.php?hari=$hari&bulan=$bulan&tahun=$tahun';
    </script>
    ";
    exit;
}

if($call->check_setoran() == false){
    header("Location:../setoran.php?hari=$hari&bulan=$bulan&tahun=$tahun&info='data tersebut telah terisi''");
    exit;
}

echo $call->setoran_insert();
echo "<script>
    alert('data berhasil terisi');
    window.location='../setoran.php?hari=$hari&bulan=$bulan&tahun=$tahun';
    </script>
    ";


?>