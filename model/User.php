<?php

    class User{
        public $idUser;
        public $name;
        public $email;
        public $password;

        public function __construct($idUser=null, $name=null, $email=null, $password=null){
            $this->idUser= $idUser;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }

        public static function loginUser($usr, mysqli $conn){
            $upit = "SELECT * FROM user WHERE email='$usr->email' AND password='$usr->password'";
            $rez = $conn->query($upit);
            return $rez;
        }

    }
    
?>