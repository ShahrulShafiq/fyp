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
  <title>Booking Status</title>
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
<div class="container-fluid">
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
        <div class="card">
          <div class="card-body">
            <div class="container-fluid">
            <h5>Booking Status</h5>
            <hr>
    <div class="row font-weight-bold">
      <div class="col-1">
    ID
    </div>
      <div class="col-2">
      Date
    </div>
      <div class="col-3">
      Time
    </div>
      <div class="col-4">
      Reason
    </div>
      <div class="col-2">
      Status
    </div>
  </div>
  <hr>
            <?php

            include 'dbcon.php';

            $selectquery= "SELECT * FROM bookings WHERE user_id = $userid ORDER BY 'bookings','date' ASC";

            $query = mysqli_query($con,$selectquery);

            while($result = mysqli_fetch_assoc($query)){

          $status = $result['status'];
          $date = $result['date'];
          $newDate = date("d-m-Y", strtotime($date));

        if ($status === "Rejected") {
        $button = "<span class='badge badge-danger'>Rejected</span>";
      } elseif ($status === "Pending") {
        $button = "<span class='badge badge-info'>Pending</span>";
      } else {
        $button = "<span class='badge badge-success'>Confirmed</span>";
      }
  ?>

  <?php
      $selectbooking = "SELECT * FROM bookings WHERE user_id = $userid";
      $fetchbooking = mysqli_query($con,$selectbooking);
      $resultbooking = mysqli_fetch_assoc($fetchbooking);
      


  ?>
  <div class="row">
    <div class="col-1">
      <?php echo $result['id'] ?>
    </div>
      <div class="col-2">
      <?php echo $newDate; ?>
    </div>
      <div class="col-3">
      <?php echo $result['timeslot'] ?>
    </div>
    <div class="col-4">
      <?php echo $result['reason'] ?>
    </div>
    <div class="col-2">
    <?php echo $button; ?>
    </div>
  </div>
  <hr>

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