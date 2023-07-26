<?php
 session_start();
 $i_name=$_GET['imgid'];
 $_SESSION['p_name']=$_GET['imgid'];
 $u_name=$_SESSION['user_name'];
 $u_email=$_SESSION['login'];
 
 require 'connection.php';
if(isset($u_name)){

}
else{
    header("location:../html/index.php");
}
  ?>	


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admission-desk</title>
    <link rel="stylesheet" href="../css/more_info.css">
    
</head>
<body>
    <div class="main">
        <div class="header">
            <div class="nav">
                <div class="logo">Your Help Desk</div>
                <ul class="nav-bar">
                   <li><a href="index1.php">Home</a></li>
                   <?php
           
           $sql = "SELECT *FROM university where image_name='$i_name'";
         
          
           $result = $conn-> query($sql);
           
           if(! $result) {
              die('Could not get data: ' . mysqli_error($conn));
           }
          
         while($row = $result-> fetch_assoc()){ 

            
                    $id=$row['district'];
                    
        }?>
        




                   <li><a href="hotels.php?id=<?php echo $id;?>">Place to Stay</a></li>
                   <li><a href="transport.php?id=<?php echo $id;?>">Transportation</a></li>
                   <li><a href="eat.php?id=<?php echo $id;?>">What to eat</a></li>
                   <li><a href="#map">Map</a></li>
                   <li><a href="#notices">Notices</a></li>
                </ul>
            </div>
        </div>
         <div class="body">
            <?php
         $sql = "SELECT *FROM uni_info Where image_name='$i_name'";
         
          
         $result = $conn-> query($sql);
         
         if(! $result) {
            die('Could not get data: ' . mysqli_error($conn));
         }
        
       while($row = $result-> fetch_assoc()){ ?>

             <div class="sql-fetch">
             <div class="size">
             
             <div class="picture"><?php echo '<img src="data:../image/varsity/jpg;base64,' .  base64_encode($row['image_1'])  . '" />';?>
             <?php echo '<img src="data:../image/varsity/jpg;base64,' .  base64_encode($row['image_2'])  . '" />';?>
             <?php echo '<img src="data:../image/varsity/jpg;base64,' .  base64_encode($row['image_3'])  . '" />';?>
             <?php echo '<img src="data:../image/varsity/jpg;base64,' .  base64_encode($row['image_4'])  . '" />';?>
            
            
            </div>
              
             
              
                  
                  
                 </div>
                 </div>
                 
                 <div class="proper-des"><div class="image_name"><?php echo $row['image_name']?></div>
              <div class="about"><h4>About</h4><div class="about-des"><?php echo $row['about']?></div>
              <?php
              $link = $row['web_link'];
               ?>
              <div class="link"><a href='<?php echo $link ?>'>click here to know more</a></div></div>
              <div class="map"id="map"><h4>Map</h4><?php echo '<img src="data:../image/varsity/jpg;base64,' .  base64_encode($row['map'])  . '" />';?></div>
              <div class="notices"id="notices"><h4>Notice</h4><div class="about-des"><?php echo $row['notices']?></div></div>
         
                 </div>
         
      <?php }?>
         </div>

    </div>











</body>
</html>