<?php
include('db-connector.inc.php');
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
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
if(isset($_POST['password-reset-token']) && $_POST['email'])
{    
    $emailId = $_POST['email'];

    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $_POST["email"]);
    $stmt->execute();
    $result=$stmt->get_result();
    $row = $result->fetch_assoc();
 
    $row= mysqli_fetch_array($result);
 
  if($row)
  {
     
     $token = md5($emailId).rand(10,9999);
    $password = "";

     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );
 
    $expDate = date("Y-m-d H:i:s",$expFormat);
 
    $update = "UPDATE user SET password = ?, reset_link_token = ?, exp_date = ? WHERE email = ?";
    $ustmt = $mysqli->prepare($update);
    $ustmt->bind_param('ssss', $password, $token, $expDate, $_POST["email"]);
    $ustmt->execute();
 
    $link = "<a href='http://binary.test/reset-password.php?key=".$emailId."&token=".$token."'>Click To Reset password</a>";

    require 'vendor/autoload.php';
    $mail = new PHPMailer();
 
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "binary.testusr@gmail.com";
    // GMAIL password
    $mail->Password = "KRs6omuJQ8pibA3wyYKR";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "587";
    $mail->From='binary.testusr@gmail.com';
    $mail->FromName='your_name';
    $mail->AddAddress('joanthan.heeb02@gmail.com', 'jonathan');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }else{
    echo "Invalid Email Address. Go back";
  }
}
?>
</body>
</html>