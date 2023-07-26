<?php 

include 'connect.php';

session_start();

error_reporting(0);



if (isset($_POST['login'])) {
    $username=$_POST['user_name'];
	$email = $_POST['email'];
	
	$password =$_POST['password'];


	if($username=="mahbubashefa"&&$password=="mahbubashefa"&&$email=="abidahasina@gmail.com"){
		header("Location: hotel_admin.php");

	}
	else{
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
		
	}

	/*$sql = "SELECT * FROM admin WHERE  admin_name='$username' AND admin_email='$email' ";

    
	$result = mysqli_query($conn, $sql);
    if(!$result){
        die(mysqli_error($conn));
    }
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$password = $row['password'];
		header("Location: admin-index.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}*/
}

?>