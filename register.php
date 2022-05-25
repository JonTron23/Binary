<?php
include('db-connector.inc.php');
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
        $insert = "Insert into users (firstname, lastname, email, password) values (?,?,?,?)";

        // SQL-Statement vorbereiten
        $stmt = $mysqli->prepare($insert);
        if ($stmt === false) {
            $error .= 'prepare() failed ' . $mysqli->error . '<br />';
        }
        $error = '';
        $firstname = $lastname = $email = $password = $rpassword = '';

        if($_SERVER['REQUEST_METHOD'] == "POST"){
                $lastname=trim($_POST["lastname"]);
                $firstname=trim($_POST["firstname"]);
                $email=trim($_POST["email"]);
                $password=trim($_POST["password"]);
                $rpassword=trim($_POST["rpassword"]);

                if(isset($email, $password, $rpassword)){
                    if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,}$/ix", $email)){
                        $error_email = "E-Mail does not match requirements";
                        echo $error_email;
                    } else {
                        echo $email;
                    }
                    if(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $password)){
                        $error_password = "Password does not match requirements";
                        echo $error_password;
                    }
                    if($password === $rpassword){
                            // Daten an das SQL-Statement binden
                            if (!$stmt->bind_param('ssss', $firstname, $lastname, $email, $password)) {
                            $error .= 'bind_param() failed ' . $mysqli->error . '<br />';
                        }

                            // SQL-Statement ausführen
                            if (!$stmt->execute()) {
                            $error .= 'execute() failed ' . $mysqli->error . '<br />';
                        }
                    }
                }
        }

    ?>

    <form class="flex flex-col w-1/2" action="" method="post">
        <div class="register_input_box">
            <input class="register_input" type="text" id="firstname" name="firstname" value="<?php echo $firstname ?>" required>
            <label class="register_label" for="firstname">Firstname</label>
        </div>
        <div class="register_input_box">
            <input class="register_input" type="text" id="lastname" name="lastname"  value="<?php echo $lastname ?>" required>
            <label class="register_label" for="lastname">Lastname</label>
        </div>
        <div class="register_input_box">
            <input class="register_input" type="email" id="email" name="email" pattern="([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,}$" value="<?php echo $email ?>" required>
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