<?php
session_start();

include 'dbcon.php';



if(isset($_GET['token'])){

  $token = $_GET['token'];

  $tokensearch = "SELECT * FROM users WHERE token = '$token' AND status = 'Inactive' ";
  $tokenquery = mysqli_query($con,$tokensearch);
  $tokencount = mysqli_num_rows($tokenquery);

  if($tokencount<1){
   ?>
        <script>
        alert("Invalid link");
        window.location.href = 'login.php';
       </script>
    <?php 
  }else{

  $updatequery = "UPDATE users set status = 'Active' WHERE token= '$token' ";

  $query = mysqli_query($con,$updatequery);

  if($query){
   ?>
        <script>
        alert("Account updated successfully");
        window.location.href = 'login.php';
        </script>
        <?php
  }else{
    
    ?>
        <script>
        alert("Account not updated");
        window.location.href = 'login.php';
       </script>
    <?php
  }
}
}
?>