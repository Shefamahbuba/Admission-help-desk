<?php
session_start();
$u_name=$_SESSION['user_name'];
 $u_email=$_SESSION['login'];
$id=$_GET['id'];
  require 'connection.php';

  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admission-desk</title>
    <link rel="stylesheet" href="../css/hotels.css">

  

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
</head>
<body>
    <div class="main">
        <div class="header">
            <div class="nav">
                <div class="logo">Your Help Desk</div>
                <ul class="nav-bar">
                   <li><a href="index.php">Home</a></li>
                   <li class="search" autocomplete="off">
                        <form action="" method="post">
                        <input type="text" name="searchFor" id="search" placeholder="filter by rent">
                        <button type="submit" name="search" value="filter">Filter</button>

                        </form>
                        
                    </li>
                 
                  
                </ul>
            </div>
        </div>
       
























         <div class="body">
                     


            
            <?php


if (isset($_POST['search'])){

    
    $code=$_POST['searchFor'];


    
    $sql = "SELECT *FROM hotels Where District='$id' AND rent<=$code";
         
          
    $result = $conn-> query($sql);
    
    if(! $result) {
       die('Could not get data: ' . mysqli_error($conn));
    }
   
  while($row = $result-> fetch_assoc()){ ?>

        <div class="sql-fetch">
               <div class="size">
        
                    <div class="picture"><?php echo '<img src="data:../image/varsity/jpg;base64,' .  base64_encode($row['hotel_image'])  . '" />';?>
                    </div>
         
                    <div class="proper-des"><h3 class="hotel_name"><?php echo $row['hotel_name']?></h3>
                    <div class="rent"><?php echo $row['rent']?></div>
                    <?php
                                  $_SESSION['price']=$row['rent'];
                                  $price=$_SESSION['price'];
                                  $_SESSION['hotel']=$row['hotel_name'];
                                  $hotel=$_SESSION['hotel'];
                                  $_SESSION['free']=$row['free_room'];
                                  $free=$_SESSION['free'];

                      ?>
                    <div class="location"><?php echo $row['situated']?></div>
        
                   
                      <div class="book"><a href="#book-now"  onclick="myFunction()">Book</a></div>
                      <div class="contact">
                         <a href = "mailto: <?php echo $row['email']?>"><i class="fa-solid fa-envelope"></i></a>
                          <a href="tel:<?php echo $row['phone']?>"><i class="fa-solid fa-phone"></i></a>

                      </div>
         
            </div>
         
             
             
         </div>
   </div>
            
            
    
 <?php }




}else{








         $sql = "SELECT *FROM hotels Where District='$id'";
         
          
         $result = $conn-> query($sql);
         
         if(! $result) {
            die('Could not get data: ' . mysqli_error($conn));
         }
        
       while($row = $result-> fetch_assoc()){ ?>

             <div class="sql-fetch">
                    <div class="size">
             
                         <div class="picture"><?php echo '<img src="data:../image/varsity/jpg;base64,' .  base64_encode($row['hotel_image'])  . '" />';?>
                         </div>
              
                         <div class="proper-des"><h3 class="hotel_name"><?php echo $row['hotel_name']?></h3>
                         <div class="rent"><?php echo $row['rent']?></div>
                         <?php
                                       $_SESSION['price']=$row['rent'];
                                       $price=$_SESSION['price'];
                                       $_SESSION['hotel']=$row['hotel_name'];
                                       $hotel=$_SESSION['hotel'];
                                       $_SESSION['free']=$row['free_room'];
                                       $free=$_SESSION['free'];

                           ?>
                         <div class="location"><?php echo $row['situated']?></div>
             
                        
                           <div class="book"><a href="#book-now"  onclick="myFunction()">Book</a></div>
                           <div class="contact">
                              <a href = "mailto: <?php echo $row['email']?>"><i class="fa-solid fa-envelope"></i></a>
                               <a href="tel:<?php echo $row['phone']?>"><i class="fa-solid fa-phone"></i></a>

                           </div>
              
                 </div>
              
                  
                  
              </div>
        </div>
                 
                 
         
      <?php }}
      ?>

       
       
       </div>

    </div>





 <div id="book-now">

<form action="booking-process.php?free=<?php echo $free?>" method="post" autocomplete="off">
<div class="cross" id="cross">
<i class="fa-solid fa-xmark"  onclick="myFunction1()"></i>
</div>

<input type="tel" placeholder="enter contact number"name="contact" id="contact">

<input type="text" placeholder="check_in" name="check_in" onfocus="(this.type='date')">
<input type="text" placeholder="check_out" name="check_out" onfocus="(this.type='date')">
<input type="number" name="no_of_rooms" id="no_of_rooms"placeholder="enter no of rooms">
<button type="submit" name="payment" id="payment">Payment</a></button>
</form>

</div>















</body>
<script>

    function myFunction(){
       if(document.getElementById("book-now").style.visibility = "hidden") {
        document.getElementById("book-now").style.visibility = "visible";
       }else{
        document.getElementById("book-now").style.visibility = "hidden"
       }

    }
    function myFunction1(){
       
        document.getElementById("book-now").style.visibility = "hidden"
      

    }
    
</script>





</html>