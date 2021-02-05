<?php
session_start();

if(isset($_SESSION['username'])){
?>
<script>
alert("Please logout first");
window.location.href = 'index.php';
 </script>
 <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/1da4f880a9.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style type="text/css">

  body{
    background:#F0F8FF;
  }



    .dropbtn {
  background-color: inherit;
  color: white;
  padding: 8px;
  border: none;
  cursor: pointer;
}


.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 145px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 10px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}



/*LOGIN FORM*/

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Montserrat', sans-serif;
}

.wrapper{
  max-width: 500px;
  width: 100%;
  background: #fff;
  margin: 20px auto;
  box-shadow: 1px 1px 2px rgba(0,0,0,0.125);
  padding: 30px;
  margin-top: 95px;
}

.wrapper .title{
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 25px;
  color: black;
  text-transform: uppercase;
  text-align: center;
}


@media (max-width:420px) {
  .wrapper .form .inputfield{
    flex-direction: column;
    align-items: flex-start;
  }
  .wrapper .form .inputfield label{
    margin-bottom: 5px;
  }
  .wrapper .form .inputfield.terms{
    flex-direction: row;
  }
}

  </style>
</head>
<body>

<?php

include 'dbcon.php';

if(isset($_POST['submituser'])){
  $email = $_POST['email'];
  $password = $_POST ['password'];

  $email_search = "SELECT * from users where email='$email' and status='Active' ";
  $query = mysqli_query($con,$email_search);

  $email_count = mysqli_num_rows($query);

  if($email_count){
      $email_pass = mysqli_fetch_assoc($query);

      $db_pass = $email_pass['password'];



      $pass_decode = password_verify($password, $db_pass);

      if($pass_decode){
        // SESSION SO BOLEH BAWA TO ANOTHER PAGE
        $_SESSION['id'] = $email_pass['id'];
        $_SESSION['username'] = $email_pass['username'];
        $_SESSION['fullname'] = $email_pass['fullname'];
        $_SESSION['email'] = $email_pass['email'];
        $_SESSION['address'] = $email_pass['address'];
        $_SESSION['phoneno'] = $email_pass['phoneno'];
        $_SESSION['user_profile'] = $email_pass['user_profile'];

        echo "login successful";
        header('location:index.php');
        ?>
        <script>
          location.replace("index.php")
        </script>
        <?php
      }else{
       $msg = "<div class='alert alert-danger'><b>Incorrect Password</b></div>";
  }
  
  }else{
      $msg = "<div class='alert alert-danger'><b>Invalid Email</b></div>";
  }
}

?>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php"><i class="fas fa-calendar-alt">&nbsp; &nbsp;</i>Event Management Services</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a class="nav-link active" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="addtocart/guestindex.php">Services</a>
      </li>
       <li>
      <div class="dropdown">
      <button class="dropbtn"><i class="fas fa-store"></i></button>
      <div class="dropdown-content" style="right:0">
        <a href="vendor/registervendor.php">Create Account</a>
        <a href="vendor/login.php">Login (Vendor)</a>
      </div>
    </div>
    </li>
      <li>
      <div class="dropdown">
      <button class="dropbtn"><i class="fas fa-user"></i></button>
      <div class="dropdown-content" style="right:0">
        <a href="register.php">Create Account</a>
        <a href="login.php">Login (Member)</a>
        <a href="admin/adminlogin.php">Admin</a>
      </div>
    </div>
    </li>
    </ul>
  </div>
</nav>

  <div class="wrapper">
<div>
  <center>

  <?php if(isset($msg)){echo $msg;} ?>
    
  </center>
</div>
<br>

      <div class="title">
      Member Login <i class="fas fa-user"></i>
    </div>
    <br>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
      </div>
      <input type="email" name="email" class="form-control" placeholder="Email" required="">
    </div>

     <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
      </div>
      <input type="password" name="password" class="form-control" placeholder="Password" minlength="8" required>
    </div>
    <br>
    <div class="form-group">
      <button type="submit" name="submituser" class="btn btn-primary btn-block">Login</button>
    </div>
      

  </form>

    <p><center><b>Don't have an account?</b> <a href="register.php">Register</a></center></p>
    <br>
    <center><p><a href="#">Forgot Password?</a></p></center>
</div>
<br><br><br>
<br><br>

<!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4 text-white bg-dark">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Footer links -->
    <div class="row text-center text-md-left mt-3 pb-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Company name</h6>
        <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
          consectetur
          adipisicing elit.</p>
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
        <p>
          <a href="#!" style="color: white;">MDBootstrap</a>
        </p>
        <p>
          <a href="#!" style="color: white;">MDWordPress</a>
        </p>
        <p>
          <a href="#!" style="color: white;">BrandFlow</a>
        </p>
        <p>
          <a href="#!" style="color: white;">Bootstrap Angular</a>
        </p>
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
        <p>
          <a href="#!" style="color: white;">Your Account</a>
        </p>
        <p>
          <a href="#!" style="color: white;">Become an Affiliate</a>
        </p>
        <p>
          <a href="#!" style="color: white;">Shipping Rates</a>
        </p>
        <p>
          <a href="#!" style="color: white;">Help</a>
        </p>
      </div>

      <!-- Grid column -->
      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
        <p>
          <i class="fas fa-home mr-3"></i> Kampong Lamunin, BE1710</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> eventbru@gmail.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
        <p>
          <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Footer links -->

    <hr>

    <!-- Grid row -->
    <div class="row d-flex align-items-center">

      <!-- Grid column -->
      <div class="col-md-7 col-lg-8">

        <!--Copyright-->
        <p class="text-center text-md-left">© 2020 Copyright:
          <a href="https://mdbootstrap.com/" style="color: white;">
            <strong> MDBootstrap.com</strong>
          </a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-5 col-lg-4 ml-lg-0">

        <!-- Social buttons -->
        <div class="text-center text-md-right">
          <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1" style="color: white;">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1" style="color: white;">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1" style="color: white;">
                <i class="fab fa-google-plus-g"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1" style="color: white;">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

</footer>
<!-- Footer -->
</body>

</html>