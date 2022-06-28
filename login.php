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
    <link rel="stylesheet" href="files/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <?php
    $error = '';
    $email = '';
    $password = '';

    $errors = array();
    $query = 'select email, uid, password, firstname, lastname from user where email = ?';
    $stmt = $mysqli->prepare($query);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_regenerate_id($delete_old_session = true);
        $email=trim($_POST["email"]);
        $password=trim($_POST["password"]);

        // $cart_query = 'SELECT * FROM cart WHERE uid = ?';
        // $cart_stmt = $mysqli->prepare($cart_query);
        
        if(isset($email, $password)){
            if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,}$/ix", $email)){
                array_push($errors, "E-Mail does not match requirements");
            }
            if(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $password)){
                array_push($errors, "Password does not match requirements");
            }
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result=$stmt->get_result();



            if (count($errors) == 0){
                while($row = $result->fetch_assoc()){
                    if(password_verify($password, $row['password'])){
    
                        $cart_stmt->bind_param('i', $row['uid']);
                        $cart_stmt->execute();
                        $cart_result=$cart_stmt->get_result();
                        while($cart_row = $cart_result->fetch_assoc()){
                            $_SESSION['cartID'] = $cart_row['cid'];
                        }
    
                        $_SESSION["email"] = $email;
                        $_SESSION["firstname"] = $row['firstname'];
                        $_SESSION["lastname"] = $row['lastname'];
                        $_SESSION["username"] = $row['firstname'] . " " . $row['lastname'];
                        $_SESSION["loggedIn"] = true;
                    }
                }
            } else {
                print_r($errors);
            }

            
    
            $result->free();    
        }
        header("Location: index.php");
    }
    ?>
</body>
</html>