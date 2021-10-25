<?php 
require_once("library.php");
$call = new admin;
header("Content-type: application/json");
echo json_encode($call->id_user());

?>