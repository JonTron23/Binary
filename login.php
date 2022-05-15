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
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    if($user !== false && password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['id'];
        die('Login succeed')
    } else {
        $errorMessage = "E-Mail or Password is invalid"
    }

    ?>
    <h1>Logged In</h1>
</body>
</html>