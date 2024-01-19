<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style_register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
     include "database.php";
        session_start();
        if(isset($_POST["login"])){
            $email =mysqli_real_escape_string($conn,$_POST["email"]) ;
            $password = $_POST["password"];
            include "database.php";
            $sql="SELECT * FROM register WHERE email='{$email}' &&  password='{$password}'";
            $result = mysqli_query($conn, $sql) or die("query failed");
            $user = mysqli_fetch_assoc($result);
            if($user){
                // User found, verify the password
                $hashedPassword = $user['password']; // Retrieving hashed password from database
                if(password_verify($password, $hashedPassword)){
                    // Password matches, redirect to dashboard
                    header("Location: index.php");
                    exit(); 
                } else {
                    echo "<div class='alert alert-danger'>Password doesn't match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email doesn't exist</div>";
            }
        }
    ?>

    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="form_group">
            <input type="email" class="form-control" name="email" placeholder="Enter email">
        </div>
        <div class="form_group">
            <input type="password" class="form-control" name="password" placeholder="Enter password">
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="login" name="login">
        </div><br><p>don't have an account! <a href="registration.php">signup</a></p>
        </form>
    </div>
</body>
</html>