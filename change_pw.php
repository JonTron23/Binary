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
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="files/js/preloader.js"></script>
    <link rel="stylesheet" href="files/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <?php
        $current_password = $new_password = $repeat_password = '';
        $error = '';
            $query = 'select * from user where email = ?';
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('s', $_SESSION["email"]);
            $stmt->execute();
            $result=$stmt->get_result();
            while($row = $result->fetch_assoc()){
                $db_password = $row['password'];
                $uid = $row['uid'];
            }
        $update = 'UPDATE user SET password = ? where uid = ?';
        $ustmt = $mysqli->prepare($update);
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if(isset($current_password, $new_password, $repeat_password)){
                $current_password = $_POST['current_password'];
                $new_password = $_POST['new_password'];
                $repeat_password = $_POST['repeat_password'];
                echo($uid);
                echo($current_password);
                echo($new_password);
                if(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $current_password)){
                    $error_password = "Current Password does not match requirements";
                    echo $error_password;
                }
                if(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $new_password)){
                    $error_password = "New Password does not match requirements";
                    echo $error_password;
                }
                if(!password_verify($current_password, $db_password)){
                    $error_password = "The password does not match your Password";
                    echo $error_password;
                }
                if($new_password === $repeat_password){
                        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
                        // Daten an das SQL-Statement binden
                        if (!$ustmt->bind_param('si', $hashed_password, $uid)) {
                        $error .= 'bind_param() failed ' . $mysqli->error . '<br />';
                    }
                        // SQL-Statement ausführen
                        if (!$ustmt->execute()) {
                        $error .= 'execute() failed ' . $mysqli->error . '<br />';
                    }
                }
            }
        }
    ?>
<header class="pb-8">
        <nav>
            <ul class="grid grid-cols-8 px-4">
                <li><a href="#home">Home</a></li>
                <li><a href="#home">About</a></li>
                <li><a href="#home">Games</a></li>
                <li><a href="#home">News</a></li>
                <li><a href="#home">Media</a></li>
                <li><a href="#home">Partner</a></li>
                <li><a href="#home">Q&A</a></li>
                <li class="cursor-pointer" id="myBtn"><i class="fa-solid fa-arrow-right-to-bracket"></i></li>

            </ul>
        </nav>
    </header>
    <main class="flex flex-col justify-center items-center">
    <form action="" method="post">
        <div class="register_input_box">
            <input class="register_input" type="password" id="current_password" name="current_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
            <label class="register_label" for="current_password">Current Password</label>
        </div>
        <div class="register_input_box">
            <input class="register_input" type="password" id="new_password" name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
            <label class="register_label" for="new_password">New Password</label>
        </div>
        <div class="register_input_box">
            <input class="register_input" type="password" id="repeat_password" name="repeat_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
            <label class="register_label" for="repeat_password">Repeat Password</label>
        </div>
            <input type="submit" value="Submit" id="submit">
    </form>
    </main>
    
    <footer class="flex">
    <i class="fa-solid fa-copyright"></i>
    <a href="impressum.php">Impressum</a>
        <div class="socialIcons ">
            <a href="" class="p-2"><i class="fa-brands fa-youtube"></i></a>
            <a href="" class="p-2"><i class="fa-brands fa-twitter"></i></a>
            <a href="" class="p-2"><i class="fa-brands fa-twitch"></i></a>
            <a href="" class="p-2"><i class="fa-brands fa-instagram"></i></a>
        </div>

        <a href="register.php" class="">REGISTER</a>
    </footer>
</body>
</html>