<?php
session_start();
$u_name=$_SESSION['user_name'];
$u_email=$_SESSION['login'];


if(isset($u_name)){

}
else{
   header("location:../php/index.php");
}
require 'connection.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/hotel_admin.css">
</head>
<body>
<div class="create-packages" id="create-packages" >
            <form action="bookings.php" method="post" enctype ="multipart/form-data">
               
            
                <input type="text" name="start" id="start" placeholder="start address">
               
                <input type="text" name="destination" id="destination" placeholder="destination">
                
                <input type="date" name="t_date" id="t_date" placeholder="start date" onfocus="(this.type='date')">
                
                <input type="text" name="contact" id="contact"  placeholder="your phone number">
                <input type="text" name="seat" id="seat"  placeholder="No of seats">
                
                <button type="submit" name ="submit">Submit</button>

            </form>
        </div>
</body>
</html>