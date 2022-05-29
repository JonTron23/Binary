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
        $query = 'select * from users where email = ?';
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('s', $_SESSION["email"]);
        $stmt->execute();
        $result=$stmt->get_result();
        while($row = $result->fetch_assoc()){
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
        }
    ?>
<header>
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
<form class="flex flex-col w-1/2" action="" method="post">
        <div class="register_input_box">
            <input class="register_input" 
                type="text" 
                id="fname" 
                name="fname" 
                value="<?php echo $firstname ?>" 
                required>
            <label class="register_label" for="fname">Firstname</label>
        </div>
        <div class="register_input_box">
            <input class="register_input" 
                type="text" 
                id="lname" 
                name="lname"  
                value="<?php echo $lastname ?>" 
                required>
            <label class="register_label" for="lname">Lastname</label>
        </div>
        <div class="register_input_box">
            <input class="register_input" 
                type="email" 
                id="email" 
                name="email" 
                pattern="([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,}$" 
                value="<?php echo $email ?>" 
                required>
            <label class="register_label" for="email">E-Mail-Address</label>
        </div>
        <div class="register_input_box">
            <input class="register_input"
                type="street" 
                id="autocomplete">
                <label class="register_label" for="email">Street</label>
        </div>
        <div class="register_input_box">
            <input class="register_input" 
                    type="city" 
                    id="inputCity"> 
                <label class="register_label" for="email">City</label>
        </div>
        <div class="register_input_box">
            <input class="register_input"
                    type="zip" 
                    id="inputZip">
                <label class="register_label" for="email">ZIP</label>
        </div>
        <div class="register_input_box">
            <input class="register_input"
                    type="county" 
                    id="inputCounty">
                <label class="register_label" for="email">Country</label>
        </div>
       <div class="register_input_box">
           <input class="register_input" 
                type="password" 
                id="password" 
                name="password" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                required>
           <label class="register_label" for="password">Password</label>

       </div>
       <div class="register_input_box">
           <input class="register_input" 
                type="password" 
                id="rpassword" 
                name="rpassword" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                required>
           <label class="register_label" for="rpassword">repeat Password</label>
       </div>
        <input type="submit" value="Submit" id="submit">
    </form>
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