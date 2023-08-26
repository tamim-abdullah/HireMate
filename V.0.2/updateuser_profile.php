<?php 
include "connection.php";
require_once "controllerUserData.php";
require_once "checklogin.php";

$tablename = $_SESSION['tablename'];

// Uploade New Image User Profile

if (isset($_POST['user_email']) && isset($_FILES['image'])) {


    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];
    $new_img_name = '';

    if ($error === 0 && !empty($img_name)) {
        if ($img_size > 1000000) {
            $res = [
                'status' => 422,
                'message' => 'Sorry, your Image file is too large.'
            ];
            echo json_encode($res);
            return;
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            } else {
                $res = [
                    'status' => 422,
                    'message' => "You can't upload Image files of this type"
                ];
                echo json_encode($res);
                return;
            }
        }
    } else if ($error !== 0 && !empty($img_name)) {
        $res = [
            'status' => 500,
            'message' => 'Unknown Image File Error'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 422,
            'message' => 'No image selected'
        ];
        echo json_encode($res);
        return;
    }

    if ($new_img_name !== '') {
        $query = "UPDATE usertable SET profile_image='$new_img_name' WHERE email='" . $_SESSION['email'] . "'";

        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            $res = [
                'status' => 200,
                'message' => 'Image Updated Successfully'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => mysqli_error($con)
            ];
            echo json_encode($res);
            return;
        }
    } else {
        $res = [
            'status' => 422,
            'message' => 'Invalid Request'
        ];
        echo json_encode($res);
        return;
    }
}



// User Profile Update
if(isset($_POST['name']) || isset($_POST['job_title']) || isset($_POST['company_name']) || isset($_POST['location']) || isset($_POST['phone_number']) || isset($_POST['dob']) || isset($_POST['email'])) 
{
    // Get the form input values
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $job_title = isset($_POST['job_title']) ? $_POST['job_title'] : '';
    $company_name = isset($_POST['company_name']) ? $_POST['company_name'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Prepare the SQL statement
    $stmt = $con->prepare("UPDATE usertable SET name = ?, job_title = ?, company_name = ?, location = ?, phone_number = ?, dob = ? WHERE email = ?");
    $stmt->bind_param("sssssss", $name, $job_title, $company_name, $location, $phone_number, $dob, $email);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        $response = array('status' => 'success', 'message' => 'Profile updated successfully');
    } else {
        $response = array('status' => 'error', 'message' => 'Error updating profile: ' . $stmt->error);
    }

    // Close the statement
    $stmt->close();

    // Return the response as JSON
    echo json_encode($response);
} 

if(isset($_POST['currentPassword']) && isset($_POST['newPassword'])) {
    // Get the input values
$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];
$email = $_SESSION['email'];

// Prepare the SQL statement to retrieve the hashed password
$stmt = $con->prepare("SELECT password FROM usertable WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($hashedPassword);
$stmt->fetch();
$stmt->close();

// Check if the current password is correct
if(password_verify($currentPassword, $hashedPassword)) {
    // Hash the new password
    $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Prepare the SQL statement to update the password
    $stmt = $con->prepare("UPDATE usertable SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $newHashedPassword, $email);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        $response = array('status' => 'success', 'message' => 'Password updated successfully');
    } else {
        $response = array('status' => 'error', 'message' => 'Error updating password: ' . $stmt->error);
    }

    // Close the statement
    $stmt->close();
} else {
    $response = array('status' => '422', 'message' => 'Current password is incorrect');
}

// Return the response as JSON
echo json_encode($response);
} 



?>