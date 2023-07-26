<?php 

include 'connection.php';

session_start();

error_reporting(0);



if (isset($_POST['submit'])) {
   
    $h_name = $_POST['hotel_name'];
    $id= $_POST['District'];
    $rent = $_POST['rent'];
    $loc= $_POST['situated'];
    $free_r= $_POST['free_room'];
    $email = $_POST['email'];
    $phone=$_POST['phone'];
    $target_file = basename($_FILES["hotel_image"]["name"]); 
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Convert to base64 
    $image_base64 = base64_encode(file_get_contents($_FILES['hotel_image']['tmp_name']) );
    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;


    
    

	$sql = "INSERT into hotels (District,hotel_name,hotel_image,rent,situated,free_room,email,
    phone) values ('$id','$h_name','$image_base64','$rent','$loc','$free_r','$email','$phone') ";
   

    
	$result = mysqli_query($conn, $sql);
    
    if(!$result){
        die(mysqli_error($conn));
    }
	else{
        echo "<script>alert('Package created succesfully')</script>";
        header("Location:hotel_admin.php");
    }
}

?>