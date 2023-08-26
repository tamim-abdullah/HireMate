<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="login_style.css">
</head>

<body>
    <div class="container1">
    <h1>Streamlined Hiring Solutions, Elevating Your Workforce</h1>
        <h3 class="hire-mate">Hire <span class="mate">Mate</span></h3>

        <div class="jawad"></div>
        <div class="chief">
          <h5>Dhaka Bangladesh</h5>
        </div>
    </div>

    <div class="container2">

        <form action="login-user.php" method="POST" autocomplete="">
            <h2 class="text-center">Login Form</h2>
            <p class="text-center">Login with your email and password.</p>
            <?php
                    if(count($errors) >
          0){ ?>
            <div class="alert alert-danger text-center">
                <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
            </div>
            <?php
                    }
                    ?>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email Address" required
                    value="<?php echo $email ?>" />
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password" required />
            </div>
            <div class="link forget-pass text-left">
                <a href="forgot-password.php">Forgot password?</a>
            </div>
            <div class="button">
                <input class="form-control button" type="submit" name="login" value="Login" />
            </div>
                
            <button class="button form-control button">
            <img class="icon" src="images/google.png" alt="" />
            Sign in with Google
          </button>


          <button class="button form-control button">
            <img class="icon" src="images/Apple.png" alt="" />
            Sign in with Google
          </button>

            <div class="link login-link text-center">
                Not yet a member? <a href="signup-user.php">Signup now</a>
            </div>



        </form>
    </div>
    </div>
</body>

</html>