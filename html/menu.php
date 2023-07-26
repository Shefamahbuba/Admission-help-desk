<?php
session_start();
$imgid=strval($_GET['imgid']);
$u_name=$_SESSION['user_name'];
 $u_email=$_SESSION['login'];


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

    
    
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/eat.css">
    <link rel="stylesheet" href="../css/about.css">
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
     <div class="menu">
     <?php



                  



                      $sql = "SELECT *FROM menu where id='$imgid'";
            
            
                         $result = $conn-> query($sql);
            
                             if(! $result) {
                                      die('Could not get data: ' . mysqli_error($conn));
                                            }
            
                       
                            while($row = $result-> fetch_assoc()){ 

                               ?>

                                <div class="sql-fetch">
                                    <div class="size">
                                    <div class="picture"><?php echo '<img src="data:../image/varsity/jpg;base64,' .  base64_encode($row['img'])  . '" />';?></div>
                                        
                                    <div class="desc">
                                    
                                          <div class="item"><?php echo $row['item'] ?></div>
                                          <div class="price"><?php echo $row['price'] ?></div>
                                          <form action="eat-process.php?id=<?php echo $imgid?>" method="post">
                                           <div class="cart-action">
                                            <input type="text" placeholder="enter your location" name="location">
                                            <input type="text" placeholder="enter your contact" name="contact">
                                            <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                                           <button type="submit" name="order">Order</button>
                                          </form>



                                             </div>
                                    
                                  
                            
                                        
                                        </div>
                                        </div>
                            
                            </div>
                                        
                                <?php }
                        ?>
     </div>

</body>
</html>
