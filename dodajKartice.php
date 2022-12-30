<?php

require "dbBroker.php";
require "model/Kategorija.php";

    $kategorije = Kategorija::vratiSveKategorije($conn);

    // while ($row = $kategorije->fetch_array()):
    //     echo $row['idKat'], $row['nazivKat'];
    //     echo '<br>';
    // endwhile;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">

    <title>Igrice</title>
</head>
<body>

    <nav class="navbar navbar-custom" id="header">
        <a class="navbar-brand" href="home.php" style="vertical-align:center;">
            <img src="img/logo.jpg" width="auto" height="50" class="d-inline-block align-center" alt=""><strong>Igrice</strong>
        </a> 
        <div>
            <a class="nav-link" href="home.php">Pocetna</a>
            <!-- <a class="nav-link" href="dodajKartice.php">Dodaj novu igru</a>   -->
            <a class="nav-link" href="logout.php">Odjava</a>
        </div>
    
    </nav>


        <div class="page-wrapper pozadina-gr p-t-30 p-b-30">
            <!-- <br><br><br> -->
            <div class="cont-black" style="width:800px;">
                <!-- <div class="card-heading" style="background: url('img/logo.jpg') top left/cover no-repeat; display: table-cell; width: 50%;"></div> -->
                    <!-- <div class="card-body"> -->
                    <h2 class="title">Dodaj novu karticu</h2>

                    <form method="POST" id="novaKartica">
                        <div class="grupa">
                            <label for="nazivNova" class="lbl">Naziv</label>
                            <input class="input--style-3 inpt-2" type="text" placeholder="" name="nazivNova" required>
                        </div>
                        
                        <div class="grupa">
                            <label for="kompanijaNova" class="lbl">Kompanija</label>
                            <input class="input--style-3 inpt-2" type="text" placeholder="" name="kompanijaNova" required>
                        </div>
                        
                        <div class="grupa">
                        <label for="kategorijaNova" class="lbl">Kategorije</label>
                            <div class="rs-select2 select--no-search">
                                <select name="kategorijaNova"  class="inpt-kat">
                                <option disabled="disabled" selected="selected">Izaberi</option>
                                    <?php
                                    while($red = $kategorije->fetch_array()): 
                                    ?>
                                    
                                    <option value=<?php echo $red["idKat"]?>><?php echo $red["nazivKat"]?></option> 
        
                                    <?php endwhile;?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>


                        <div class="grupa">
                            <label for="cenaNova" class="lbl">Cena</label>
                            <input class="input--style-3 inpt-2" type="text" placeholder="" name="cenaNova" required>
                        </div>

                        <div class="grupa">
                            <label for="slikaNova" class="lbl">Slika</label>
                            <input class="input--style-3 inpt-2" type="text" placeholder="" name="slikaNova" required>
                            <img src="" alt="">
                        </div>

                        <div class="p-t-20 grupa">
                            <button class="btn btn--pill potvrdi" type="submit">Potvrdi</button>
                        </div>
                    </form>
                    
                <!-- </div> -->
                </div>
            </div>
        </div>


    <!-- SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script> 
        $('#novaKartica').submit(function () {

            var form = $('#novaKartica')[0];
            var formData = new FormData(form);
            event.preventDefault();  
            console.log(formData);

            request = $.ajax({  
                url: 'handler/add.php',  
                type: 'post', 
                processData: false,
                contentType: false,
                data: formData
            });
            console.log(request);

            request.done(function (response, textStatus, jqXHR) {
                console.log(textStatus);
                console.log(jqXHR);
                console.log(response);

                if (response === "Success") {
                    alert("Uspesno dodato");
                }
                else {
                    console.log("Neuspesno" + response);
                }
            });

            request.fail(function (jqXHR, textStatus, errorThrown) {
                console.error('Greska: ' + textStatus, errorThrown);
            });
        }); 

    </script>

</body>
</html>