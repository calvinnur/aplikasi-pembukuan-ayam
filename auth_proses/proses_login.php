<?php 
require_once("../auth/library.php");
$call = new auth;
if($call->require_check()["status"] == false){
    echo "<script>
    alert('mohon isi form yang tersedia');
    window.location='../index.php';
    </script>
    ";
    exit;
}

if($call->check_user() == false){
    echo "<script>
    alert('user tidak dikenal');
    window.location='../index.php';
    </script>
    ";
    exit;
}

if($call->password_check() == false){
    echo "<script>
    alert('password tidak dikenal');
    window.location='../index.php';
    </script>
    ";
    exit;
}

$_SESSION["username"] = $call->username;
echo "<script>
    alert('selamat datang ".$call->username."');
    window.location='../dashboard.php';
    </script>
    ";

?>