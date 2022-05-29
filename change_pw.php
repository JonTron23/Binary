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
    <div class="register_input_box w-1/2">
           <input class="register_input" type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
           <label class="register_label" for="password">New Password</label>
    </div>
    <div class="register_input_box w-1/2">
        <input class="register_input" type="password" id="rpassword" name="rpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
        <label class="register_label" for="rpassword">repeat Password</label>
    </div>
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