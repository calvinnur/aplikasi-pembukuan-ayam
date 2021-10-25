<?php 
require_once("library.php");
$call = new admin;

if($call->require_check()["status"] == false){
    echo "<script>
    alert('mohon isi form yang tersedia');
    window.location='../tables.php';
    </script>
    ";
    exit;
}

if($call->user_check() == false){
    echo "<script>
    alert('user telah tersedia mohon isi dengan yang lain');
    window.location='../tables.php';
    </script>
    ";
    exit;
}

if($call->phone_numeric() == false){
    echo "<script>
    alert('mohon isi form no telephone dengan huruf');
    window.location='../tables.php';
    </script>
    ";
    exit;
}

if($call->phone_length() == false){
    echo "<script>
    alert('mohon isi form no telephone dengan minimal 10 digit');
    window.location='../tables.php';
    </script>
    ";
    exit;
}

if($call->number_check() == false){
    echo "<script>
    alert('No telp telah dimiliki oleh user lain');
    window.location='../tables.php';
    </script>
    ";
    exit;
}
echo $call->user_insert();
header("Location:../tables.php");


?>