<?php 

include "connection.php";
require_once "controllerUserData.php";
require_once "checklogin.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="sidebar_style.css" type="text/css" />

    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="resume.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>

    <!-- Sidebar -->
    <nav class="sidebar close">

        <header>
            <div class="image-text">
                <span class="image">
                    <?php include 'display_profile_image.php'; ?>
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



    <!-- Sidebar Home -->
    <section class="home">
        <div class="text">



            <div class="wrapper">
                <header> Import Resume PDF </header>
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <input class="file-input" type="file" name="file" required value="" hidden />
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Browse File to Upload</p>




                    <section class="progress-area"></section>
                    <section class="uploaded-area"></section>
                </form>


            </div>


        </div>
    </section>
    </div>
    <!-- Home end -->
    <script src="resumeimport.js"></script>
    <script src="sidebar.js"></script>




</body>

</html>