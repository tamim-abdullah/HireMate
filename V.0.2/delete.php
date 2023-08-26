<?php
include "connection.php";
require_once "controllerUserData.php";
require_once "checklogin.php";

$tablename = $_SESSION['tablename'];

if(isset($_GET["id"])){

    $id = $_GET["id"];
    

$sql ="DELETE FROM $tablename WHERE id =$id";
$con -> query($sql);

}

if(isset($_POST["delete"])){

    $ids = $_POST["ids"];
    
    

    foreach ($ids as $id) {
        $sql ="DELETE FROM $tablename  WHERE id = $id";
        $con->query($sql);
    }
}

header("location: /ats/candidate.php");
exit;
?>"

