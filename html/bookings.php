<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bookings.css">
</head>
<body>
   


<?php 

include 'connection.php';

session_start();
$u_name=$_SESSION['user_name'];
 $u_email=$_SESSION['login'];
error_reporting(0);



if (isset($_POST['submit'])) {
   
    $_SESSION['start'] = $_POST['start'];
    $start=$_SESSION['start'];

    $_SESSION['des']= $_POST['destination'];
    $des=$_SESSION['des'];
    $_SESSION['t_date'] = $_POST['t_date'];
    $_SESSION['contact']=$_POST['contact'];
    $_SESSION['seat']=$_POST['seat'];
   

    
    


         $sql = "SELECT *FROM transport where start_ad = '$start' And end_ad = '$des'";

         
          
         $result = $conn-> query($sql);
         
         if(! $result) {
           
            die('Could not get data: ' . mysqli_error($conn));
         }
        
       while($row = $result-> fetch_assoc()){

         ?>

             
                 
                 <div class="proper-des"><div class="bus_name"><h2><?php echo $row['bus_name']?></h2></div>
             
                 <div class="bus_name"><h3>Start From:</h3><?php echo $row['start_ad']?></div>
                 <div class="bus_name"><h3>Destination:</h3><?php echo $row['end_ad']?></div>
                 <div class="bus_name"><h3>Start Time:</h3><?php echo $row['time']?></div>
                 <div class="bus_name"><h3>Fare:</h3><?php echo $row['fare']?></div>
                 <?php
               $_SESSION['fare']=$row['fare'];
               $_SESSION['name']=$row['bus_name'];

                 ?>
                 <div class="bus"><a href="transport-booking.php">Book Now</a>
               <a href="index1.php">Return to home</a></div>
              
                 </div>
         
      <?php }
}
      ?>





</body>
</html>