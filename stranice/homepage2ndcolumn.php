<?php
$najnovije = $connection->samoNaslovi();
//var_dump($najnovije);
echo "
<div class=\"rightcolumn\">
    <div class=\"card\">
      <h3><a href=\"./stranice/news.php\">Latest news</a><hr style=\"height:5px; background-color:rgb(2, 11, 134);\"></h3>
      <a href=\"./stranice/vesti.php?id=" . $najnovije[0] . "\">" . $najnovije[1] . "</a><hr>
      <a href=\"./stranice/vesti.php?id=" . $najnovije[2] . "\">" . $najnovije[3] . "</a><hr>
      <a href=\"./stranice/vesti.php?id=" . $najnovije[4] . "\">" . $najnovije[5] . "</a><hr>
      <a href=\"./stranice/vesti.php?id=" . $najnovije[6] . "\">" . $najnovije[7] . "</a><hr>
      <a href=\"./stranice/vesti.php?id=" . $najnovije[8] . "\">" . $najnovije[9] . "</a><hr style=\"height:5px; background-color:rgb(2, 11, 134);\">
      
    </div>";

$promocija = $connection->nizKnjiga();

?>  
<div class="card">
  <div>
  <h3><a href="./stranice/bookstore.php">Check out our online bookstore</a><hr style="height:5px; background-color:rgb(2, 11, 134);"></h3>
    <?php 
  
    echo " <div class=\"promoted-book\">
    <h3><a href=\"./stranice/bookstore.php?id=".$promocija[0][0]."\"><img src=\"".$promocija[0][3]."\" alt=\"WoK2\" style=\"width:60%\"></a></h3>
      <h1>".$promocija[0][1]."</h1>
      <p><form action=\"./stranice/bookstore.php\">
      <input type=\"submit\" value=\"Price: $".$promocija[0][4]." - Add to Cart\">
    </form></p>
    </div>
  </div>
  <hr style=\"height:5px; background-color:rgb(2, 11, 134);\">";
?>

<div class>  
<iframe width="420" height="25"src="https://stream.daskoimladja.com:9000/stream" frameborder="5"></iframe><br>
  <div class="rsscard">
<?php include_once('RSS.php')?>
</div><br>

</div>
<hr style="height:5px; background-color:rgb(2, 11, 134);">
<div class="card">
  <h3></h3>
  <iframe width="420" height="345" src="https://www.youtube.com/embed/NQwrIlZmXF0">
</iframe>
</div>
  
</div>
</div>
</div>