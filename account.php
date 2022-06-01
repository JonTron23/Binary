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
        $query = 'select * from user where email = ?';
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('s', $_SESSION["email"]);
        $stmt->execute();
        $result=$stmt->get_result();
        while($row = $result->fetch_assoc()){
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $street = $row['street'];
            $city = $row['city'];
            $zip = $row['zip'];
            $country = $row['country'];
            $uid = $row['uid'];
        }

        $error='';
        $update = "UPDATE user SET firstname = ?, lastname = ?, email = ?, street = ?, city = ?, zip = ?, country = ? WHERE uid = ?";
        $ustmt = $mysqli->prepare($update);
        if ($ustmt === false) {
            $error .= 'prepare() failed ' . $mysqli->error . '<br />';
        }

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($firstname, $lastname, $email)){
                if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,}$/ix", $email)){
                    $error_email = "E-Mail does not match requirements";
                    echo $error_email;
                }
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $street = $_POST['street'];
                $city = $_POST['city'];
                $zip = $_POST['zip'];
                $country = $_POST['country'];
                if (!$ustmt->bind_param('sssssisi', $firstname, $lastname, $email, $street, $city, $zip, $country, $uid)) {
                    $error .= 'bind_param() failed' . $mysqli->error . '<br />';
                }
                if (!$ustmt->execute()) {
                    $error .= 'execute() failed ' . $mysqli->error . '<br />';
                }
            }
        }
    ?>
    <header>
        <nav>
            <ul class="grid grid-cols-8 px-4">
                <li><a href="index.php">Home</a></li>
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
<form class="flex flex-col w-1/2" action="" method="post">
        <div class="register_input_box">
            <input class="register_input" 
                type="text" 
                id="firstname" 
                name="firstname" 
                value="<?php echo htmlspecialchars($firstname) ?>" 
                required>
            <label class="register_label" for="firstname">Firstname</label>
        </div>
        <div class="register_input_box">
            <input class="register_input" 
                type="text" 
                id="lastname" 
                name="lastname"  
                value="<?php echo htmlspecialchars($lastname) ?>" 
                required>
            <label class="register_label" for="lastname">Lastname</label>
        </div>
        <div class="register_input_box">
            <input class="register_input" 
                type="email" 
                id="email" 
                name="email" 
                pattern="([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,}$" 
                value="<?php echo htmlspecialchars($email) ?>" 
                required>
            <label class="register_label" for="email">E-Mail-Address</label>
        </div>
        <div class="register_input_box">
            <input class="register_input"
                type="street" 
                id="autocomplete"
                name="street"
                value="<?php echo htmlspecialchars($street) ?>" >
                <label class="register_label" for="street">Street</label>
        </div>
        <div class="register_input_box">
            <input class="register_input" 
                    type="city" 
                    id="inputCity"
                    name="city"
                    value="<?php echo htmlspecialchars($city) ?>"> 
                <label class="register_label" for="city">City</label>
        </div>
        <div class="register_input_box">
            <input class="register_input"
                    type="zip" 
                    id="inputZip"
                    name="zip"
                    value="<?php echo $zip ?>">
                <label class="register_label" for="zip">ZIP</label>
        </div>
        <div class="register_input_box">
            <input class="register_input"
                    type="country" 
                    id="inputCounty"
                    name="country"
                    value="<?php echo htmlspecialchars($country) ?>">
                <label class="register_label" for="email">Country</label>
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