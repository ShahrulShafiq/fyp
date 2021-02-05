<?php
include 'dbcon.php';
session_start();
$id = $_SESSION['id'];
if(isset($_POST['update'])){
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phoneno = mysqli_real_escape_string($con, $_POST['phoneno']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    
    $updatequery = "UPDATE users SET fullname='$fullname', username='$username', phoneno='$phoneno', address='$address' WHERE id = '$id'";
    $uquery = mysqli_query($con, $updatequery);
    
    if ($uquery) {
    $updatefeedbackusername = "UPDATE feedback SET username = '$username' WHERE user_id = '$id'";
    $updatefeedback = mysqli_query($con, $updatefeedbackusername);
    ?>   
        <script type="text/javascript"> 
        alert ("Update successful");
        window.location.href = 'profile.php';
        </script>

    <?php
    }else{
       ?>   
        <script type="text/javascript"> 
        alert ("Update Fail");
        window.location.href = 'profile.php';
        </script>
    <?php 
    }
  }

        ?>

