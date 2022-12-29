<?php

    class Kategorija{
        public $idKat;
        public $nazivKat;
        
        public function __construct($idKat=null, $nazivKat=null) {
            $this->idKat = $idKat;
            $this->nazivKat = $nazivKat;
        }


        public static function vratiSveKategorije(mysqli $conn) {
            $upit = "SELECT * FROM kategorija";
            return $conn->query($upit);
        }



    }

?>