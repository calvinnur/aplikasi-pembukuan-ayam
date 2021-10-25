<?php 
require_once("library.php");
$call = new admin;
$id = $_GET["id"];
echo $call->harga_delete($id);
echo "<script>
    alert('data berhasil dihapus');
    window.location='../dashboard.php';
    </script>
    ";


?>