<?php
session_start();
include 'dbcon.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
    *
* ==========================================
* FOR DEMO PURPOSE
* ==========================================
*
*/
body {
    background: -webkit-linear-gradient(to right, #e8cbc0, #636fa4);
    background: linear-gradient(to right, #e8cbc0, #636fa4);
    min-height: 100vh;
}

.backgroundcolor{
    background:#F0F8FF;
}

/*statistic*/ 
.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}
.circle-tile-heading {
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    color: #FFFFFF;
    height: 80px;
    margin: 0 auto -40px;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    width: 80px;
}
.circle-tile-heading .fa {
    line-height: 80px;
}
.circle-tile-content {
    padding-top: 50px;
}
.circle-tile-number {
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
    padding: 5px 0 15px;
}
.circle-tile-description {
    text-transform: uppercase;
}
.circle-tile-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.5);
    display: block;
    padding: 5px;
    transition: all 0.3s ease-in-out 0s;
}
.circle-tile-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
}
.circle-tile-heading.dark-blue:hover {
    background-color: #2E4154;
}
.circle-tile-heading.green:hover {
    background-color: #138F77;
}
.circle-tile-heading.orange:hover {
    background-color: #DA8C10;
}
.circle-tile-heading.blue:hover {
    background-color: #2473A6;
}
.circle-tile-heading.red:hover {
    background-color: #CF4435;
}
.circle-tile-heading.purple:hover {
    background-color: #7F3D9B;
}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
}

.dark-blue {
    background-color: #34495E;
}
.green {
    background-color: #16A085;
}
.blue {
    background-color: #2980B9;
}
.orange {
    background-color: #F39C12;
}
.red {
    background-color: #E74C3C;
}
.purple {
    background-color: #8E44AD;
}
.dark-gray {
    background-color: #7F8C8D;
}
.gray {
    background-color: #95A5A6;
}
.light-gray {
    background-color: #BDC3C7;
}
.yellow {
    background-color: #F1C40F;
}
.text-dark-blue {
    color: #34495E;
}
.text-green {
    color: #16A085;
}
.text-blue {
    color: #2980B9;
}
.text-orange {
    color: #F39C12;
}
.text-red {
    color: #E74C3C;
}
.text-purple {
    color: #8E44AD;
}
.text-faded {
    color: rgba(255, 255, 255, 0.7);
}



/*vendor card*/
.social-link {
    width: 30px;
    height: 30px;
    border: 1px solid #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #666;
    border-radius: 50%;
    transition: all 0.3s;
    font-size: 0.9rem;
}

.social-link:hover, .social-link:focus {
    background: #ddd;
    text-decoration: none;
    color: #555;
}

/*Dropdown button*/

.dropbtn {
  background-color: inherit;
  color: grey;
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

}   
</style>
    <title>Vendor List</title>

     <script src="https://kit.fontawesome.com/1da4f880a9.js" crossorigin="anonymous"></script>
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
        <a class="nav-link active" href="addtocart/index.php">Product</a>
      </li>
      <li>
      <div class="dropdown">
      <button class="dropbtn"><i class="fas fa-user"></i></button>
      <div class="dropdown-content" style="right:0">
        <a href="editprofile.php">Profile Settings</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>
    </li>
    </ul>
  </div>
</nav>
<!-- navbar ends -->

<div class="backgroundcolor">
<div class="main-container">
<br>
<div class="row">
<!-- For demo purpose -->
<div class="container py-5">
    <div class="row text-center">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-6">Vendors</h1>
            <p class="lead mb-0">Bring more exposure to your business</p>
            <p class="lead">Join us by<a href="https://evmbrunei.live/vendor/registervendor.php">
                <u>clicking here</u></a>
            </p>
        </div>
    </div>
</div><!-- End -->


<!-- statistic start -->
<div class="container bootstrap snippets bootdey">
  <div class="row">
    <!-- box 1 start -->
            <?php

                $stmt = $con->prepare("SELECT * FROM vendors");
                $stmt->execute();
                $stmt->store_result();
                $total_vendors = $stmt->num_rows;
            ?>
    <div class="col-lg-4 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-store fa-fw fa-2x"></i></div></a>
        <div class="circle-tile-content blue">
          <div class="circle-tile-description text-faded"> Vendors</div>
          <div class="circle-tile-number text-faded "><?php echo $total_vendors ?></div>
          <a class="circle-tile-footer" href="#">More Info <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div>
     <!-- box 1 end -->

    <!-- box 2 start -->
    <?php

        $selectamount="SELECT SUM(amount) AS totalsales FROM sales";
        $amount = mysqli_query($con,$selectamount);
        $totalsales = mysqli_fetch_assoc($amount);
        $sales = $totalsales['totalsales'];
    ?>
    <div class="col-lg-4 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading red"><i class="fa fa-money-bill fa-fw fa-2x"></i></div></a>
        <div class="circle-tile-content red">
          <div class="circle-tile-description text-faded"> Total Sales </div>
          <div class="circle-tile-number text-faded ">$<?php echo $sales ?></div>
          <a class="circle-tile-footer" href="#">More Info <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div> 
    <!-- box 2 end -->

        <!-- box 3 start -->
                <?php

                $stmt3 = $con->prepare("SELECT * FROM product");
                $stmt3->execute();
                $stmt3->store_result();
                $total_product = $stmt3->num_rows;
            ?>
    <div class="col-lg-4 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading green"><i class="fa fa-shopping-bag fa-fw fa-2x"></i></div></a>
        <div class="circle-tile-content green">
          <div class="circle-tile-description text-faded"> Services Available</div>
          <div class="circle-tile-number text-faded "><?php echo $total_product ?></div>
          <a class="circle-tile-footer" href="#">More Info <i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div> 
    <!-- box 3 end -->

  </div> 
</div>  
<br>
 <!-- statistic end  -->

<div class="container">
    <br>
    <div class="row text-center">

  <?php

  include 'dbcon.php';

  $selectquery= "SELECT * FROM vendors";

  $query = mysqli_query($con,$selectquery);

  while($result = mysqli_fetch_assoc($query)){


  ?>
        <!-- Team item -->
        <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://icon-library.com/images/shop-icon/shop-icon-3.jpg" alt="" width="100" class="img-fluid mb-3 ">
                <h5 class="mb-0"><?php echo $result['businessname'] ?></h5><span class="small text-uppercase text-muted"><?php echo $result['services'] ?></span>
                <ul class="social mb-0 list-inline mt-3">
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                <br>
                   <button type="button" class="btn btn-info btn-sm start_chat" data-touserid="B'.$row['id'].'" data-tousername="'.$row['businessname'].'">Message</button>
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
          <a href="#!">MDBootstrap</a>
        </p>
        <p>
          <a href="#!">MDWordPress</a>
        </p>
        <p>
          <a href="#!">BrandFlow</a>
        </p>
        <p>
          <a href="#!">Bootstrap Angular</a>
        </p>
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
        <p>
          <a href="#!">Your Account</a>
        </p>
        <p>
          <a href="#!">Become an Affiliate</a>
        </p>
        <p>
          <a href="#!">Shipping Rates</a>
        </p>
        <p>
          <a href="#!">Help</a>
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
          <a href="https://mdbootstrap.com/">
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
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-google-plus-g"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
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

