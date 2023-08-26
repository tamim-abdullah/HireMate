<?php 
include "connection.php";
require_once "controllerUserData.php";
require_once "checklogin.php";?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />


    <link rel="stylesheet" href="dashbroad.css" />
    <link rel="stylesheet" href="sidebar_style.css" />


    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

    <title> Dashboard </title>
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

    <section class="home">
        <div class="top">
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here..." />
            </div>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Notifications</span>
                </div>


                <script src="sidebar.js"></script>
</body>

</html>