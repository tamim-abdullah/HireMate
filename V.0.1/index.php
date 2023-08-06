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

    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/dashbroad.css" />
    <link rel="stylesheet" href="css/sidebar_style.css" />

    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />

    <script src="https://cdn.tailwindcss.com"></script>

    <title>Dashboard</title>
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
            <span class="text">Dashboard</span>
          </div>

          <div class="boxes align-items-center justify-content-center">
            <div class="box align-items-center box1">
              <div class="flex">
                <img src="images/job.png" alt="" />

                <span class="number">50,120</span>
              </div>
              <span class="text">Total Jobs</span>
            </div>
            <div class="box box2">
              <div class="flex">
                <img src="images/candidate.png" alt="" />
                <span class="number">20,120</span>
              </div>
              <span class="text">Total Candidate Sourced</span>
            </div>
            <div class="box box3">
              <div class="flex">
                <img src="images/hired.png" alt="" />
                <span class="number">1,012</span>
              </div>
              <span class="text">Total Hired</span>
            </div>
          </div>
        </div>

        <div class="activity">
          <div class="title">
            <i class="uil uil-clock-three"></i>
            <span class="text">Recent Activity</span>
          </div>

          <div class="activity-data">
            <div class="data names">
              <span class="data-title">Name</span>
              <span class="data-list">Prem Shahi</span>
              <span class="data-list">Deepa Chand</span>
              <span class="data-list">Manisha Chand</span>
              <span class="data-list">Pratima Shahi</span>
              <span class="data-list">Man Shahi</span>
              <span class="data-list">Ganesh Chand</span>
              <span class="data-list">Bikash Chand</span>
            </div>
            <div class="data email">
              <span class="data-title">Email</span>
              <span class="data-list">premshahi@gmail.com</span>
              <span class="data-list">deepachand@gmail.com</span>
              <span class="data-list">prakashhai@gmail.com</span>
              <span class="data-list">manishachand@gmail.com</span>
              <span class="data-list">pratimashhai@gmail.com</span>
              <span class="data-list">manshahi@gmail.com</span>
              <span class="data-list">ganeshchand@gmail.com</span>
            </div>
            <div class="data joined">
              <span class="data-title">Joined</span>
              <span class="data-list">2022-02-12</span>
              <span class="data-list">2022-02-12</span>
              <span class="data-list">2022-02-13</span>
              <span class="data-list">2022-02-13</span>
              <span class="data-list">2022-02-14</span>
              <span class="data-list">2022-02-14</span>
              <span class="data-list">2022-02-15</span>
            </div>
            <div class="data type">
              <span class="data-title">Type</span>
              <span class="data-list">New</span>
              <span class="data-list">Member</span>
              <span class="data-list">Member</span>
              <span class="data-list">New</span>
              <span class="data-list">Member</span>
              <span class="data-list">New</span>
              <span class="data-list">Member</span>
            </div>
            <div class="data status">
              <span class="data-title">Status</span>
              <span class="data-list">Liked</span>
              <span class="data-list">Liked</span>
              <span class="data-list">Liked</span>
              <span class="data-list">Liked</span>
              <span class="data-list">Liked</span>
              <span class="data-list">Liked</span>
              <span class="data-list">Liked</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="sidebar.js"></script>
  </body>
</html>
