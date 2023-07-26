    <?php
   session_unset();

   // destroy the session
   session_destroy();
    require 'connection.php';

    ?>



    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>admission-desk</title>
        <link rel="stylesheet" href="../css/about.css">
        <link rel="stylesheet" href="../css/index.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="main">



       
                
            
            <div class="nav">
                    <div class="logo">Your Help Desk</div>
                           <ul class="nav-bar">
                    <li><a href="#index.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                           </ul>



                    <div class="log-in">
                    <ul>
                    <li><a href="login.php">User</a>
                    </li>
                    <li><a href="login-admin.php">Admin</a>
                    </li>



                    <li class="search" autocomplete="off">
                        <form action="" method="post">
                        <input type="text" name="searchFor" id="search" placeholder="RUET">
                        <button type="submit" name="search" value="search">search</button>

                        </form>
                        
                    </li>
</ul>
                




                
            </div>


            
</div>












            <div class="body">
                

                <?php
            
    if (isset($_POST['search'])){

    
    $code=$_POST['searchFor'];


    
    $sql = "SELECT *FROM university where search_code like '$code'";
            
            
    $result = $conn-> query($sql);
    
    if(! $result) {
        die('Could not get data: ' . mysqli_error($conn));
    }
    
    while($row = $result-> fetch_assoc()){ ?>

    <div class="sql-fetch">
        <div class="size">
        <div class="picture"><?php echo '<img src="data:../image/varsity/jpg;base64,' .  base64_encode($row['image'])  . '" />';?></div>
            
        <div class="desc"><div class="image_name"><?php echo $row['image_name']?></div>
        <div class="more-link"><a href="more_info.php?imgid=<?php echo $row['image_name'];?>">More Info</a></div>
        <?php
        $_SESSION['district']=$row['district'];
        ?>
        </div>

            
            </div>
            </div>

             
            
    <?php }















    }else{
        include 'about.php';
    }?>
            </div>

        





        <div id="contact">
                    <ul>
                        <li>
                            Call us <a href="tel:+8801780439272"> <i class="fas fa-phone"></i></a>
                        </li>
                        <li> Email us<a href="mailto:abidahasina@gmail.com"> <i class="fas fa-envelope"></i></a></li>
                    </ul>
                    <div class="social-media">
                        <ul>
                            <li>
                                    <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-square"></i></a>
                            </li>
                            <li>
                            <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                            <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                                
                            </li>
                        </ul>
                    </div>
    </body>
    <script>
        document.getElementById("log-in-link").addEventListener('click',function(){
        document.querySelector(".log-in").style.display="flex";
        })
    </script>
    </html>