<?php

include "connection.php";
require_once "controllerUserData.php";
require_once "checklogin.php";

$tablename = $_SESSION['tablename'];

if (isset($_POST['add_candidate'])) {
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
    }

    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $tags = mysqli_real_escape_string($con, $_POST['tags']);
    $linkedin = mysqli_real_escape_string($con, $_POST['linkedin']);
    $image_url='uploads/' . $new_img_name;

    if ($first_name == NULL || $last_name == NULL || $email == NULL || $tags == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    if (empty($new_img_name)) {
        $query = "INSERT INTO $tablename (first_name,last_name,email,tags,linkedin) VALUES ('$first_name','$last_name','$email','$tags','$linkedin')";
    } else {
        $query = "INSERT INTO $tablename (first_name,last_name,email,tags,linkedin,image_url) VALUES ('$first_name','$last_name','$email','$tags','$linkedin','$image_url')";
    }

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Candidates Add Successfully'
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
}


if(isset($_POST['update_student']))
{
    // Get the student ID and input values from the form
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $tags = mysqli_real_escape_string($con, $_POST['tags']);
    $linkedin = mysqli_real_escape_string($con, $_POST['linkedin']);

    // Validate the input values
    if($first_name == NULL || $last_name == NULL || $email == NULL || $tags == NULL || $linkedin == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    // Update the student record in the database
    $query = "UPDATE $tablename SET first_name='$first_name', last_name='$last_name', email='$email', tags='$tags', linkedin='$linkedin' WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Candidate Updated Successfully',
            'data' => [
                'student_id' => $student_id,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'tags' => $tags,
                'linkedin' => $linkedin,
            ]
        ];
        echo json_encode($res);
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Student Not Updated: ' . mysqli_error($con)
        ];
        echo json_encode($res);
    }
}

if(isset($_GET['student_id']))
{
    $student_id = mysqli_real_escape_string($con, $_GET['student_id']);

    $query = "SELECT * FROM $tablename WHERE id=?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "i", $student_id);
mysqli_stmt_execute($stmt);
$query_run = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($query_run) == 1)
    {
        $student = mysqli_fetch_array($query_run);

        // Check if the student has an image URL and set the $image variable accordingly
        if ($student['image_url']) {
            $image = $student['image_url'];
        } else {
            $image = 'data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%22%20height%3D%22100%22%3E%3Crect%20width%3D%22100%22%20height%3D%22100%22%20fill%3D%22blue%22%2F%3E%3Ctext%20x%3D%2250%25%22%20y%3D%2255%25%22%20font-size%3D%2250%22%20font-weight%3D%22bold%22%20text-anchor%3D%22middle%22%20dominant-baseline%3D%22central%22%20fill%3D%22white%22%3E' . substr($student['first_name'], 0, 1) . '%3C%2Ftext%3E%3C%2Fsvg%3E';
        }

        // Add the $image variable to the $student array
        $student['image'] = $image;

        $res = [
            'status' => 200,
            'message' => 'Student Fetch Successfully by id',
            'data' => $student
        ];
        echo json_encode($res);
        return;
    }
    
}


if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $query = "DELETE FROM $tablename   WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Candidate Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Candidate Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_multiple_students']) && isset($_POST['student_ids'])) {
    $student_ids = $_POST['student_ids'];
    $query = "DELETE FROM $tablename WHERE id IN($student_ids)";
    $result = mysqli_query($con, $query);
    if($result) {
        $response = array(
            'status' => 200,
            'message' => 'Selected records deleted successfully'
        );
        echo json_encode($response);
    } else {
        $response = array(
            'status' => 500,
            'message' => 'Error deleting records'
        );
        echo json_encode($response);
    }
}

// Uploade New Image Candidates Profile

if (isset($_POST['student_id']) && isset($_FILES['image'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

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
                $new_img_name = '/ats/uploads/' . uniqid("IMG-", true) . '.' . $img_ex_lc;
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
        $query = "UPDATE $tablename SET image_url='$new_img_name' WHERE id='$student_id'";
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



?>