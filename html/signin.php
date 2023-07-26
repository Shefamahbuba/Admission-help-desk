<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin -form</title>
    <link rel="stylesheet" href="../css/signin.css">
</head>
<body>
    <div class="signin-form">
        <div class="sub-header">
            <h1>sign In</h1>
        </div>
        <div class="form">
            <form action="signin-process.php" method="post">
                <div class="name">
                    <label for="user_name">User Name</label>
                    <input type="text" name="user_name" id="user_name" required>
                </div>
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="rpassword">
                    <label for="rpassword">Repeat-Password</label>
                    <input type="password" name="rpassword" id="rpassword" required>
                </div>
                
                <div class="button">
                    <button type="submit" name="signin">Sign In</button>
                </div>

            </form>
        </div>
    </div>
    
</body>
</html>