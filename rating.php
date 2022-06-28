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
        $query = 'SELECT * FROM rating WHERE pid = ?';
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('i', $_GET['pid']);
        $stmt->execute();
        $result=$stmt->get_result();


        while($row = $result->fetch_assoc()){
            echo('
            <div class="ratings">
                <div class="rating">
                    <h3>' . $row['user'] . '</h3>
                    <h4>' . $row['stars'] . ' x <i class="fa-solid fa-star"></i></h4>
                    <p>' . $row['rating'] . '</p>
                </div>
            </div>
            ');
        }

        if(isset($_SESSION['loggedIn'])){
            $r = 1;
            $_SESSION['firstname'];
            $_SESSION['lastname'];
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $write = 'INSERT INTO rating (pid, rating, stars, user) values (?,?,?,?)';
                $wrstmt = $mysqli->prepare($write);
                $wrstmt->bind_param('ssis', $_GET['pid'], $_POST['rating'], $_POST['bewertung'], $_SESSION['username']);
                $wrstmt->execute();
                header("Refresh:0");
            }
            echo('
            <form class="flex flex-col w-1/2 justify-center pl-6 pt-6" action="" method="post">
            <div class="login_input_box flex flex-col mb-8">
                <input class="login_input z-10" type="text" name="rating" required>
                <label class="login_label pb-2 z-0" for="rating">Rating</label>
            </div>
            <p class="sternebewertung w-full">
                <input type="radio" id="stern5" name="bewertung" value="5"><label for="stern5" title="5 Sterne">5 Sterne</label>
                <input type="radio" id="stern4" name="bewertung" value="4"><label for="stern4" title="4 Sterne">4 Sterne</label>
                <input type="radio" id="stern3" name="bewertung" value="3"><label for="stern3" title="3 Sterne">3 Sterne</label>
                <input type="radio" id="stern2" name="bewertung" value="2"><label for="stern2" title="2 Sterne">2 Sterne</label>
                <input type="radio" id="stern1" name="bewertung" value="1"><label for="stern1" title="1 Stern">1 Stern</label>
                <span id="Bewertung" title="Keine Bewertung"></span>
            </p>
            <input type="submit" value="Submit" id="submit">
        </form>     
            ');
        } else {
            echo('<p>Please Create a Account or Log in to write a rating</p>');
        }
        
    
    ?>

</body>
</html>