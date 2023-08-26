<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Jobs</title>
    <link rel="stylesheet" href="job.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="sidebar_style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="job.js" defer></script>
    <script src="sidebar.js"></script>

    <style>
      /* Font name - Poppins ( Link in Description ) */
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap");

      /* Lets style Button Hover Effect  */
    </style>
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
  
  

<div class="mainContainer1">
  <div class="container1">
    <h3>Front-end Devloper</h3>  
    <div class="time">
      <div class="ti">Full time</div>
    <div class="ti">NewYork</div>
    
    </div>
    <div class="buttonContainer">
     
    </div>
    
    
  
    
  </div>
  
  <div class="container2">
    <div class="row">
      <div class="inner"><span>SOURCED</span></div>
      <div class="inner"><span>APPLIED</span></div>
      <div class="inner"><span>INTERVIEW</span></div>
      <div class="inner"><span>OFFERED</span></div>
      <div class="inner"><span>HIRED</span></div>
    </div>
    <div class="container3" id="kanbanContainer1">
          
      <div class="kanban-board">
          <div class="kanban-block" id="TASKBAKE" ondrop="drop(event)" ondragover="allowDrop(event)">
             
                
              <div class="task" id="task4" draggable="true" ondragstart="drag(event)">
                  <div class="item">
                      <div class="details">
                        <img src="images/img-1.jpg" />
                        <span>Kristina Zasiadko</span>
                      </div>
                      
                  </div>
          </div>
              <div class="task" id="task5" draggable="true" ondragstart="drag(event)">
                  <div class="item">
                      <div class="details">
                        <img src="images/img-1.jpg" />
                        <span>Kristina Zasiadko</span>
                      </div>
                      
                  </div>
              </div>
              <div class="task" id="task6" draggable="true" ondragstart="drag(event)">
                  <div class="item">
                      <div class="details">
                        <img src="images/img-1.jpg" />
                        <span>Kristina Zasiadko</span>
                      </div>
                      
                  </div>
              </div>
          </div>
          <div class="kanban-block" id="TASKBAKE" ondrop="drop(event)" ondragover="allowDrop(event)">
              
              <div class="task" id="task1" draggable="true" ondragstart="drag(event)">
                  <div class="item">
                      <div class="details">
                        <img src="images/img-1.jpg" />
                        <span>Kristina Zasiadko</span>
                      </div>
                      
                  </div>
              </div>
  
              <div class="task" id="task2" draggable="true" ondragstart="drag(event)">
                  <div class="item">
                      <div class="details">
                        <img src="images/img-1.jpg" />
                        <span>Kristina Zasiadko</span>
                      </div>
                      
                  </div>
              </div>
          </div>
          <div class="kanban-block" id="TASKBAKE" ondrop="drop(event)" ondragover="allowDrop(event)">
              
              <div class="task" id="task3" draggable="true" ondragstart="drag(event)">
                  <div class="item">
                      <div class="details">
                        <img src="images/img-1.jpg" />
                        <span>Kristina Zasiadko</span>
                      </div>
                      
                  </div>
              </div>
          </div>
          <div class="kanban-block" id="TASKBAKE" ondrop="drop(event)" ondragover="allowDrop(event)">
              
            <div class="task" id="task3" draggable="true" ondragstart="drag(event)">
                <div class="item">
                    <div class="details">
                      <img src="images/img-1.jpg" />
                      <span>Kristina Zasiadko</span>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="kanban-block" id="TASKBAKE" ondrop="drop(event)" ondragover="allowDrop(event)">
              
          <div class="task" id="task3" draggable="true" ondragstart="drag(event)">
              <div class="item">
                  <div class="details">
                    <img src="images/img-1.jpg" />
                    <span>Kristina Zasiadko</span>
                  </div>
                  
              </div>
          </div>
      </div>
      </div>      
  </div>
  </div>
</div>








<div class="mainContainer2">
  <div class="container1">
    <h3>Paper Salesman</h3>  
    <div class="time">
      <div class="ti">Full time</div>
    <div class="ti">Banglore</div>
    
    </div>
    <div class="buttonContainer">
     
    </div>
  </div>
  
  <div class="container2">
    <div class="row">
      <div class="inner"><span>SOURCED</span></div>
      <div class="inner"><span>APPLIED</span></div>
      <div class="inner"><span>INTERVIEW</span></div>
      <div class="inner"><span>OFFERED</span></div>
      <div class="inner"><span>HIRED</span></div>
    </div>
    <div class="container3" id="kanbanContainer2">
          
      <div class="kanban-board">
          <div class="kanban-block" id="TASKBAKE" ondrop="drop(event)" ondragover="allowDrop(event)">
             
                
              <div class="task" id="task4" draggable="true" ondragstart="drag(event)">
                  <div class="item">
                      <div class="details">
                        <img src="images/img-1.jpg" />
                        <span>Kristina Zasiadko</span>
                      </div>
                      
                  </div>
          </div>
              <div class="task" id="task5" draggable="true" ondragstart="drag(event)">
                  <div class="item">
                      <div class="details">
                        <img src="images/img-1.jpg" />
                        <span>Kristina Zasiadko</span>
                      </div>
                      
                  </div>
              </div>
              <div class="task" id="task6" draggable="true" ondragstart="drag(event)">
                  <div class="item">
                      <div class="details">
                        <img src="images/img-1.jpg" />
                        <span>Kristina Zasiadko</span>
                      </div>
                      
                  </div>
              </div>
          </div>
          <div class="kanban-block" id="TASKBAKE" ondrop="drop(event)" ondragover="allowDrop(event)">
              
              <div class="task" id="task1" draggable="true" ondragstart="drag(event)">
                  <div class="item">
                      <div class="details">
                        <img src="images/img-1.jpg" />
                        <span>Kristina Zasiadko</span>
                      </div>
                      
                  </div>
              </div>
  
              <div class="task" id="task2" draggable="true" ondragstart="drag(event)">
                  <div class="item">
                      <div class="details">
                        <img src="images/img-1.jpg" />
                        <span>Kristina Zasiadko</span>
                      </div>
                      
                  </div>
              </div>
          </div>
          <div class="kanban-block" id="TASKBAKE" ondrop="drop(event)" ondragover="allowDrop(event)">
              
              <div class="task" id="task3" draggable="true" ondragstart="drag(event)">
                  <div class="item">
                      <div class="details">
                        <img src="images/img-1.jpg" />
                        <span>Kristina Zasiadko</span>
                      </div>
                      
                  </div>
              </div>
          </div>
          <div class="kanban-block" id="TASKBAKE" ondrop="drop(event)" ondragover="allowDrop(event)">
              
            <div class="task" id="task3" draggable="true" ondragstart="drag(event)">
                <div class="item">
                    <div class="details">
                      <img src="images/img-1.jpg" />
                      <span>Kristina Zasiadko</span>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="kanban-block" id="TASKBAKE" ondrop="drop(event)" ondragover="allowDrop(event)">
              
          <div class="task" id="task3" draggable="true" ondragstart="drag(event)">
              <div class="item">
                  <div class="details">
                    <img src="images/img-1.jpg" />
                    <span>Kristina Zasiadko</span>
                  </div>
                  
              </div>
          </div>
      </div>
      </div>      
  </div>
  </div>
</div>
<div class="container">
  <div class="dropdown">
    Filter
    <span class="arrow left_arrow"></span>
    <span class="arrow right_arrow"></span>
    <div class="items">

      <span style="--i: 2" class="item about">Filter2</span>
      <span style="--i: 3" class="item contact">Filter3</span>
    </div>
  </div>
</div>
    
  </body>
</html>
