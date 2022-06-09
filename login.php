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
    $uid = 0;


    $cart = 'INSERT INTO cart (uid) values (?)';
    $insert = $mysqli->prepare($cart);

    $query = 'select email, uid, password from user where email = ?';
    $stmt = $mysqli->prepare($query);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email=trim($_POST["email"]);
        $password=trim($_POST["password"]);

        $cart_query = 'SELECT * FROM cart WHERE uid = ?';
        $cart_stmt = $mysqli->prepare($cart_query);

        if(isset($email, $password)){
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result=$stmt->get_result();



            
            while($row = $result->fetch_assoc()){
                if(password_verify($password, $row['password'])){
                    echo "email: " . $row['email'] . ", password : " . $row['password'] . "<br />";
                    $uid=$row['uid'];

                    $insert->bind_param('i', $row['uid']);
                    $insert->execute();

                    $cart_stmt->bind_param('i', $row['uid']);
                    $cart_stmt->execute();
                    $cart_result=$cart_stmt->get_result();
                    while($cart_row = $cart_result->fetch_assoc()){
                        $_SESSION['cartID'] = $cart_row['cid'];
                    }

                    $_SESSION["email"] = $email;
                    $_SESSION["loggedIn"] = true;



                }
            }    
            $result->free();    
        }
    }
    ?>
        <header>
        <nav>
            <ul class="flex justify-around px-4">
                <li><a href="#home">Home</a></li>
                <li><a href="#home">About</a></li>
                <li><a href="#home">Games</a></li>
                <li><a href="#home">News</a></li>
                <li><a href="#home">Media</a></li>
                <li><a href="#home">Partner</a></li>
                <li><a href="#home">Q&A</a></li>
                <li class="cursor-pointer" id="myBtn">
                    <?php if( !isset($_SESSION['loggedIn'])): ?>
                        <i class='fa-solid fa-arrow-right-to-bracket'></i>
                    <?php else: ?>
                        <i class='fa-solid fa-user'></i>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </header>
    <h1>Logged In</h1>
    <a href="index.php">Home</a>
</body>
</html>