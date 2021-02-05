  <?php
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

  $mysqli = new mysqli("localhost", "root", "", "evm");


  // Get average rating
  function getAverageRating(){
    global $mysqli;
    // REFER DARI LINE 144 YANG FETCH BUSINESSNAME
    $id = $_GET['id'];
    $averagequery = "SELECT * FROM vendors where id=$id";
    $queryaverage = mysqli_query($mysqli,$averagequery);
    $resultaverage = mysqli_fetch_assoc($queryaverage);
    $businessname = $resultaverage['businessname'];
    // END
    $query = "SELECT avg(rating) as avg from feedback WHERE vendor_name = '$businessname'";
              $stmt = $mysqli->prepare($query);
              if($stmt->execute()){
              $result = $stmt->get_result();
              if($result->num_rows>0){
                $row=$result->fetch_assoc();
                return $row['avg'];
              }
              }
  }

  ?>

    <?php

  include 'dbcon.php';

  $id = $_GET['id'];


  $selectquery= "SELECT * FROM vendors where id=$id";
  $query = mysqli_query($con,$selectquery);
  $result = mysqli_fetch_assoc($query);

   
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Vendor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <style type="text/css">
  
  /*vendor container*/
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



.card {
    margin-bottom: 1.5rem;
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #e5e9f2;
    border-radius: .2rem;
}
.card-header:first-child {
    border-radius: calc(.2rem - 1px) calc(.2rem - 1px) 0 0;
}

.card-header {
    border-bottom-width: 1px;
}
.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    color: inherit;
    background-color: #fff;
    border-bottom: 1px solid #e5e9f2;
}
svg:not(:root).svg-inline--fa {
    overflow: visible;
}

.svg-inline--fa.fa-fw {
    width: 1.25em;
}

.svg-inline--fa.fa-w-16 {
    width: 1em;
}

/*rating block*/
.rating-block{
    background-color:#FAFAFA;
    border:1px solid #EFEFEF;
    padding:15px 15px 20px 15px;
    border-radius:3px;
}
.bold{
    font-weight:700;
}
.padding-bottom-7{
    padding-bottom:7px;
}

.review-block{
    background-color:#FAFAFA;
    border:1px solid #EFEFEF;
    padding:15px;
    border-radius:3px;
    margin-bottom:15px;
}
.review-block-name{
    font-size:12px;
    margin:10px 0;
}
.review-block-date{
    font-size:12px;
}
.review-block-rate{
    font-size:13px;
    margin-bottom:15px;
}
.review-block-title{
    font-size:15px;
    font-weight:700;
    margin-bottom:10px;
}
.review-block-description{
    font-size:13px;
}

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Montserrat', sans-serif;
}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src="https://kit.fontawesome.com/1da4f880a9.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
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
<br><br>
<?php
 if(isset($_POST['submitbookmark'])){

    $businessid  = mysqli_real_escape_string($con, $_POST['businessid']);
    $userid  = mysqli_real_escape_string($con, $_POST['userid']);
    $bname  = mysqli_real_escape_string($con, $_POST['bname']);
    $businessemail  = mysqli_real_escape_string($con, $_POST['businessemail']);
    $bservices  = mysqli_real_escape_string($con, $_POST['bservices']);
    $bphoneno  = mysqli_real_escape_string($con, $_POST['bphoneno']);
    $baddress  = mysqli_real_escape_string($con, $_POST['baddress']);
    $bdistrict  = mysqli_real_escape_string($con, $_POST['bdistrict']);

    $userandbusinessnamequery = "SELECT * FROM bookmark WHERE user_id = '$userid' AND business_id = '$businessid'  ";

    $resultbookmark = mysqli_query($con,$userandbusinessnamequery);

    $userandbusinessnamecount = mysqli_num_rows($resultbookmark);

    if($userandbusinessnamecount>0){
        $msgbookmark = "<div class='alert alert-danger'><b>You already bookmark this vendor</b></div>";
    } else {
    $insertquery = "INSERT INTO `bookmark` 
    (`user_id`,`business_id`,`businessemail`,`businessname`,`services`,`phoneno`,`address`,`district`) 
    VALUES 
    ('$userid','$businessid','$businessemail','$bname','$bservices','$bphoneno','$baddress','$bdistrict')";

     $iquery = mysqli_query($con, $insertquery);

      $msgbookmark = "<div class='alert alert-success'><b>Vendor added to your bookmark</b></div>";
  }
}else{
  echo mysqli_error($con);
}

?>

<?php
  $id = $_GET['id'];
   if(isset($_POST['removebookmark'])){
   $stmt = $con->prepare("DELETE FROM bookmark WHERE user_id= $userid AND business_id = $id");
   $stmt->execute();
   $msgbookmark = "<div class='alert alert-danger'><b>Vendor removed from your bookmark</b></div>";

 }

?>

