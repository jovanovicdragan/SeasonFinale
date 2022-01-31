<?php include_once("../paths.php") ?>
<?php include_once($header_path);?>
<?php include_once($intdb); session_start();?>
<?php

$niz_showbiz = $connection->nizShowbiz();

echo "<div class=\"row\">
<div class=\"leftcolumn\">";

for ($i = 0; $i < count($niz_showbiz); $i++) {
    echo "
   
    <div class=\"card\">
        <h1><a href=\"../stranice/vesti.php?id=".$niz_showbiz[$i][0]."\">".$niz_showbiz[$i][1]."</a></h1>
      <h5><a href=\"./" . $niz_showbiz[$i][8] . ".php\">" . $niz_showbiz[$i][3] . "</a> - - -" . $niz_showbiz[$i][4] . "</h5>
      <div class=\"img-here\" style=\"height:200px;\"><img style=\"object-fit: cover;\" src='.". $niz_showbiz[$i][5] . "'; 
      alt=\"spacex\" width=\"100%\" height=\"100%\"></div>
      <p class=\"category-homepage\"><em>" . $niz_showbiz[$i][7] . "</em></p>";
      $para = explode(".", $niz_showbiz[$i][10]);
      foreach($para as $paragraph2){
      echo "<p class=\"category-homepage\">" . $paragraph2 . "</p>";}
      echo "</div>";
}

echo "</div>";

$najnovije = $connection->samoNaslovi();
//var_dump($najnovije);
echo "
<div class=\"rightcolumn\">
    <div class=\"card\">
      <h3><a href=\"#\">Latest news</a><hr style=\"height:5px; background-color:rgb(2, 11, 134);\"></h3>
      <a href=\"vesti.php?id=".$najnovije[0]."\">".$najnovije[1]."</a><hr>
      <a href=\"vesti.php?id=".$najnovije[2]."\">".$najnovije[3]."</a><hr>
      <a href=\"vesti.php?id=".$najnovije[4]."\">".$najnovije[5]."</a><hr>
      <a href=\"vesti.php?id=".$najnovije[6]."\">".$najnovije[7]."</a><hr>
      <a href=\"vesti.php?id=".$najnovije[8]."\">".$najnovije[9]."</a><hr><hr>
      
    </div>
    

    "
   
?> 

<div class="card">
  <div>
  <h3><a href="./stranice/bookstore.php">Check out our online bookstore</a><hr style="height:5px; background-color:rgb(2, 11, 134);"></h3>
    
<?php 
   $promocija = $connection->nizKnjiga();
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
    </div>

<?php include_once($footer) ?>