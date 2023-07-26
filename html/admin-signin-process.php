<?php

include 'connect.php';
error_reporting(0);
session_start();



if(isset($_POST['signin'])){
    $username =$_POST['user_name'];
    $email =$_POST['email'];
    $password = md5($_POST['password']);
    $rpassword = md5($_POST['rpassword']);


    if($password == $rpassword){
        $sql = "INSERT into admin (admin_name,admin_email,password)
                 values ('$username','$email','$password')";


         $result = mysqli_query($conn,$sql);
         if(!$result){
            echo "<script>alert('something went wrong')</script>";

         }else{
            echo "<script>alert('User registration is successful.')</script>";
                $username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['rpassword'] = "";
            header("Location:index.php");
         }

    }
    else{
        echo "<script>alert('password not matched.')</script>";

    }
}

?>