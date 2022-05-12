<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $error = '';
        $fname = $lname = $email = $password = $rpassword = '';

        if($_SERVER['REQUEST_METHOD'] == "POST"){
                $email=trim($_POST["email"]);
                $password=trim($_POST["password"]);
                $rpassword=trim($_POST["rpassword"]);

                if(isset($email, $password, $rpassword)){
                    if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,}$/ix", $email)){
                        $error_email = "E-Mail does not match requirements";
                        echo $error_email;
                    } else {
                        echo $email;
                    }
                    if(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $password)){
                        $error_password = "Password does not match requirements";
                        echo $error_password;
                    }
                    if($password === $rpassword){
                        
                    }
                }
            }
    ?>

    <form action="" method="post">
        <label for="fname">Firstname</label>
            <input type="text" id="fname" name="fname" value="<?php echo $fname ?>">
        <label for="lname">Lastname</label>
            <input type="text" id="lname" name="lname"  value="<?php echo $lname ?>">
        <label for="email">E-Mail-Address</label>
            <input type="email" id="email" name="email" pattern="([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,}$" value="<?php echo $email ?>" required>
        <label for="password">Password</label>
            <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
        <label for="rpassword">repeat Password</label>
        <input type="password" id="rpassword" name="rpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
            <input type="submit" value="Submit" id="submit">
    </form>

    <p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>


</body>
</html>