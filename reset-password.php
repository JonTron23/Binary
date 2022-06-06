<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                Reset Password In PHP MySQL
            </div>
        <div class="card-body">

        <?php
        if($_GET['key'] && $_GET['token'])
        {
        $email = $_GET['key'];
        $token = $_GET['token'];
        $query = "SELECT * FROM user WHERE reset_link_token = ? and email = ?";
        $stmt->prepare($query);
        $stmt->bind_param('ss', $token, $email);
        $stmt->execute();
        $curDate = date("Y-m-d H:i:s");
        if (mysqli_num_rows($query) > 0) {
        $row= mysqli_fetch_array($query);
        if($row['exp_date'] >= $curDate){ ?>
        <form action="update-forget-password.php" method="post">
            <input type="hidden" name="email" value="<?php echo $email;?>">
            <input type="hidden" name="reset_link_token" value="<?php echo $token;?>">

            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" name='password' class="form-control">
            </div>                
            <div class="form-group">
                <label for="exampleInputEmail1">Confirm Password</label>
                <input type="password" name='cpassword' class="form-control">
            </div>
            <input type="submit" name="new-password" class="btn btn-primary">
        </form>
        <?php } else{
        <p>This forget password link has been expired</p>
        }
        ?>
        </div>
        </div>
    </div>
</body>
</html>