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
                $email = "email";

                $name = "";
                $msg = "";

                $receiver ="jonathan.heeb02@gmail.com";
                $reference = "";

                $page_ok = "";
                $page_error = "";

                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $email=trim($_POST["email"]);
                    $name=trim($_POST["name"]);
                    $msg=trim($_POST["msg"]);

                    date_default_timezone_set('Europe/Zurich');
                    $week = date("w");
                    $year = date("y");
                    $day = date("d");
                    $month = date("m");
                    $time = date("H:i");

                    if(isset($email, $name, $msg)){
                        if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,}$/ix", $email)) {
                            $error_email = "please enter a valid E-Mail-Address";
                            echo $error_email;
                        } else {
                            $msg = ":: Send on $day.$month.$year - $time o clock ::\n\n";

                            foreach($_POST as $name => $value) {
                                $msg .= ":: $name :::\n$value\n\n";
                            }
                            
                            $header="From: $email";

                            $header .= "\nContent-type: text/plain; charset=utf-8";

                            $send_mail = mail($receiver,$reference,$msg,$header);

                            // if($send_mail) {
                            //     header("Location: ".$page_ok);
                            //     exit();
                            // } else {
                            //     header("Location: ".$page_error);
                            //     exit();
                            // }
                        }
                        
                    } else {
                        $error = "please enter your name and your message";
                        echo $error;
                    }
                }
            ?>

            <h1>E-Mail sent</h1>
</body>
</html>