<?php
include('db-connector.inc.php');
session_start();
?>
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
    $email = '';
    $password = '';
<<<<<<< Updated upstream
    $query = 'select email, password from users where email = ?';
=======



    $query = 'select email, uid, firstname, password from user where email = ?';
>>>>>>> Stashed changes
    $stmt = $mysqli->prepare($query);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email=trim($_POST["email"]);
        $password=trim($_POST["password"]);

        if(isset($email, $password)){
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result=$stmt->get_result();

            while($row = $result->fetch_assoc()){
                if(password_verify($password, $row['password'])){
                    echo "email: " . $row['email'] . ", password : " . $row['password'] . "<br />";
<<<<<<< Updated upstream
                    $_SESSION["email"] = $email;
                    $_SESSION["loggedIn"] = true;
                } else {
                    echo('wrong password');
=======

                    $cart_stmt->bind_param('i', $row['uid']);
                    $cart_stmt->execute();
                    $cart_result=$cart_stmt->get_result();
                    while($cart_row = $cart_result->fetch_assoc()){
                        $_SESSION['cartID'] = $cart_row['cid'];
                    }

                    $_SESSION["email"] = $row['email'];
                    $_SESSION["loggedIn"] = true;
                    $_SESSION["firstname"] = $row['firstname'];
                    echo($_SESSION['cartID']);



>>>>>>> Stashed changes
                }
            }    
            $result->free();    
        }
    }
    ?>
    <h1>Logged In</h1>
    <a href="index.php">Home</a>
</body>
</html>