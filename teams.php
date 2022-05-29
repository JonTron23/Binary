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
    <link rel="stylesheet" href="files/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <div class="teams flex">
        <div class="team w-1/2 m-4 relative">
            <h1 class="absolute bottom-0" >Team 1</h1>
            <a href="team.php"><img src="files/media/team.jpg" alt=""></a>
        </div>
        <div class="team w-1/2 m-4">
            <h1 class="absolute bottom-0">Team 2</h1>
            <a href="team.php"><img src="files/media/team.jpg" alt=""></a>
        </div>
    </div>
</body>
</html>