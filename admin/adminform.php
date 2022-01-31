
<?php include_once("../html/header.php");?>
<?php
include_once('../config/initdb.php');

session_start();

if(isset($_COOKIE['user'])) {
  $_SESSION['user'] = $_COOKIE['user'];
}

if(!isset($_SESSION['user'])) {
  die('Molimo vas da kliknete <a href="./login.php">ovde</a> da se ulogujete');
}
if(isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
}

if(!isset($_SESSION['user'])) {
    die('Molimo vas da kliknete <a href="./login.php">ovde</a> da se ulogujete');
}
?>

<div>
<div>
<form action="#" method="$_GET">
<fieldset>
    <legend>Unos vesti u bazu</legend>
<input type="text" name="naslov" id="naslov" placeholder="Unesi naslov članka" required><br>
<input type="text" name="autor" id="autor" placeholder="Unesi ime autora" required><br>
<input type="text" name="tekst" id="ukratko" placeholder="Unesi kraću verziju članka" required><br>
<input type="text" name="izvor" id="izvor" placeholder="Unesi izvor" required><br>
<input type="text" name="photo" id="photo" placeholder="Unesi putanju do fotografije" required><br>
<input type="text" name="caption" id="caption" placeholder="Unesi opis fotografije" required><br>
<input type="text" name="kategorija" id="kategorija" placeholder="Unesi kategoriju" required><br>
<input type="text" name="prioritet" id="prioritet" placeholder="Važno/ne toliko" required><br>
<textarea type="textarea" name="full_article" id="full" placeholder="Unesi ceo tekst članka" requiredcols="30" rows="10"></textarea><br>
<input type="submit" name="submit" value="Uploaduj članak" id="sbb">
</fieldset>
</form>
</div>
<?php 

if((isset($_GET['naslov']) && isset($_GET['autor']) && isset($_GET['tekst']) && isset($_GET['izvor'])
 && isset($_GET['photo']) && isset($_GET['caption']) && isset($_GET['kategorija'])
  && isset($_GET['prioritet']) && isset($_GET['full_article']))){
$connection->unesiVesti($_GET['naslov'],$_GET['autor'],$_GET['tekst'],$_GET['izvor'],$_GET['photo'],$_GET['caption'],$_GET['kategorija'], $_GET['prioritet'],$_GET['full_article']);}


?>
<form action="logout.php">
  <input type="submit" value="Logout" id="sbb">
</form>
 

<?php include_once("../html/footer.php")  ?>