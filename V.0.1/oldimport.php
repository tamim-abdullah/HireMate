<?php 
session_start();
include "connection.php";
require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>



<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>File Upload with Progress Bar | CodingNepal</title>
    <link rel="stylesheet" href="importcsv.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
  </head>
  <body>

  <?php

include "connection.php";

  $file_name =  $_FILES['file']['name']; //getting file name
  $tmp_name = $_FILES['file']['tmp_name']; //getting temp_name of file
  $file_up_name = time().$file_name; //making file name dynamic by adding time before file name
  move_uploaded_file($tmp_name, "files/".$file_up_name); //moving file to the specified folder with dynamic name

if (isset ($_POST["file"])){

  $file_name =  $_FILES['file']['name']; //getting file name

if($_FILES["file"]["size"]>0){

$file=fopen($file_name,"r");

while(($column=fgetcsv($file,10000,","))!==false){

 
  $sqlInsert ="INSERT INTO candidates_all (first_name, last_name, email, tags, linkedin) values('" .$column[0] . "','" .$column[1] . "','" .$column[2] . "','" .$column[3] . "','" .$column[4] . "')";

$result =mysqli_query($con,$sqlInsert);


if(!empty($result)){

  echo"CSV DATA Imported";

}

else{
  echo "Problem in Importing CSV File: " . mysqli_error($con);
}


}

}

}
  
  
?>

    <div class="wrapper">
      <header>CSV File Import</header>
      <form
        action="#"
        method="post"
        name="uploadCsv"
        enctype="multipart/form-data"
      >
        <button
          class="file-input"
          type="file"
          name="file"
          accept=".csv"
          hidden
        >  </button>
        <i class="fas fa-cloud-upload-alt"></i>
        <p>Browse File to Upload</p>

    
    
      </form>
      <section class="progress-area"></section>
      <section class="uploaded-area"></section>
    </div>

    <script src="importcsv.js"></script>
  </body>
</html>
