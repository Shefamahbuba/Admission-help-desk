<?php
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
            <form action="create-packages.php" method="post" enctype ="multipart/form-data">
               
                <label for="tour_name">Hostel/Hotel Name:</label>
                <input type="text" name="hotel_name" id="hotel_name">
                <label for="place_from">District:</label>
                <input type="text" name="District" id="District">
                <label for="place_to">Rent/night:</labeplace_tl>
                <input type="text" name="rent" id="rent">
                <label for="places_to_be">Location:</label>
                <input type="text" name="situated" id="situated">
                <label for="duration">Free Room:</label>
                <input type="text" name="free_room" id="free_room">
                <label for="duration">Email:</label>
                <input type="text" name="email" id="email">
                <label for="duration">phone:</label>
                <input type="text" name="phone" id="phone">
                
                <input type="file" name="hotel_image" id="hotel_image">
                
                <button type="submit" name ="submit">Submit</button>

            </form>
        </div>
</body>
</html>