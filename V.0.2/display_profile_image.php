<?php
include "connection.php";
require_once "controllerUserData.php";
require_once "checklogin.php";

if(isset($_SESSION['profile_image']) && !empty($_SESSION['profile_image'])) {
  echo "<img src='/ats/uploads/{$_SESSION['profile_image']}' alt='Profile Image'>";
} else {
  $name = $_SESSION['name'];
  $nameArray = explode(" ", $name);
  $firstName = $nameArray[0];
  $lastName = end($nameArray);
  $initials = strtoupper(substr($firstName, 0, 1).substr($lastName, 0, 1));
  echo "<svg width='50' height='50'>
    <circle cx='50%' cy='50%' r='50%' fill='#EE480A'></circle>
    <text x='50%' y='50%' text-anchor='middle' alignment-baseline='central' font-size='24' fill='#fff'>$initials</text>
  </svg>";
}
?>