<?php


if (isset($_POST['search'])){

  
  $code=$_POST['searchFor'];


  
  $sql = "SELECT *FROM university where search_code='$code'";
         
          
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



header("Location:../html/index.php");











}else{?>






<div class="middle">

<?php




           
           $sql = "SELECT *FROM university";
         
          
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
                    
       <?php }}?>


</div>





















































 
        