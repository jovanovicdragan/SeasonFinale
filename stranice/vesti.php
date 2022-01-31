<?php include_once("../paths.php") ?>
<?php include_once($header_path);?>
<?php include_once($intdb); session_start();
  
if (isset($_GET["id"])) {
  $cela_vest = $connection->preuzmiVest($_GET["id"]);
  //$clanak = explode(".", $cela_vest['full_article']);
  //foreach($clanak as $paragraph){
  //echo "<p>$paragraph</p>";
  // ovo je bio pokusaj sredjivanja paragrafa u clanku, za sada nista od toga. }
  //var_dump($cela_vest);

  echo "
  <div class=\"row\">
  <div class=\"leftcolumn\">
  <div class=\"cela-strana-vest\">
  <div class=\"naslov\"><h1>" . $cela_vest['naslov'] . "</h1></div>
  <div class=\"fotka-caption\">
  <img id=\"fotka-caption\"src=\"." . $cela_vest['photo'] . " \" alt=\"nekaslika\" width=\"100%\" height=\"auto\">
  <div><em>" . $cela_vest['caption'] . "</em></div>
  </div>
  <div class=\"generalije\"><a href=\"./" . $cela_vest['kategorija'] . ".php\">" . $cela_vest['kategorija'] . "</a> - Autor:" . $cela_vest['autor'] . "- Izvor:" . $cela_vest['izvor'] . " - Postavljeno:" . $cela_vest['postavljeno'] . "</div>
  ";
  echo "<div class=\"cela-vest\">";
  $clanak = explode(".", $cela_vest['full_article']);
  foreach($clanak as $paragraph){
  echo "<p class=\"cela-vest\">$paragraph</p>";}
  echo "<hr>";
  echo "</div>
  </div>
  </div>
  ";
}
$najnovije = $connection->samoNaslovi();
//var_dump($najnovije);
echo "
<div class=\"rightcolumn\">
    <div class=\"card\">
      <h3><a href=\"#\">Latest news</a><hr style=\"height:5px; background-color:rgb(2, 11, 134);\"></h3>
      <a href=\"vesti.php?id=" . $najnovije[0] . "\">" . $najnovije[1] . "</a><hr>
      <a href=\"vesti.php?id=" . $najnovije[2] . "\">" . $najnovije[3] . "</a><hr>
      <a href=\"vesti.php?id=" . $najnovije[4] . "\">" . $najnovije[5] . "</a><hr>
      <a href=\"vesti.php?id=" . $najnovije[6] . "\">" . $najnovije[7] . "</a><hr>
      <a href=\"vesti.php?id=" . $najnovije[8] . "\">" . $najnovije[9] . "</a><hr><hr>
      
    </div>

   ";
 

$promocija = $connection->nizKnjiga();
?> 

<div class="card">
  <div>
  <h3><a href="./stranice/bookstore.php">Check out our online bookstore</a><hr style="height:5px; background-color:rgb(2, 11, 134);"></h3>
    <?php 
  
    echo " <div class=\"promoted-book\">
    <h3><a href=\"./bookstore.php?id=".$promocija[0][0]."\"><img src=\".".$promocija[0][3]."\" alt=\"WoK2\" style=\"width:60%\"></a></h3>
      <h1>".$promocija[0][1]."</h1>
      <p><form action=\"./bookstore.php\">
      <input type=\"submit\" value=\"Price: $".$promocija[0][4]." - Add to Cart\">
    </form></p>
    </div>
  </div>
  <hr style=\"height:5px; background-color:rgb(2, 11, 134);\">";
?>

  <div class="img-here"><a href="#">Couple of more links</a></div><br>
  <div class="img-here"><a href="#">Couple of more links</a></div><br>

</div>
<hr style="height:5px; background-color:rgb(2, 11, 134);">
<div class="card">
  <iframe width="420" height="345" src="https://www.youtube.com/embed/NQwrIlZmXF0">
  </iframe>
  <iframe width="420" height="399" src="https://www.youtube.com/embed/eKB6r19oKuQ" title="YouTube video player"></iframe>

</div>
</div>
</div>
<?php include_once($footer) ?>