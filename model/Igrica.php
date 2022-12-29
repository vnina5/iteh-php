<?php

    class Igrica{
        public $id;
        public $naziv;
        public $kompanija;
        public $cena;
        public $slika;
        public $kategorja;

        public function __construct($id=null, $naziv=null, $kompanija=null, $cena=null, $slika=null, $kategorja=null){
            $this->id = $id;
            $this->naziv = $naziv;
            $this->kompanija = $kompanija;
            $this->cena = $cena;
            $this->slika = $slika;
            $this->kategorja = $kategorja;
        }


        // public static function vratiIgricu($id, mysqli $conn) {
        //     $upit = "SELECT * FROM igrica WHERE id='$id'";
            
        //     $niz = array();
        //     if ($rez = $conn->query($upit)) {

        //         while ($red = $rez->fetch_array(1)) {
        //             $niz[] = $red;
        //         }
        //     }
        //     return $niz;
        // }

        public static function vratiSve(mysqli $conn) {
            $upit = "SELECT * FROM igrica i INNER JOIN kategorija k ON i.kategorija=k.idKat";
            return $conn->query($upit);
        }

        public static function vratiSveCenaASC(mysqli $conn){
            $upit = "SELECT * FROM igrica i INNER JOIN kategorija k ON i.kategorija=k.idKat ORDER BY i.cena ASC";
            return $conn->query($upit); 
        }

        public static function vratiSveCenaDESC(mysqli $conn){
            $upit = "SELECT * FROM igrica i INNER JOIN kategorija k ON i.kategorija=k.idKat ORDER BY i.cena DESC";
            return $conn->query($upit); 
        }

        public static function dodaj($igrica, mysqli $conn) {
            // $upit = "insert into product (name,description,image,price,category) values ('$p->name','$p->description','$p->image',$p->price,$p->category)";
            $upit = "INSERT INTO igrica(naziv, kompanija, cena, slika, kategorija) VALUES('$igrica->naziv', '$igrica->kompanija', '$igrica->cena', '$igrica->slika', '$igrica->kategorja')";
            return $conn->query($upit);
        }

        public static function obrisi($id, mysqli $conn) {
            $upit = "DELETE FROM igrica WHERE id='$id'";
            return $conn->query($upit);
        }

        

    }
    
?>