<?php 
require_once("library.php");
$call = new admin;
$id = $_GET["id"];
echo $call->user_delete($id);
header("Location:../tables.php");



?>