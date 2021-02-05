<?php
include 'dbcon.php';
session_start();
$userid = $_SESSION['id'];

if (isset($_POST['deletebookmark'])) {
      $vendorid = $_POST['vendorid'];
      $stmt = $con->prepare("DELETE FROM bookmark WHERE user_id= $userid AND business_id = $vendorid");
      $stmt->execute();
      $msg = "<div class='alert alert-danger'><b>Vendor removed from your bookmark</b></div>";
      header('location:bookmarklist.php');
      
     
    
  }

  ?>