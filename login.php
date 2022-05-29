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
    $query = 'select email, password from users where email = ?';
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
                    $_SESSION["email"] = $email;
                } else {
                    echo('wrong password');
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