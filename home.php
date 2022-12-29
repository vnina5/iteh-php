<?php

require "dbBroker.php";
require "model/User.php";
// require "model/Igrica.php";

session_start();

    if(isset($_SESSION['user_id'])) {
        $userID = $_SESSION['user_id'];
        $userName = $_SESSION['name'];
    }
    // else {
    //     // echo "nema usera";
    //     exit();
    //     // header("Location: login.php");
    // }


    // $sve = $_SESSION['sve'];

    // while ($row = $sve->fetch_array()):
    //     echo $row['id'], $row['naziv'];
    //     echo '<br>';
    // endwhile;

    // if (isset($_POST['cena'])) {
    
    //     $sortiraj = $_POST['cena'];
    //     if($sortiraj=='ASC'){
    //         $sve = Igrica::getAllCenaASC($conn);
    //     }else if($sortiraj=='DESC'){
    //         $sve = Igrica::getAll($conn);
    //     }
    // }else{
    //     $sve = Igrica::getAll($conn);
    // }
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">

    <title>Igrice</title>
</head>
<body>
    
    <nav class="navbar navbar-custom" id="header">
        <a class="navbar-brand" href="home.php" style="vertical-align:center;">
            <img src="img/logo.jpg" width="auto" height="50" class="d-inline-block align-top" alt=""><strong>Igrice</strong>
        </a> 
        <div>
            <a class="nav-link" href="home.php">Pocetna</a>
            <a class="nav-link" href="dodajKartice.php">Dodaj novu igru</a>  
            <a class="nav-link" href="logout.php">Odjava</a>
        </div>
    
    </nav>

    <div id="products" name="products">
        <div style="margin-top:50px"> 
            <label for="cena" style="margin-left:20%;font-size:16px">Sortiranje: </label>
            <select name="cena" id="cena" class="sort" onchange="sortirajPoCeni()">
                    <option>Cena</option>
                    <option value="ASC">Cena rastuće</option>
                    <option value="DESC">Cena opadajuće</option>
            </select>

            <!-- <div class="input-group" style="float:right;padding-left:65%;padding-right:15%;"> 
                <input type="search" id="form1" class="form-control"  style="float:right" onkeyup="pretraga()" placeholder="Search by name..."/>
                <button type="button" class="btn btn-custom" style="background-color:#fbc2eb; color:black" ;><i class="fas fa-search"></i> </button>
            </div> -->
        </div>
        <br><br>

        <div id="kartice">
            <?php include "kartice.php"; ?>
        </div>

    </div>

    <br><br><br>


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>

        function sortirajPoCeni() {
            let sortiraj = $("#cena").val();
            console.log(sortiraj);

            let x = $("#kartice").html("");
            console.log(x);
            $.post("kartice.php", { cena: sortiraj }, function (data) {

                $("#kartice").html(data);
            });

        }

    </script>



</body>
</html>