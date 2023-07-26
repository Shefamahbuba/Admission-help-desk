<?php 

include 'connection.php';

session_start();

error_reporting(0);



if (isset($_POST['login'])) {
	
    $username=$_POST['user_name'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$_SESSION['login']=$_POST['email'];
	$_SESSION['user_name']=$_POST['user_name'];

	$sql = "SELECT * FROM user WHERE  user_name='$username' AND email='$email' ";

    
	$result = mysqli_query($conn, $sql);
    if(!$result){
        die(mysqli_error($conn));
    }
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$password = $row['password'];
		header("Location: index1.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
		header("Location: index.php");
	}
}

?>