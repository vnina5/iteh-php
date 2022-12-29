<?php

require "../dbBroker.php";
require "../model/Igrica.php";

    if(isset($_POST['deleteID'])){
        $rez=  Igrica::obrisi($_POST['deleteID'], $conn);

        if($rez){
            echo 'Success';
        }else{
            echo 'Failed';
        }
        
    }


?>