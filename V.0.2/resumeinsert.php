<?php
include "connection.php";

$data = file_get_contents('php://input');
$data = json_decode($data, true); // decode JSON data
$name = isset($data['name']) ? mysqli_real_escape_string($con, $data['name']) : '';
$email = isset($data['email']) ? mysqli_real_escape_string($con, $data['email']) : '';

// Extract the first and last name from the name field
$name_parts = explode(" ", $name);
$first_name = isset($name_parts[0]) ? mysqli_real_escape_string($con, $name_parts[0]) : '';
$last_name = isset($name_parts[1]) ? mysqli_real_escape_string($con, $name_parts[1]) : '';

// Store data in database
if (!empty($first_name) || !empty($last_name) || !empty($email)) {
    $query = "INSERT INTO Sheikh__Saadi__candidates_all (first_name, last_name, email, tags) VALUES ('$first_name', '$last_name', '$email', 'resume_parsing')";
    if (!mysqli_query($con, $query)) {
        die('Error storing data: ' . mysqli_error($con));
    }
    echo 'Data stored successfully';
} else {
    echo 'No data provided';
}

// Close database connection
mysqli_close($con);



?>