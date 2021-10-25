<?php 
require_once("library.php");
$call = new admin;

if($call->require_check()["status"] == false){
    echo "<script>
    alert('mohon isi form yang tersedia');
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
echo $call->harga_ubah();
echo "<script>
    alert('data berhasil diupdate');
    window.location='../dashboard.php';
    </script>
    ";


?>