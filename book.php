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

$mysqli = new mysqli('localhost', 'root', '', 'evm');
if(isset($_GET['date'])){
    $date = $_GET['date'];
    $stmt = $mysqli->prepare("select * from bookings where date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['timeslot'];
            }
            
            $stmt->close();
        }
    }
}

if(isset($_POST['submit'])){
    $userid =$_POST['userid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $timeslot = $_POST['timeslot'];
    $reason = $_POST['reason'];
        $stmt = $mysqli->prepare("select * from bookings where date = ? AND timeslot = ?");
    $stmt->bind_param('ss', $date, $timeslot);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-danger'>Already Booked</div>";
        }else{

        // Check sudah order or inda
        $searchorder = "SELECT * FROM orders WHERE user_id = $userid AND status = 'Confirmed'";
        $orderquery = mysqli_query($mysqli,$searchorder);
        $ordercount = mysqli_num_rows($orderquery);

        if($ordercount<1){
            $msg = "<div class='alert alert-danger text-center'><b>You don't have order currently to book slot</b></div>";
        }else{

        $searchbooking = "SELECT * FROM bookings WHERE user_id = '$userid' AND status = 'Pending'";
        $bookingquery = mysqli_query($mysqli,$searchbooking);
        $bookingcount = mysqli_num_rows($bookingquery);

        if($bookingcount>0){
        $msg = "<div class='alert alert-danger text-center'><b>You can't book if there is pending booking</b></div>";
        }else{
        $stmt = $mysqli->prepare("INSERT INTO `bookings` (`user_id`, `name`, `timeslot`, `email`, `reason`, `date`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param('isssss',$userid, $name, $timeslot, $email, $reason, $date);
        $stmt->execute();
        $bookings[]=$timeslot;
        
        $bookingid = mysqli_insert_id($mysqli);
        ?>
        <script>
        alert( "Booking Succesful, your booking ID is <?php echo $bookingid; ?>");
        window.location.href = 'bookingstatus.php';
        </script>
        <?php
        $stmt->close();
        $mysqli->close();
    }
        }
    }
  } 
}

$duration = 75; //75 mins duration for each slot
$cleanup = 15; //so ada break 20 minutes for each slot
$start = "08:15"; //slot start 8am
$end = "17:00"; // slot habis 17.00

function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();

    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod -> add($interval);
        if($endPeriod>$end){
            break;
        }

        $slots[] = $intStart->format("H:iA")."-".$endPeriod->format("H:iA");
    
    }

        return $slots;

}


?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Booking</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
       <style type="text/css">
    body{
        background-color:  #F0F8FF;
    }
    </style>
  </head>

  <body>
    <br>
    <div class="container">
        <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1><hr>
        <br>
        <div class="row">
        <div class="col-md-12">
            <?php echo isset($msg)?$msg:"";?>
            <?php $timeslots = timeslots($duration, $cleanup, $start, $end); 
            foreach ($timeslots as $ts) {
            ?>
            <div class="col-md-2">
                <div class="form-group">
                  <?php if(in_array($ts,$bookings)){?>
                  <button class="btn btn-danger"><?php echo $ts; ?></button> 
                  <?php }else{ ?>
                  <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button> 
                  <?php }?>
                
            </div>
        </div>
            <?php } ?>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content --> 
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Booking:<span id="slot"></span></h4>
    </div>
    <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                <div class="form-group">
                <label for="">Timeslot</label>
                <input required type="hidden" readonly name="userid" class="form-control" value="<?php echo $_SESSION['id']; ?>">

                <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                </div>
                <input required type="hidden" value="<?php echo $_SESSION['fullname']; ?>" name="name" class="form-control">
                <input required type="hidden"  value="<?php echo $_SESSION['email']; ?>" name="email" class="form-control">
                <div class="form-group">
                <label for="">Reason for booking</label><br>
                <textarea rows="4" cols="76" name="reason"></textarea>
                </div>

                <div class="form-group pull-right">
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </div>

            </form>
    </div>
    </div>
    </div>
    </div>
</div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script>
        $(".book").click(function(){
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");
        })
    </script>
  </body>

</html>
