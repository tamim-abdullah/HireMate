<?php 
include "connection.php";
require_once "controllerUserData.php";
require_once "checklogin.php";


// Get the email from the session
$email = $_SESSION['email'];

// Prepare the SQL statement
$sql = "SELECT profile_image, job_title, company_name, location, phone_number, dob FROM usertable WHERE email = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $email);

// Execute the statement and check for errors
if ($stmt->execute()) {
    // Retrieve the data and store it in variables
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $profile_image = $row["profile_image"];
        $job_title = $row["job_title"];
        $company_name = $row["company_name"];
        $location = $row["location"];
        $phone_number = $row["phone_number"];
        $dob = $row["dob"];
    }
} else {
    // Handle the error appropriately, e.g. log it or display an error message to the user
    echo "Error retrieving user data: " . $stmt->error;
}

$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="css/profile_sidebar.css" />
    <link rel="stylesheet" href="css/profile.css" />

    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Alertify CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" />

    <!-- Include Alertify theme CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.min.css" />

    <!-- Include Alertify JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>

</head>

<body>
    <!-- Sidebar -->
    <nav class="sidebar close">

        <header>
            <div class="image-text">
                <span class="image">
                    <?php
        if(isset($profile_image) && !empty($profile_image)) {
            echo "<img src='/ats/uploads/$profile_image' alt='Profile Image' >";
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
                </span>



                <div class="text logo-text">
                    <span class="name"><?php echo $_SESSION['name']; ?></span>

                    <span class="profession"><?php echo $job_title ?></span>

                    <a href="profile.php" class="edit-link">Edit</a>

                </div>
            </div>

            <i class="bx bx-chevron-right toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">


                <ul class="menu-links">
                    <li class="sidebar-nav-link">
                        <a href="index.php">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="jobs.php">
                            <i class="bx bx-bar-chart-alt-2 icon"></i>
                            <span class="text nav-text">Jobs</span>
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="candidate.php">
                            <i class="bx bx-group icon"></i>
                            <span class="text nav-text">Candidate</span>
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="importcsv.php">
                            <i class="bx bx-import icon"></i>
                            <span class="text nav-text">Import CSV</span>
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="resume.php">
                            <i class="bx bx-data icon"></i>
                            <span class="text nav-text">Resume Parsing</span>
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="notifications.php">
                            <i class="bx bx-bell icon"></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="logout-link">
                    <a href="logout-user.php">
                        <i class="bx bx-log-out icon"></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class="bx bx-moon icon moon"></i>
                        <i class="bx bx-sun icon sun"></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>
    <!-- Sidebar end -->
    <section class="home">
        <div class="text">





            <div class="container-xl px-4 mt-4" id="profile">
                <!-- Account page navigation-->
                <nav class="nav nav-borders">
                    <a class="nav-link active ms-0"
                        href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details"
                        target="__blank">Profile</a>
                    <!-- other pages
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Security</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page"  target="__blank">Notifications</a>

         -->
                </nav>
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Profile Picture</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img id="view_image" src="/ats/uploads/<?php echo $profile_image; ?>" alt="User"
                                    class="img-account-profile rounded-circle mb-2" />


                                <!-- Profile picture upload button-->
                                <form class="" action="" method="post" enctype="multipart/form-data">
                                    <!-- Profile picture help block-->
                                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 1 MB</div>
                                    <label for="Upload_new_image" class="btn btn-primary"
                                        style="margin-top: 10px;">Upload new image</label>
                                    <input type="file" id="Upload_new_image" name="image" style="display: none;">
                                </form>


                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Account Details</div>
                            <div class="card-body">
                                <form id="profile-form" method="POST">

                                    <!-- Form Row-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputFullName">Full Name</label>
                                        <input class="form-control" id="inputFullName" type="text"
                                            placeholder="Enter your Full Name" value="<?php echo $_SESSION['name']; ?>">
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control" id="inputEmailAddress" type="email"
                                            placeholder="Enter your email address"
                                            value="<?php echo $_SESSION['email']; ?>" readonly>
                                    </div>


                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputPhone">Phone number</label>
                                            <input class="form-control" id="inputPhone" type="tel"
                                                placeholder="Enter your phone number"
                                                value="<?php echo $phone_number ?>">
                                        </div>
                                    </div>
                                    <!-- Save changes button-->
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                </form>


                                <!--  Password Form  -->

                                <form class="mt-5">
                                    <!-- Form Group (current password)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="currentPassword">Current Password</label>
                                        <input class="form-control" id="currentPassword" type="password"
                                            placeholder="Enter current password">
                                    </div>
                                    <!-- Form Group (new password)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="newPassword">New Password</label>
                                        <input class="form-control" id="newPassword" type="password"
                                            placeholder="Enter new password">
                                    </div>
                                    <!-- Form Group (confirm password)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                        <input class="form-control" id="confirmPassword" type="password"
                                            placeholder="Confirm new password">
                                    </div>
                                    <button class="btn btn-primary" type="button" id="changePasswordBtn">Change
                                        Password</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    </div>


    <script src="js/sidebar.js"></script>
    <script src="js/profile.js"></script>
</body>

</html>