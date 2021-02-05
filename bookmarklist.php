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

$userid = $_SESSION['id'];

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
  background-color:#F0F8FF;
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
        <!-- Bookmark List -->
        <?php if(isset($msg)){echo $msg;} ?>
        <div class="card">
          <div class="card-body">
            <div class="container">
            <h5 class="text-center">Your bookmark</h5>
            <hr>    
    <div class="row text-center">
  <?php

  include 'dbcon.php';

  $selectquery= "SELECT * FROM bookmark WHERE user_id = $userid";

  $query = mysqli_query($con,$selectquery);

  while($result = mysqli_fetch_assoc($query)){


  ?>
        <!-- Team item -->
    
        <div class="col-xl-4 col-sm-6 mb-5">

         
            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://icon-library.com/images/shop-icon/shop-icon-3.jpg" alt="" width="100" class="img-fluid mb-3 ">
               <a href="rating.php?id=<?php echo $result['business_id']; ?>" style="color: black;">
                <h5 class="mb-0"><?php echo $result['businessname'] ?></h5><span class="small text-uppercase text-muted"><?php echo $result['services'] ?></span>
                 </a>

                 <form method="POST" action="deletebookmark.php">
                   <br>
                   <input type="text" name="vendorid" value="<?php echo $result['business_id'] ?>" hidden>
                   <button name="deletebookmark" class="btn btn-danger" onclick="return confirm('Are you sure want to remove this vendor?');">Remove</button>
                 </form>
            </div>
         
        </div><!-- End -->
       
  <?php

   }

  ?>
        
    </div>
</div>
                      </div>
                    </div>
                  </div>
                </div>


      </div>

    </div>

  </div>
</body>
</html>