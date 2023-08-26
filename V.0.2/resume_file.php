<?php
include "connection.php";
require_once "controllerUserData.php";
require_once "checklogin.php";

$tablename = $_SESSION['tablename'];

if(isset($_FILES["file"])){
  $fileName = $_FILES["file"]["name"];
  $fileExtension = explode('.', $fileName);
  $fileExtension = strtolower(end($fileExtension));

  if (!in_array($fileExtension, array('pdf', 'doc', 'docx'))) {
    http_response_code(400); // Set the HTTP status code to 400 (Bad Request)
    echo json_encode(array('message' => 'Invalid file type.'));
    exit();
  }

  $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

  $targetDirectory = "uploads/" . $newFileName;
  move_uploaded_file($_FILES['file']['tmp_name'], $targetDirectory);

  error_reporting(0);
  ini_set('display_errors', 0);

  if (mysqli_error($con)) {
    http_response_code(500); // Set the HTTP status code to 500 (Internal Server Error)
    echo json_encode(array('message' => 'Error: ' . mysqli_error($con)));
    exit();
  }

  // Return the file URL in the response
  echo $newFileName;
  exit();
}
?>