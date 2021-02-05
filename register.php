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
  <title>Register</title>
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

/*REGISTER FORM*/

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Montserrat', sans-serif;
}

.wrapper{
  max-width: 575px;
  width: 100%;
  background: #fff;
  margin: 20px auto;
  box-shadow: 1px 1px 2px rgba(0,0,0,0.125);
  padding: 30px;
}

.wrapper .title{
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 25px;
  color: black;
  text-transform: uppercase;
  text-align: center;
}

.wrapper .form{
  width: 100%;
}

.wrapper .form .inputfield{
  margin-bottom: 15px;
  display: flex;
  align-items: center;
}

.wrapper .form .inputfield label{
   width: 200px;
   color: #757575;
   margin-right: 10px;
  font-size: 15px;
}

.wrapper .form .inputfield .input,
.wrapper .form .inputfield .textarea{
  width: 100%;
  outline: none;
  border: 1px solid #d5dbd9;
  font-size: 15px;
  padding: 8px 10px;
  border-radius: 3px;
  transition: all 0.3s ease;
}

.wrapper .form .inputfield .textarea{
  width: 100%;
  height: 125px;
  resize: none;
}

.wrapper .form .inputfield .custom_select{
  position: relative;
  width: 100%;
  height: 37px;
}

.wrapper .form .inputfield .custom_select:before{
  content: "";
  position: absolute;
  top: 12px;
  right: 10px;
  border: 8px solid;
  border-color: #d5dbd9 transparent transparent transparent;
  pointer-events: none;
}

.wrapper .form .inputfield .custom_select select{
  -webkit-appearance: none;
  -moz-appearance:   none;
  appearance:        none;
  outline: none;
  width: 100%;
  height: 100%;
  border: 0px;
  padding: 8px 10px;
  font-size: 15px;
  border: 1px solid #d5dbd9;
  border-radius: 3px;
}


.wrapper .form .inputfield .input:focus,
.wrapper .form .inputfield .textarea:focus,
.wrapper .form .inputfield .custom_select select:focus{
  border: 1px solid #fec107;
}

.wrapper .form .inputfield p{
   font-size: 14px;
   color: #757575;
}
.wrapper .form .inputfield .check{
  width: 15px;
  height: 15px;
  position: relative;
  display: block;
  cursor: pointer;
}
.wrapper .form .inputfield .check input[type="checkbox"]{
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.wrapper .form .inputfield .check .checkmark{
  width: 15px;
  height: 15px;
  border: 1px solid black;
  display: block;
  position: relative;
}
.wrapper .form .inputfield .check .checkmark:before{
  content: "";
  position: absolute;
  top: 1px;
  left: 2px;
  width: 5px;
  height: 2px;
  border: 2px solid;
  border-color: transparent transparent #fff #fff;
  transform: rotate(-45deg);
  display: none;
}
.wrapper .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark{
  background: #fec107;
}

.wrapper .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark:before{
  display: block;
}

.wrapper .form .inputfield .btn{
  width: 100%;
   padding: 18px 10px;
  font-size: 15px; 
  border: 0px;
  background:  #fec107;
  color: #fff;
  cursor: pointer;
  border-radius: 3px;
  outline: none;
}

.wrapper .form .inputfield .btn:hover{
  background: #ffd658;
}

.wrapper .form .inputfield:last-child{
  margin-bottom: 0;
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
require 'phpmailer/PHPMailerAutoload.php';

if(isset($_POST['submituser'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $phoneno = mysqli_real_escape_string($con, $_POST['phoneno']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $datecreated = mysqli_real_escape_string($con, $_POST['date_created']);
    
    // UNTUK HASHING
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    // GENERATE TOKEN
    $token = bin2hex(random_bytes(15));


    // To check whether the email entered already exist or not
    $emailquery = " SELECT * from users where email='$email' "; 
    $query = mysqli_query($con,$emailquery);

    $emailcount = mysqli_num_rows($query);

     if($emailcount>0){ 
       $msg = "<div class='alert alert-danger'><b>Email already exist</b></div>";
    }else{ 
      if($password === $cpassword){

          $insertquery = "INSERT INTO `users` (`username`,`fullname`, `email`, `password`, `cpassword`, `phoneno`, `address`, `token`, `status`,`date_created`) VALUES ('$username','$fullname','$email','$pass','$cpass','$phoneno','$address','$token','Inactive','$datecreated')";

          $iquery = mysqli_query($con, $insertquery);

    if($iquery){

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='eventmanagementbru@gmail.com';
    $mail->Password='shafiq123';

    $mail->setFrom('eventmanagementbru@gmail.com','Event Management Brunei');
    $mail->addAddress($_POST['email']);
    $mail->addReplyTo($_POST['email'],$_POST['username']);

    $mail->isHTML(true);
    
    $mail->Subject = "Email Activation";
    $mail->Body = "Hi, $username. Thank you for joining us, please click here to activate your account <br><h3><b><a href='http://evmbrunei.live/activateusers.php?token=$token'>Activate Account</a></b></h3> ";

    if($mail->send()) {
        $msg = "<div class='alert alert-success'><b>Check your mail to activate your account $email</b></div>";
    } else {
        $msg = "<div class='alert alert-danger'><b>Email sending failed</b></div>"; 
    }


    }else{
      
      ?>
          <script>
            alert("Not Inserted");
          </script>
      <?php
    }


      }else{
           
               
                $msg = "<div class='alert alert-danger'><b>Password are not matched</b></div>";
               
                
          }
        }
      }
http://shahrulshafiq.tech/phpmyadmin/sql.php?server=1&db=evm&table=users&pos=0&token=de66e5f378af68f3c838df9ced6cc7bc

?>
<div id="background-color">
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
<!-- nav end -->

 <br>
<div class="wrapper">
  <div>
    <center>
    <?php if(isset($msg)){echo $msg;} ?>
  </center>
</div>

    <div class="title">
      Create Account
    </div>
    <br>
    <div class="form">
      <form method="POST">
       <div class="inputfield">
          <label>Display Name</label>
          <input type="text" class="input" name="username" required>
       </div>  
         <div class="inputfield">
          <label>Full Name</label>
          <input type="text" class="input" name="fullname" required>
       </div>  
        <div class="inputfield">
          <label>Email</label>
          <input type="email" class="input" name="email" required>
       </div>  
       <div class="inputfield">
          <label>Password</label>
          <input type="password" class="input" id="password_1" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
       </div>  
      <div class="inputfield">
          <label>Confirm Password</label>
          <input type="password" class="input" name="cpassword" required>
       </div> 
      <div class="inputfield">
          <label>Phone Number</label>
          +673&nbsp;<input type="number" class="input" name="phoneno" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="7" required>
       </div> 
      <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" name="address" required></textarea>
       </div> 
          <input class="input" name="date_created" value="<?php echo date("Y-m-d") ?>" hidden required>
      <p><input type="checkbox" required> Agreed to terms and conditions</p>
      </div>
        <button type="submit" class="btn btn-primary btn-block" name="submituser">Create Account</button>
        </form>
      
    </div>
</div>
</div>
<br>
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