<?php

require "dbBroker.php";
require "model/Igrica.php";
   
    // session_start();
    if (isset($_POST['cena'])) {
    
        $sortiraj = $_POST['cena'];
        if($sortiraj=='ASC') {
            $sve = Igrica::vratiSveCenaASC($conn);
        } else if($sortiraj=='DESC') {
            $sve = Igrica::vratiSveCenaDESC($conn);
        } else {
            $sve = Igrica::vratiSve($conn);
        }
    } else{
        $sve = Igrica::vratiSve($conn);
    }
   
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="css/styleProductCards.css"> -->
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    
    <div class="container" id="kontejner">
    <?php
    
        while ($row = $sve->fetch_array()):
            
    ?>
        <div class="card" style="width:300px">
            <div class="card-header" style="padding:0">
                    <img src="<?php echo $row['slika']?>" style="height:300px;width: auto;" >   
            </div>
            <div class="card-body">
                <div class="tag tag-teal category"> <?php echo $row['nazivKat']?> </div>  
                <br>
                <h4 name = "naslovKartice">  <?php echo $row['naziv']?> </h4>
                <p>  <?php echo $row['kompanija']?>  </p>  
                <p style="font-size:20px;"> <strong>Cena: </strong> <?php echo $row['cena']."$"?> </p>
                
                <form  method="post">
                    <!-- <button type="button" class="btn btn-custom" style="background-color:#47bcd4;"><i class="fas fa-pencil-alt"></i></button>  -->
                    <button type="button" class="btn btn-custom button" onclick="obrisiKarticu(<?php echo $row['id'];?>)">Obriši</button>  
                </form>
            </div> 
        </div>

    <?php endwhile;?>
    </div>


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>

        function obrisiKarticu(deleteID){
            request = $.ajax({  
                url: 'handler/delete.php',  
                type: 'post', 
                data: { deleteID: deleteID },

                success: function(data, status){
                    location.reload(true);
                    alert("Uspesno obrisano!");
                }
            });
        }

    </script>
 







</body>
</html>