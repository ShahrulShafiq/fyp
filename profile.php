<?php
include 'dbcon.php';
session_start();

if(!isset($_SESSION['username'])){
?>
<script>
alert("You are logged out");
window.location.href = 'login.php';
 </script>
 <?php
}

// FETCH DETAIL USER YANG TAKAN USING SESSION ID

$id=$_SESSION['id'];
$query=mysqli_query($con, "SELECT * FROM users WHERE id='$id'");
$row=mysqli_fetch_array($query);


?>


<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/1da4f880a9.js" crossorigin="anonymous"></script>
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

/*styling inputfile*/
#file{
   width: 230px;
   height: 40px;
   margin-top: 15px;
}

#uploadbutton{
  
  margin-top: 10px;
}

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Montserrat', sans-serif;
}
  </style>
</head>
<body>
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
        <a class="nav-link active" href="calendar.php">Book Slot</a>
      </li>
        <li class="nav-item">
        <a class="nav-link active" href="fullcalendar/index.php">Calendar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="addtocart/index.php">Services</a>
      </li>
      <li>
      <li class="nav-item">
        <a class="nav-link active" href="chat/chat.php">Vendor</a>
      </li>
      <li>
      <div class="dropdown">
      <button class="dropbtn"><i class="fas fa-user"></i></button>
      <div class="dropdown-content" style="right:0">
         <a href="bookmarklist.php">Info</a>
        <a href="profile.php">Profile Setting</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>
    </li>
    </ul>
  </div>
</nav>
<br>

<!-- CONTAINER -->
<div class="container">
<div class="row flex-lg-nowrap">
  <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
    <div class="card p-3">
      <div class="e-navlist e-navlist--active-bg">
        <ul class="nav">
          <li class="nav-item"><a class="nav-link px-2 active" href="bookmarklist.php"><i class="fa fa-fw fa-bookmark mr-1"></i><span>Bookmark </span></a></li>
          <li class="nav-item"><a class="nav-link px-2 active" href="bookingstatus.php"><i class="fa fa-fw fa-calendar-times mr-1"></i><span>Booking </span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="message/chat.php"><i class="fa fa-fw fa-envelope"></i><span> Message </span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="orderhistory.php"><i class="fa fa-fw fa-shopping-basket"></i><span> Order </span></a></li>
          <li class="nav-item"><a class="nav-link px-2" href="profile.php"><i class="fa fa-fw fa-cog"></i><span> Settings </span></a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                    <img src="<?php echo $row['user_profile']; ?>" width="136px" height="136px">
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $row['fullname']; ?></h4>
                    <p class="mb-0">@<?php echo $row['username']; ?></p>
                    <div class="text-muted"><small>Online</small></div>
                    <div class="mt-2">
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                      <input type="file" name="file" id="file" class="form-control">
                      
                      <button class="btn btn-primary" type="submit" name="upload" id="uploadbutton">
                        <i class="fa fa-fw fa-camera"></i>
                        <span><small>Change Photo</small></span>
                      </button>
                     </form>
                    </div>
                  </div>
                  <div class="text-center text-sm-right">
                    <span class="badge badge-success"><?php echo $row['status']; ?></span>
                    <div class="text-muted"><small>Joined <?php echo $row['date_created']; ?></small></div>
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">

                  <form method="POST" action="updateuser.php">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Full Name</label>
                              <input class="form-control" type="text" name="fullname" value="<?php echo $row['fullname']; ?>">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Display Name</label>
                              <input class="form-control" type="text" name="username" value="<?php echo $row['username']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="email" name="email" value="<?php echo $row['email']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Phone No</label>
                              <input class="form-control" type="text" name="phoneno" value="<?php echo $row['phoneno']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>Address</label>
                              <textarea class="form-control" name="address" rows="5"><?php echo $row['address']; ?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                 
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button  type="submit" class="btn btn-primary" name="update">Save Changes</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <!-- CHANGE PASSWORD -->
        <?php
        $id = $_SESSION['id'];

   

        if(isset($_POST['changepassword'])){
    
        $currentpassword = mysqli_real_escape_string($con, $_POST['currentpassword']);
        $newpassword = mysqli_real_escape_string($con, $_POST['newpassword']);
        $confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);

        $checkpassword = "SELECT * FROM users WHERE id='$id' ";
        $query = mysqli_query($con,$checkpassword);
        $data = mysqli_fetch_array($query);

        $oldpwd=$data['password'];

        $pass_decode = password_verify($currentpassword, $oldpwd);

        if($pass_decode){
            
          if($newpassword === $confirmpassword){

          // UNTUK HASHING
          $pass = password_hash($newpassword, PASSWORD_BCRYPT);
          $cpass = password_hash($confirmpassword, PASSWORD_BCRYPT);

          $updatepassword = "UPDATE users SET password='$pass', cpassword='$cpass' WHERE id='$id' ";
          $pquery = mysqli_query($con, $updatepassword);
        $msg = "<div class='alert alert-success'><b>Password changed successfully</b></div>";
          }
           else{
              $msg = "<div class='alert alert-danger'><b>Both password does not match</b></div>";
              }
           
            }
         else{
           $msg = "<div class='alert alert-danger'><b>You entered the wrong password</b></div>";;
           }
       }
        
        ?>
        <div>
      <center>

      <?php if(isset($msg)){echo $msg;} ?>
    
      </center>
      </div>
        <div class="card">
          <div class="card-body">
            <form method="POST">
               <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Change Password</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Current Password</label>
                              <input class="form-control" type="password" placeholder="••••••" name="currentpassword">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" type="password" placeholder="••••••" id="password_1" name="newpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" name="confirmpassword" placeholder="••••••"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                        <div class="mb-2"><b>Keeping in Touch</b></div>
                        <div class="row">
                          <div class="col">
                            <label>Email Notifications</label>
                            <div class="custom-controls-stacked px-2">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-blog" checked="">
                                <label class="custom-control-label" for="notifications-blog">Blog posts</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-news" checked="">
                                <label class="custom-control-label" for="notifications-news">Newsletter</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="notifications-offers" checked="">
                                <label class="custom-control-label" for="notifications-offers">Personal Offers</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button  type="submit" class="btn btn-secondary" name="changepassword">Change Password</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>


      </div>
      <div class="col-12 col-md-3 mb-3">
        <!-- <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
              <button class="btn btn-block btn-secondary">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
              </button>
            </div>
          </div>
        </div> -->
        <div class="card">
          <div class="card-body">
            <h6 class="card-title font-weight-bold">Support</h6>
            <p class="card-text">Get fast, free help from our friendly assistants.</p>
            <button type="button" class="btn btn-primary">Contact Us</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
</div>

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