<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style_register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    if(isset($_POST["submit"])){
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeat_password = $_POST["repeat_password"];
    
        $errors = array();
    
        if(empty($fullname) || empty($email) || empty($password) || empty($repeat_password)){
            array_push($errors, "All fields are required");
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($errors, "Email is not valid");
        }
        if(strlen($password) < 8){
            array_push($errors, "Password must be 8 characters long");
        }
        if($password !== $repeat_password){
            array_push($errors, "Passwords do not match");
        }
    
        require_once "database.php";
        $sql = "SELECT * FROM register WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) > 0){
                array_push($errors, "Email already exists");
            }
        } else {
            die("Something went wrong");
        }
    
        if(count($errors) > 0){
            foreach($errors as $error){
                echo "<div class='alert alert-danger'>$error</div>";
            }
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
            $sql = "INSERT INTO register(name, email, password) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if(mysqli_stmt_prepare($stmt, $sql)){
                mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $hashed_password);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Registered successfully</div>";
                // Redirect to index.php after successful registration
                header("Location: index.php");
                exit();
            } else {
                die("Something went wrong");
            }
        }
    }
    ?>
    
    <form action="registration.php" method="post" class="formcon">
        <div class="form_group">
            <input type="text" class="form-control" name="fullname" placeholder="fullname">
        </div>
        <div class="form_group">
            <input type="email" class="form-control" name="email" placeholder="email">
        </div>
        <div class="form_group">
            <input type="password" class="form-control" name="password" placeholder="password">
        </div>
        <div class="form_group">
            <input type="text" class="form-control" name="repeat_password" placeholder="Repeat password">
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="Register" name="submit">
        </div>
    </form>
</body>
</html>