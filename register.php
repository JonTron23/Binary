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
<body class="flex flex-col justify-center items-center h-screen">
    <?php
        // SQL-Statement erstellen 
        $insert = "Insert into user (firstname, lastname, email, password) values (?,?,?,?)";
        $query = 'SELECT * FROM user WHERE email = ?';

        // SQL-Statement vorbereiten
        $stmt = $mysqli->prepare($insert);
        if ($stmt === false) {
            $error .= 'prepare() failed ' . $mysqli->error . '<br />';
        }
        $qstmt = $mysqli->prepare($query);
        if ($qstmt === false) {
            $error .= 'prepare() failed ' . $mysqli->eßrror . '<br />';
        }
        $errors = array(); 
        $firstname = $lastname = $email = $password = $rpassword = '';

        if($_SERVER['REQUEST_METHOD'] == "POST"){
                $lastname=trim($_POST["lastname"]);
                $firstname=trim($_POST["firstname"]);
                $email=trim($_POST["email"]);
                $password=trim($_POST["password"]);
                $rpassword=trim($_POST["rpassword"]);

                $qstmt->bind_param('s', $email);
                $qstmt->execute();
                $result=$qstmt->get_result();
                $user = mysqli_fetch_assoc($result);

                if(isset($email, $password, $rpassword)){
                    if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,}$/ix", $email)){
                        array_push($errors, "E-Mail does not match requirements");
                    }
                    if(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $password)){
                        array_push($errors, "Password does not match requirements");
                    }
                    if($password !== $rpassword){
                        array_push($errors, "Password does not match with second Password");
                    }
                    if($user){
                        if ($user['email'] === $email) {
                            array_push($errors, "email already exists");
                          }
                    }
                    if (count($errors) == 0){
                        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                        // Daten an das SQL-Statement binden
                        if (!$stmt->bind_param('ssss', $firstname, $lastname, $email, $hashed_password)) {
                            $error .= 'bind_param() failed ' . $mysqli->error . '<br />';
                        }
                        // SQL-Statement ausführen
                        if (!$stmt->execute()) {
                            $error .= 'execute() failed ' . $mysqli->error . '<br />';
                        }
                    } else {
                        print_r($errors);
                    }
                }
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
            <input class="register_input" type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($firstname) ?>" required>
            <label class="register_label" for="firstname">Firstname</label>
        </div>
        <div class="register_input_box">
            <input class="register_input" type="text" id="lastname" name="lastname"  value="<?php echo htmlspecialchars($lastname) ?>" required>
            <label class="register_label" for="lastname">Lastname</label>
        </div>
        <div class="register_input_box">
            <input class="register_input" type="email" id="email" name="email" pattern="([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,}$" value="<?php echo htmlspecialchars($email) ?>" required>
            <label class="register_label" for="email">E-Mail-Address</label>
        </div>
       <div class="register_input_box">
           <input class="register_input" type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
           <label class="register_label" for="password">Password</label>
       </div>
       <div class="register_input_box">
           <input class="register_input" type="password" id="rpassword" name="rpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
           <label class="register_label" for="rpassword">repeat Password</label>
       </div>
        <input type="submit" value="Submit" id="submit">
    </form>

    <p>
  		Already a member? <a href="index.php">Sign in</a>
  	</p>


</body>
</html>