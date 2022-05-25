<?php
include('db-connector.inc.php');
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
    $query = 'select email, password from users where email = ? and password = ?';
    $stmt = $mysqli->prepare($query);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email=trim($_POST["email"]);
        $password=trim($_POST["password"]);

        if(isset($email, $password)){
            $stmt->bind_param('ss', $email, $password);
            $stmt->execute();
            $result=$stmt->get_result();
            if(mysqli_num_rows($result) == 1){
                while($row = $result->fetch_assoc()){
                    echo "email: " . $row['email'] . ", password : " . $row['password'] . "<br />";
                }    
            } else {
                echo('Wrong User / Password');
            }
                $result->free();    
        }
    }
    ?>
    <h1>Logged In</h1>
</body>
</html>