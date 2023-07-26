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
    <title>Document</title>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../css/eat.css">
    <link rel="stylesheet" href="../css/about.css">
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
<div class="header">
        <div class="nav">

             
                      <div class="logo">Your Help Desk</div>
                      <ul class="nav-bar">
                      <li><a href="index.php">Home</a></li>
                      <li><a href="#">About</a></li>
                      <li><a href="#contact">Contact</a></li>
                    </ul>



                    



             



        </div>

</div>

        <div class="main">
                        <div class="name">
                            <?php

$sql = "SELECT *FROM eat where district='$id'";
            
            
$result = $conn-> query($sql);

    if(! $result) {
             die('Could not get data: ' . mysqli_error($conn));
                   }


   while($row = $result-> fetch_assoc()){ ?>
              

              <div class="sql-fetch">
                                    <div class="size">
                                    <div class="picture"><?php echo '<img src="data:../image/varsity/jpg;base64,' .  base64_encode($row['img'])  . '" />';?></div>
                                        
                                    <div class="desc">
                                    
                                          <div class="h_name"><?php echo $row['name'] ?></div>
                                          <div class="loc"><?php echo $row['location'] ?></div>
                                          <?php $_SESSION['id1']=$row['id'];
                                                 ?>
                                          <form action="menu.php?imgid=<?php echo $row['id'];?>" method="post">
                                          <button type="submit" name='menu'>Menu</button>
                                        </form>



                                    </div>
                                    
                                  
                            
                                        
                                        </div>
                                        </div>
                            


  <?php }?>



</div>
                       <div class="menu">


                          <?php
                         


?>



                       </div>
                

                   

                   

















                    <div id="book-now">

<form action="eat-process.php" method="post" autocomplete="off">
<div class="cross" id="cross">
<i class="fa-solid fa-xmark"  onclick="myFunction1()"></i>
</div>

<input type="text" name="item" placeholder="enter package name">
<input type="text" name="no" placeholder="enter no of package">
<input type="text" name="con" placeholder="enter contact">
<input type="text" name="loc" placeholder="enter location">

<button type="submit" name="payment" id="payment">Payment</a></button>
</form>

</div>




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