<?php
  $id = $_GET['id'];

  $stmt = $con->prepare("SELECT * FROM bookmark WHERE business_id = '$id' AND user_id = $userid");
  $stmt->execute();
  $stmt->store_result();
  $rows = $stmt->num_rows;

  if ($rows>0) {
    $buttonbookmark = "<button class='btn btn-danger btn-sm' type='submit' name='removebookmark'><i class='far fa-bookmark'></i><span> Unbookmark</span></button>";
  } else{
    $buttonbookmark = "<button class='btn btn-primary btn-sm' type='submit' name='submitbookmark'><i class='far fa-bookmark'></i><span> Bookmark</span></button>";
  }

?>

<div class="container">
<div>
  <center>

  <?php if(isset($msgbookmark)){echo $msgbookmark;} ?>
    
  </center>
</div>
<div class="row">
    <div class="col-md-4 col-xl-3">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Profile Details</h5>
            </div>
            <div class="card-body text-center">
                <img src="https://icon-library.com/images/shop-icon/shop-icon-3.jpg" alt="Marie Salter" width="128" height="128">
                <h4 class="card-title mb-0"><?php echo $result['businessname']; ?></h4>
                <div class="text-muted mb-2"><?php echo $result['services']; ?></div>

                <div>
                <form method="POST">
                <input type="hidden" name="businessid" value="<?= $result['id'] ?>">
                <input type="hidden" name="userid" value="<?php echo $_SESSION['id']; ?>">
                <input type="hidden" name="bname" value="<?= $result['businessname'] ?>">
                 <input type="hidden" name="businessemail" value="<?= $result['email'] ?>">
                <input type="hidden" name="bservices" value="<?= $result['services'] ?>">
                <input type="hidden" name="bphoneno" value="<?= $result['phoneno'] ?>">
                <input type="hidden" name="baddress" value="<?= $result['address'] ?>">
                <input type="hidden" name="bdistrict" value="<?= $result['district'] ?>">
      
                    <?php echo $buttonbookmark; ?>

                      <button class="btn btn-primary btn-sm start_chat" data-touserid="'.$result['businessname'].'" data-tousername="'.$result['businessname'].'"><i class="far fa-envelope"></i><span> Message</span></button>
                </form>
              
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <h5 class="h6 card-title">Services</h5>
                <a href="#" class="badge badge-primary mr-1 my-1">Food & Drinks</a>
                <a href="#" class="badge badge-primary mr-1 my-1">Drinks</a>
                <a href="#" class="badge badge-primary mr-1 my-1">Decoration</a>
                <a href="#" class="badge badge-primary mr-1 my-1">Catering</a>
                <a href="#" class="badge badge-primary mr-1 my-1">Livecook</a>
 
            </div>
            <hr class="my-0">
            <div class="card-body">
                <h5 class="h6 card-title">About</h5>
                <ul class="list-unstyled mb-0">

                  <?php
                $id = $_GET['id'];

                $stmt = $con->prepare("SELECT * FROM bookmark WHERE business_id = '$id'");
                $stmt->execute();
                $stmt->store_result();
                $rows = $stmt->num_rows;
            ?>
      
                    <li class="mb-1">
                       <img src="https://i.pinimg.com/originals/ca/44/77/ca4477c4eeff8d0ac211fa114be21e6c.png" width="26" height="26" id="bookmarkpic">&nbsp;Bookmark by <span class="text-primary"> <?php echo $rows ?> peoples </span></li>
                    <li class="mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home feather-sm mr-1">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg> Located in <span class="text-primary"><?php echo $result['address']; ?></span></li>

                    <li class="mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin feather-sm mr-1">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg> From <span class="text-primary"><?php echo $result['district']; ?></span></li>
                </ul>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <h5 class="h6 card-title">Elsewhere</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-1">
                        <svg class="svg-inline--fa fa-globe fa-w-16 fa-fw mr-1" aria-hidden="true" data-prefix="fas" data-icon="globe" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg="" width='30px' height="30px">
                            <path fill="currentColor" d="M336.5 160C322 70.7 287.8 8 248 8s-74 62.7-88.5 152h177zM152 256c0 22.2 1.2 43.5 3.3 64h185.3c2.1-20.5 3.3-41.8 3.3-64s-1.2-43.5-3.3-64H155.3c-2.1 20.5-3.3 41.8-3.3 64zm324.7-96c-28.6-67.9-86.5-120.4-158-141.6 24.4 33.8 41.2 84.7 50 141.6h108zM177.2 18.4C105.8 39.6 47.8 92.1 19.3 160h108c8.7-56.9 25.5-107.8 49.9-141.6zM487.4 192H372.7c2.1 21 3.3 42.5 3.3 64s-1.2 43-3.3 64h114.6c5.5-20.5 8.6-41.8 8.6-64s-3.1-43.5-8.5-64zM120 256c0-21.5 1.2-43 3.3-64H8.6C3.2 212.5 0 233.8 0 256s3.2 43.5 8.6 64h114.6c-2-21-3.2-42.5-3.2-64zm39.5 96c14.5 89.3 48.7 152 88.5 152s74-62.7 88.5-152h-177zm159.3 141.6c71.4-21.2 129.4-73.7 158-141.6h-108c-8.8 56.9-25.6 107.8-50 141.6zM19.3 352c28.6 67.9 86.5 120.4 158 141.6-24.4-33.8-41.2-84.7-50-141.6h-108z"></path>
                        </svg>
                        <!-- <span class="fas fa-globe fa-fw mr-1"></span> --><a href="#">evmbrunei.live</a></li>
                    <li class="mb-1">
                        <svg class="svg-inline--fa fa-twitter fa-w-16 fa-fw mr-1" aria-hidden="true" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" width='30px' height="30px">
                            <path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                        </svg>
                        <!-- <span class="fab fa-twitter fa-fw mr-1"></span> --><a href="#">Twitter</a></li>
                    <li class="mb-1">
                        <svg class="svg-inline--fa fa-facebook fa-w-14 fa-fw mr-1" aria-hidden="true" data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" width='30px' height="30px">
                            <path fill="currentColor" d="M448 56.7v398.5c0 13.7-11.1 24.7-24.7 24.7H309.1V306.5h58.2l8.7-67.6h-67v-43.2c0-19.6 5.4-32.9 33.5-32.9h35.8v-60.5c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9h-58.4v67.6h58.4V480H24.7C11.1 480 0 468.9 0 455.3V56.7C0 43.1 11.1 32 24.7 32h398.5c13.7 0 24.8 11.1 24.8 24.7z"></path>
                        </svg>
                        <!-- <span class="fab fa-facebook fa-fw mr-1"></span> --><a href="#">Facebook</a></li>
                    <li class="mb-1">
                        <svg class="svg-inline--fa fa-instagram fa-w-14 fa-fw mr-1" aria-hidden="true" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" width='30px' height="30px">
                            <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                        </svg>
                        <!-- <span class="fab fa-instagram fa-fw mr-1"></span> --><a href="#">Instagram</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-xl-9">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Contact Info</h5>
            </div>
            <div class="card-body h-100">

                <div class="media">
                    <div class="media-body">
                        <div class="float-right text-navy"><img src="vendor/qrcodes/<?php echo $result['qrcode']; ?>" width="170" height="170" alt="QR Code"></div>
                        <strong>Email</strong> <?php echo $result['email']; ?>
                        <br>
                        <strong>Phone No</strong> <?php echo $result['phoneno']; ?>
                        <br>
                        <br>

                    </div>
                </div>
              </div>
            </div>

                
            <div class="card">
                <ul class="nav nav-tabs">
                <li class="nav-item"><a href="rating.php" class="active nav-link font-weight-bold">Ratings & Feedback</a></li>
                <li class="nav-item"><a href="itembought.php?id=<?php echo $result['id']; ?>" class="nav-link text-dark">Item Purchased</a></li>
              </ul>
            
                
           
            <div class="card-body h-100">

          <div class="rating-block">
          <h4 class="font-weight-bold">Average user rating</h4>
          <h2 class="bold padding-bottom-7"> <?php echo (getAverageRating()*100)/100 ?> <small>/ 5</small></h2>
          <div id="avgrating"></div>
          </div>
          <hr>

          <!-- Show feedback only for this vendor -->
          <?php 

          $id = $_GET['id'];

          $selectquery= "SELECT * FROM vendors where id=$id";
          $query = mysqli_query($con,$selectquery);
          $result = mysqli_fetch_assoc($query);

          $businessname = $result['businessname'];
      

          $query = "SELECT * from feedback where vendor_name = '$businessname' ";
          $stmt = $mysqli->prepare($query);
          if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows>0){
              while ($row = $result ->fetch_assoc()){
          ?>
      <div class="rating-block">
      <div class="media">
      <div class="col-sm-3">
              <img src="<?php echo $row['user_profile']; ?>" class="img-rounded" width="50px" height="50px">
              <div class="review-block-name"><a href="#"><?php echo $row['username']; ?></a></div>
              <div class="review-block-date"><?php echo $row['date']; ?></div>
            </div>
            <div class="col-sm-9">
      <div class="review-block-rate">
      <h6 class="media-heading"><div class="rateYo-<?php echo $row['id']; ?>"></div></h6>
      
        <script>
            $(function () {
            $(".rateYo-<?php echo $row['id']; ?>").rateYo({
            readOnly: true,
            rating: <?php echo $row['rating']; ?>,
            });
       
      });
        </script>

        </div>
        <div class="review-block-title"><?php echo $row['title']; ?></div>
        <div class="review-block-description"><?php echo $row['feedback']; ?></div>
        </div>
       
  
  </div>
  </div>
  <br>
         <?php
                
              }
            }
          }

          ?>

        
          </div>
        </div>
      </div>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
      <script>
          $(function () {
     
      $("#rateYo").rateYo({
        fullStar: true,
        onSet: function (rating, rateYoInstance) {
          $("#rating").val(rating);
        }
      });
      
      $("#avgrating").rateYo({
        readOnly: true,
        rating: '<?php echo getAverageRating() ?>'
        });

    });
      </script>
       
            
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