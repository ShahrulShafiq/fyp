For annieoneyouwant

<?php
include 'dbcon.php';
session_start();
$id = $_SESSION['id'];


if(isset($_POST['upload'])){

  $file = $_FILES['file'];

  $filename = $file['name'];
  $filepath = $file['tmp_name'];
  $fileerror = $file['error'];

if($fileerror == 0){

  $destfile = "images/".$filename;
  move_uploaded_file($filepath, $destfile);

  $insertquery = "UPDATE `users` SET user_profile = '$destfile' WHERE id='$id'";

  $query = mysqli_query($con, $insertquery);

  if($query){
  $updatefeedback = "UPDATE feedback SET user_profile ='$destfile' WHERE user_id= '$id'";
  $uquery = mysqli_query($con, $updatefeedback);
  ?>
  <script>
        alert( "Profile picture updated");
        window.location.href = 'profile.php';
    </script>
    <?php
  }else{
      echo "Not updated";
  }
  }
}

  

?>