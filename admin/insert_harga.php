<?php 
require_once("library.php");
$call = new admin;

if($call->require_check()["status"] == false){
    echo "<script>
    alert('mohon isi form yang telah tersedia');
    window.location='../dashboard.php';
    </script>
    ";
    exit;
}

if($call->numeric_harga() == false){
    echo "<script>
    alert('mohon isi form harga dengan angka');
    window.location='../dashboard.php';
    </script>
    ";
    exit;
}

if($call->harga_date() == false){
    echo "<script>
    alert('data untuk hari ini telah terisi');
    window.location='../dashboard.php';
    </script>
    ";
    exit;
}
echo $call->harga_insert();
echo "<script>
    alert('data berhasil terisi');
    window.location='../dashboard.php';
    </script>
    ";


?>