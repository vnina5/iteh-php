<?php

require "dbBroker.php";
require "model/User.php";

session_start();

    if( isset($_POST['email']) && isset($_POST['password'])){
        $umail = $_POST['email'];
        $upass = $_POST['password'];

        $korisnik = new User(null, null, $umail, $upass);

        $odg = User::loginUser($korisnik, $conn); 

        if($odg->num_rows == 1) {
            $kor = $odg->fetch_assoc();
            
            $_SESSION['user_id'] = $kor['id'];
            $_SESSION['name']= $kor['name'];

            echo "bravoo uspesna prijavaa";
            header("Location: home.php");
            exit();
        }
        else{
            echo "Neuspesna prijava";
            // header("Location: index.php");
            // $korisnik = null;
            exit();
        }
        
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Igrice</title>
</head>
<body>
    
    <!-- <img src="img/pozadina.png" alt="" class="background"> -->
<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
    <!-- <div class="wrapper wrapper--w780"> -->
    <!-- <div class="card card-3"> -->

    <div class="login-form">
        <form method="POST" action="#">

            <div class="container">
                <label for="email" class="lbl">Email</label>
                <input type="email" name="email" id="email" class="inpt" required>
                <br>
                <label for="password" class="lbl">Password</label>
                <input type="password" name="password" id="password" class="inpt" required>
                <br><br>
                <button type="submit" name="submit" value="login" class="btn btn-login">Prijavi se</button>
            </div>

        </form>
    <!-- </div> -->
    <!-- </div> -->
    </div>
</div>
    
</body>
</html>