<?php


class Konekcija
{
    private $connection;
    function __construct()
    {
        $this->connection = new mysqli('localhost', 'root', '', 'glavna_baza');
        if ($this->connection->error) {
            die("Ne valja: $this->connection->error");
        }
        //kreiramo bazu ako ne postoji
        $this->connection->query("CREATE DATABASE IF NOT EXISTS `glavna_baza`");

        //selektujemo bazu da bi smo radili sa njom
        $this->connection->select_db('glavna_baza');

        $this->connection->query("CREATE TABLE IF NOT EXISTS `vesti` (`id` smallint(6) NOT NULL AUTO_INCREMENT,
        `naslov` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `autor` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'redakcija',
        `tekst` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `izvor` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
        `postavljeno` date NOT NULL,
        `photo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
        `caption` varchar(100) COLLATE cp1250_croatian_ci DEFAULT NULL,
        `comment` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
        `kategorija` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `prioritet` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
        `full_article` text COLLATE cp1250_croatian_ci NOT NULL,
        PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci");

        //kreiramo tabelu user ako ne postoji
        $this->connection->query("CREATE TABLE IF NOT EXISTS `admin` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(50) NOT NULL , `password` TEXT NOT NULL , PRIMARY KEY (`id`), UNIQUE `uname` (`username`(50))) ENGINE = innoDB;");

        //INSERT IGNORE ignorise duplikate za UNIQUE kolonu (username), tako da nece biti ponavljanja admina u tabeli
        $this->connection->query("INSERT IGNORE INTO `admin`(`username`,`password`) VALUES ('dragan@admin.com','$2y$10\$aXg0vPcS6tGXeDd/wy5Yhe8v95tktrdbIT41Wapu21eJNGqQZDwC.')");
    }


    function pretraga($pojam)
    {
        return $this->connection->query("SELECT * FROM `vesti` WHERE `full_article` LIKE '%$pojam%' ");
    }


    function unesiVesti($naslov, $autor, $tekst, $izvor, $photo, $caption, $kategorija, $prioritet, $full_article)
    {
        $upit = $this->connection->prepare("INSERT INTO `vesti`(`naslov`, `autor`, `tekst`, `izvor`, `photo`, `caption`, `kategorija`, `prioritet`, `full_article`) VALUES (?,?,?,?,?,?,?,?,?)");
        $upit->bind_param("sssssssss", $naslov, $autor, $tekst, $izvor, $photo, $caption, $kategorija, $prioritet, $full_article);
        $upit->execute();
    }

    private function prepareSelectUser()
    {
        return $this->connection->prepare("SELECT * FROM `admin` WHERE `username`=?");
    }

    function registrujKorisnika($user, $pass): bool
    {
        $prepared = $this->prepareSelectUser();
        $prepared->bind_param("s", $user);
        $prepared->execute();
        $res = $prepared->get_result();
        if ($res->num_rows == 1) {
            return false;
        }
        $enc_pass = password_hash($pass, PASSWORD_BCRYPT);
        $statement = $this->connection->prepare("INSERT INTO `admin`(`username`,`password`) VALUES (?,?)");
        $statement->bind_param("ss", $user, $enc_pass);
        $statement->execute();


        return true;
        echo $enc_pass;
    }


    function proveriKorisnika($user, $pass): bool
    {
        $prepared = $this->prepareSelectUser();
        $prepared->bind_param("s", $user);
        $prepared->execute();
        $res = $prepared->get_result();
        if ($res->num_rows == 1) {
            $row = $res->fetch_assoc();
            return password_verify($pass, $row['password']);
        }
        return false;
    }


    function preuzmiVest($id)
    {
        $query_res = $this->connection->query("SELECT * FROM `vesti` WHERE `id`=$id");
        return $query_res->fetch_assoc();
    }



    function nizVesti()
    {
        $query_res = $this->connection->query("SELECT * FROM `vesti` ORDER BY `id` DESC");
        $result = [];
        foreach ($query_res as $row) {
            array_push($result, [$row['id'], $row['naslov'], $row['tekst'], $row['izvor'], $row['postavljeno'], $row['photo'], $row['caption'], $row['comment'], $row['kategorija'], $row['prioritet'], $row['full_article']]);
        }
        return $result;
    }
    function triNajvaznijeVesti()
    {
        $query_res = $this->connection->query("SELECT * FROM `vesti` WHERE `prioritet` LIKE 'vazno' ORDER BY `id` DESC LIMIT 3");
        $result = [];
        foreach ($query_res as $row) {
            array_push($result, [$row['id'], $row['naslov'], $row['naslov'], $row['tekst'], $row['izvor'], $row['postavljeno'], $row['photo'], $row['caption'], $row['comment'], $row['kategorija']]);
        }
        return $result;
    }

    function klikNaVest()
    {

        $query_res = $this->connection->query("SELECT * FROM `vesti` WHERE `naslov` LIKE 'El%' ");
        $result = [];
        foreach ($query_res as $row) {
            array_push($result, [$row['id'], $row['naslov'], $row['naslov'], $row['tekst'], $row['izvor'], $row['postavljeno'], $row['photo'], $row['caption'], $row['comment'], $row['kategorija']]);
        }
        return $result;
    }
    function samoNaslovi()
    {
        $query_res = $this->connection->query("SELECT * FROM `vesti` ORDER BY `id` DESC LIMIT 5");
        $result = [];
        foreach ($query_res as $row) {
            array_push($result, $row['id'], $row['naslov']);
        }
        return $result;
    }
    function nizColumni()
    {
        $query_res = $this->connection->query("SELECT * FROM `vesti` WHERE `kategorija` LIKE 'columns' ORDER BY `id` DESC");
        $result = [];
        foreach ($query_res as $row) {
            array_push($result, [$row['id'], $row['naslov'], $row['tekst'], $row['izvor'], $row['postavljeno'], $row['photo'], $row['caption'], $row['comment'], $row['kategorija'], $row['prioritet'], $row['full_article']]);
        }
        return $result;
    }
    function nizSport()
    {
        $query_res = $this->connection->query("SELECT * FROM `vesti` WHERE `kategorija` LIKE 'sports' ORDER BY `id` DESC");
        $result = [];
        foreach ($query_res as $row) {
            array_push($result, [$row['id'], $row['naslov'], $row['tekst'], $row['izvor'], $row['postavljeno'], $row['photo'], $row['caption'], $row['comment'], $row['kategorija'], $row['prioritet'], $row['full_article']]);
        }
        return $result;
    }
    function nizShowbiz()
    {
        $query_res = $this->connection->query("SELECT * FROM `vesti` WHERE `kategorija` LIKE 'Showbiz' ORDER BY `id` DESC");
        $result = [];
        foreach ($query_res as $row) {
            array_push($result, [$row['id'], $row['naslov'], $row['tekst'], $row['izvor'], $row['postavljeno'], $row['photo'], $row['caption'], $row['comment'], $row['kategorija'], $row['prioritet'], $row['full_article']]);
        }
        return $result;
    }
    function nizWorld()
    {
        $query_res = $this->connection->query("SELECT * FROM `vesti` WHERE `kategorija` LIKE 'World' ORDER BY `id` DESC");
        $result = [];
        foreach ($query_res as $row) {
            array_push($result, [$row['id'], $row['naslov'], $row['tekst'], $row['izvor'], $row['postavljeno'], $row['photo'], $row['caption'], $row['comment'], $row['kategorija'], $row['prioritet'], $row['full_article']]);
        }
        return $result;
    }

    function nizKnjiga() {
        $query_res = $this->connection->query("SELECT * FROM `bookstore` WHERE `promoted`=1 ORDER BY `id` DESC LIMIT 1");
        $result = [];
        foreach ($query_res as $row) {
            array_push($result,[$row['id'],$row['title'],$row['author'],$row['cover'],$row['price'],$row['promoted']]);
        }
        return $result;
    }

    function sveKnjige() {
        $query_res = $this->connection->query("SELECT * FROM `bookstore` ORDER BY `id` DESC");
        $result = [];
        foreach ($query_res as $row) {
            array_push($result,[$row['id'],$row['title'],$row['author'],$row['cover'],$row['price'],$row['promoted']]);
        }
        return $result;
    }

    function preuzmiKnjigu($id)
    {
        $query_res = $this->connection->query("SELECT * FROM `bookstore` WHERE `id`=$id");
        return $query_res->fetch_assoc();
    }



}

$connection = new Konekcija();
