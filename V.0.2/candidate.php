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

    <link rel="stylesheet" href="csidebar_style.css" type="text/css" />

    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="css/style.css" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Alertify CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" />

    <!-- Include Alertify theme CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.min.css" />

    <!-- Include Alertify JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>

    <!-- Bootstrap CSS
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/1io16z+K(GacbUuu6gYcD3l3q3Do+o+Wk6UMqy" crossorigin="anonymous" />

   -->

    <!-- Custom CSS  Profile modal-->

    <style>
    .full-size-modal .modal-dialog {
        max-width: 70%;
        width: 100%;
        height: 100%;
        margin-right: 30px;
    }

    .full-size-modal .modal-content {
        height: 100%;
    }
    </style>


</head>

<body>
    <div id="fullbody">
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
        <section class="home">
            <div class="text">
            </div>

            <div class="header-container">
                <form action="" method="GET" class="mt-6 mb-1">
                    <div class="input-group mb-1">
                        <input type="text" name="search" required
                            value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control"
                            placeholder="Search People">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>


            <!-- Sidebar end -->

            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-5">
                            <h2 class="heading-section">All Candidates Data</h2>




                        </div>
                    </div>



                    <!-- Tags List  -->
                    <div class="col-md-3">
                        <form action="" method="GET">
                            <div class="card shadow mt-3">
                                <div class="card-header">
                                    <h5>Filter
                                        <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <h6>Tags</h6>
                                    <hr>
                                    <?php
                                include "connection.php";
                                $tablename = $_SESSION['tablename'];
                                $tags_query = "SELECT DISTINCT tags FROM $tablename ";
                            
                                $tags_query_run  = mysqli_query($con, $tags_query);

                                if(mysqli_num_rows($tags_query_run) > 0)
                                {
                                    foreach($tags_query_run as $tagslist)
                                    {
                                        $checked = [];
                                        if(isset($_GET['tags']))
                                        {
                                            $checked = $_GET['tags'];
                                        }
                                        ?>
                                    <div>
                                        <input type="checkbox" name="tags[]" value="<?= $tagslist['tags']; ?>"
                                            <?php if(in_array($tagslist['tags'], $checked)){ echo "checked"; } ?> />
                                        <?= $tagslist['tags']; ?>
                                    </div>
                                    <?php
                                    }
                                }
                                else
                                {
                                    echo "No Tags Found";
                                }
                            ?>
                                </div>
                            </div>
                        </form>
                    </div>



                    <!-- Button Add  Delete-->
                    <div class="container_table">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <a href="#addCandidateModal" class="btn btn-success" data-toggle="modal"><i
                                                class="material-icons">&#xE147;</i>
                                            <span>Add New Candidate</span></a>
                                        <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
                                                class="material-icons">&#xE15C;</i>
                                            <span>Delete</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Main Table -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-wrap">

                                <table class="table table-responsive-xl" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>
                                                <!-- Button Select Al -->
                                                <input type="checkbox" id="selectAll" hidden />
                                                <label for="selectAll" class="select-all-button">Select All</label>
                                            </th>
                                            <th>Profile</th>
                                            <th>Email</th>
                                            <th>Tags</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                
 include "connection.php";


// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Set default values
$limit = isset($_GET['limit']) ? $_GET['limit'] : 20; // Number of rows to display per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number


$tablename = $_SESSION['tablename'];


if (isset($_GET['tags'])) {
    // Get filtered rows based on selected tags

    $branchecked = $_GET['tags'];
    $tags = "'" . implode("','", $branchecked) . "'";
    $sql = "SELECT COUNT(*) as total FROM $tablename WHERE tags IN ($tags)";
    $result = $con->query($sql);
    if (!$result) {
        die("Invalid query: " . $con->error);
    }
    $row = $result->fetch_assoc();
    $total_rows = $row['total'];
    $total_pages = ceil($total_rows / $limit);
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM $tablename WHERE tags IN ($tags) LIMIT $offset, $limit";
    $result = $con->query($sql);
} elseif (isset($_GET['search'])) {
    // Get filtered rows based on search query
    $filtervalues = $_GET['search'];
    $sql = "SELECT COUNT(*) as total FROM $tablename WHERE CONCAT(first_name, ' ', last_name, ' ', email, ' ', tags) LIKE '%$filtervalues%'";
    $result = $con->query($sql);
    if (!$result) {
        die("Invalid query: " . $con->error);
    }
    $row = $result->fetch_assoc();
    $total_rows = $row['total'];
    $total_pages = ceil($total_rows / $limit);
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM $tablename WHERE CONCAT(first_name, ' ', last_name, ' ', email, ' ', tags) LIKE '%$filtervalues%' LIMIT $offset, $limit";
    $result = $con->query($sql);
} else {
    // Get all rows
    $sql = "SELECT COUNT(*) as total FROM $tablename";
    $result = $con->query($sql);
    if (!$result) {
        die("Invalid query: " . $con->error);
    }
    $row = $result->fetch_assoc();
    $total_rows = $row['total'];
    $total_pages = ceil($total_rows / $limit);
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM $tablename LIMIT $offset, $limit";
    $result = $con->query($sql);
}

 // Fetch data 

while($row = $result-> fetch_assoc()){
  $image = '';
  if ($row['image_url']) {

      $image = $row['image_url'];


  } else {
    $image = 'data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22100%22%20height%3D%22100%22%3E%3Crect%20width%3D%22100%22%20height%3D%22100%22%20fill%3D%22blue%22%2F%3E%3Ctext%20x%3D%2250%25%22%20y%3D%2255%25%22%20font-size%3D%2250%22%20font-weight%3D%22bold%22%20text-anchor%3D%22middle%22%20dominant-baseline%3D%22central%22%20fill%3D%22white%22%3E' . substr($row['first_name'], 0, 1) . '%3C%2Ftext%3E%3C%2Fsvg%3E';
  }

  

  echo ' 
  
  <tr class="alert" role="alert">
      <td>
        <label class="checkbox-wrap checkbox-primary">
       

          <input type="checkbox" name="stud_delete_id[]" value="' . $row["id"] . '" />
          <span class="checkmark"></span>

          
        </label>
      
      </td>
      <td class="d-flex align-items-center">
    
      <div class="img" data-student-id="' . $row["id"] . '" style="background-image: url(' . $image . ');"></div>


      <div class="pl-3 email" data-student-id="' . $row["id"] . '">
        <span >' . $row["first_name"] . ' ' . $row["last_name"] . '</span>
        
      
        <span>Added: ' . date('j F Y', strtotime($row['added_at'])) . '</span>

        </div>
      </td>
      <td>' . ($row["email"] ? $row["email"] : "finding email") . '</td>
      <td class="status"><span class="active">' . $row["tags"] . '</span></td>
      <td>
      
      
  
      <button 
      type="button" 
      class="close" 
      data-dismiss="alert" 
      aria-label="Close" 
      id="deleteStudentBtn"
      value="' . $row["id"] . '"
      
      <span aria-hidden="true"> <i class="fa fa-close"></i></span>

    </button>
 
      </td>
    </tr>';
   


  }

  ?>

                                        <!-- Pages Top-->

                                        <?php if ($total_pages > 1): ?>
                                        <nav class="d-flex justify-content-center mt-3">
                                            <ul class="pagination">
                                                <?php if ($page > 1): ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                                                </li>
                                                <?php endif; ?>
                                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                                <?php if ($i == 1 || $i == $total_pages || ($i >= $page - 4 && $i <= $page + 5)): ?>
                                                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                                </li>
                                                <?php elseif ($i == 2 || $i == $total_pages - 1): ?>
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                                <?php endif; ?>
                                                <?php endfor; ?>
                                                <?php if ($page < $total_pages): ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                                                </li>
                                                <?php endif; ?>
                                            </ul>
                                        </nav>
                                        <?php endif; ?>

                                        <div id="deleteEmployeeModal" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete Candidate</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">
                                                            &times;
                                                        </button>

                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete the selected records?</p>
                                                        <p class="text-warning">
                                                            <small>This action cannot be undone.</small>
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="button" class="btn btn-default"
                                                            data-dismiss="modal" value="Cancel" />

                                                        <button type="button" class="btn btn-danger"
                                                            id="deleteMultipleBtn">Delete</button>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>



                                    </tbody>
                                </table>



                                <!-- Pages Bottom -->
                                <?php if ($total_pages > 1): ?>
                                <nav class="d-flex justify-content-center mt-3">
                                    <ul class="pagination">
                                        <?php if ($page > 1): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                                        </li>
                                        <?php endif; ?>
                                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                        <?php if ($i == 1 || $i == $total_pages || ($i >= $page - 4 && $i <= $page + 5)): ?>
                                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                        </li>
                                        <?php elseif ($i == 2 || $i == $total_pages - 1): ?>
                                        <li class="page-item disabled">
                                            <span class="page-link">...</span>
                                        </li>
                                        <?php endif; ?>
                                        <?php endfor; ?>
                                        <?php if ($page < $total_pages): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                                <?php endif; ?>


                                <!-- Drop down -->
                                <form action="" method="get" class="d-flex align-items-center">
                                    <label for="limit" class="me-2">Show:</label>
                                    <select name="limit" id="limit" class="form-select me-2">
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    <button type="submit" class="btn btn-success">Go</button>
                                </form>




                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Add Candidate Modal HTML  new Ajax-->

            <div id="addCandidateModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">




                        <form id="addCandidate" enctype="multipart/form-data">

                            <div class="modal-header">
                                <h4 class="modal-title">Add Candidate</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="errorMessage" class="alert alert-warning d-none"></div>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="first_name" />
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name" />
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" />
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <input type="text" class="form-control" name="tags" />
                                </div>

                                <div class="form-group">
                                    <label>Linkedin</label>
                                    <input type="url" class="form-control" name="linkedin" />
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image" accept="image/png, image/jpeg"
                                        max-size="65536" />
                                </div>

                            </div>



                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>


                            </div>

                        </form>
                    </div>
                </div>
            </div>



            <!-- Edit Candidate Modal Ajax-->
            <div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Candidate</h5>

                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                &times;
                            </button>
                        </div>
                        <form id="updateStudent">
                            <div class="modal-body">

                                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                                <input type="hidden" name="student_id" id="student_id">

                                <div class="mb-3">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" />
                                </div>

                                <div class="mb-3">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Tags</label>
                                    <input type="text" name="tags" id="tags" class="form-control" />
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Candidate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>





            <!-- Full Size Modal Ajax -->
            <div class="modal fade full-size-modal" id="fullSizeModal" tabindex="-1"
                aria-labelledby="fullSizeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="fullSizeModalLabel">Full Size Modal</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                &times;
                            </button>


                        </div>
                        <div class="modal-body">

                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-primary" id="prevButton">
                                    <i class="bi bi-arrow-left"></i> Previous
                                </button>
                                <button type="button" class="btn btn-primary" id="nextButton">
                                    Next <i class="bi bi-arrow-right"></i>
                                </button>
                            </div>

                            <div class="custom-container mt-3">
                                <div class="main-body">
                                    <!-- Breadcrumb -->

                                    <!-- /Breadcrumb -->

                                    <div class="row gutters-sm">
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex flex-column align-items-center text-center">
                                                        <img id="view_image" src="" alt="Admin" class="rounded-circle"
                                                            width="150" />



                                                        <!-- Profile picture upload button-->
                                                        <form class="" action="" method="post"
                                                            enctype="multipart/form-data">
                                                            <label for="Upload_new_image" class="btn btn-primary"
                                                                style="margin-top: 10px;">Upload new image</label>
                                                            <input type="file" id="Upload_new_image" name="image"
                                                                style="display: none;">
                                                        </form>


                                                        <div class="mt-1">
                                                            <h4></h4>

                                                            <p class="text-secondary mb-1"></p>
                                                            <p class="text-muted font-size-sm">
                                                                Bay Area, San Francisco, CA
                                                            </p>

                                                            <button class="btn btn-primary">+Add Job</button>
                                                            <button class="btn btn-primary">Email</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mt-3">
                                                <ul class="list-group list-group-flush">

                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0">Website</h6>
                                                        <span class="text-secondary"> <i class='bx bx-link'
                                                                style='font-size: 2em'></i>
                                                    </li>

                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0">Linkedin</h6>
                                                        <span class="text-secondary" id="view_linkedin">
                                                    </li>


                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0">Github</h6>
                                                        <span class="text-secondary"> <i class='bx bxl-github'
                                                                style='font-size: 2em'></i>
                                                    </li>
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0">Instagram</h6>
                                                        <span class="text-secondary"> <i class='bx bxl-instagram'
                                                                style='font-size: 2em'></i>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">First Name</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary" id="view_first_name"></div>
                                                    </div>
                                                    <hr />
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Last Name</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary" id="view_last_name"></div>
                                                    </div>
                                                    <hr />


                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Job Title</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary" id="view_job_title">

                                                        </div>
                                                    </div>
                                                    <hr />

                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Email</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary" id="view_email">
                                                        </div>
                                                    </div>
                                                    <hr />


                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Phone</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary" id="view_phone"></div>
                                                    </div>
                                                    <hr />
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Tags</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary" id="view_tags">


                                                        </div>
                                                        <button type="button"
                                                            class="btn btn-primary rounded-pill px-4 py-2">
                                                            <i class="bi bi-plus"></i> Add Tags
                                                        </button>
                                                    </div>

                                                    <hr />

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <button type="button" data-student-id="' + res.data.id + '"
                                                                class="editStudentBtn btn btn-info btn-sm hidden">Edit</button>




                                                            <form>
                                                                <div class=" mb-5 mt-3">
                                                                    <textarea class="form-control" id="inputFullName"
                                                                        rows="8" placeholder="Add note here"></textarea>
                                                                </div>
                                                                <button class="btn btn-primary" type="button">
                                                                    Save changes
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Full size modal end -->




            <!-- Home end-->

        </section>
    </div>
    </div>


    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" crossorigin="anonymous">
    </script>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="sidebar.js"></script>
</body>

</html>