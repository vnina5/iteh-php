<?php

require "../dbBroker.php";
require "../model/Igrica.php";
   

    if (isset($_POST['nazivNova']) && isset($_POST['kompanijaNova']) && isset($_POST['cenaNova'])) {

        // echo $_POST['kategorijaNova'];

        $novaIgrica = new Igrica(null, $_POST['nazivNova'], $_POST['kompanijaNova'], $_POST['cenaNova'], $_POST['slikaNova'], $_POST['kategorijaNova']);

        $rez = Igrica::dodaj($novaIgrica, $conn);

        if($rez) { 
            echo 'Success';
        } else {
            echo 'Failed';
        }
      }
 




?>