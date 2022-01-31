<?php include_once("../paths.php") ?>
<?php include_once($header_path);?>
<?php include_once($intdb); session_start();?>




<?php if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}


$no_of_records_per_page = 10;
$offset = ($pageno - 1) * $no_of_records_per_page;

$conn = mysqli_connect('localhost', 'root', '', 'glavna_baza');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}


echo "<div class=\"row\">
<div class=\"leftcolumn\">";


$total_pages_sql = "SELECT COUNT(*) FROM vesti";
$result = mysqli_query($conn, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM vesti LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($conn, $sql);?>

<div class="pagination" style="margin-top: 5%;">
    <div class="pagenav"><a href="?pageno=1">First page</a></div>
    <div class="pagenav">
        <a href="<?php if ($pageno <= 1) {
                        echo '#';
                    } else {
                        echo "?pageno=" . ($pageno - 1);
                    } ?>">Previous page</a>
    </div>
    <div class="pagenav">
        <a href="<?php if ($pageno >= $total_pages) {
                        echo '#';
                    } else {
                        echo "?pageno=" . ($pageno + 1);
                    } ?>">Next page</a>
    </div>
    <div class="pagenav">
        <a href="?pageno=<?php echo $total_pages; ?>">Last page</a>
    </div>
</div>
<?php
while ($row = mysqli_fetch_array($res_data)) {


    echo "              
                <div class=\"card\">
                    <h1>
                    <a href=\"../stranice/vesti.php?id=" . $row[0] . "\">" . $row[1] . "</a>
                    </h1>
                  <h5><a href=\"./" . $row[8] . ".php\">" . $row[3] . "</a> - - -" . $row[4] . "</h5>
                  <div class=\"img-here\" style=\"height:200px;\">
                  <img style=\"object-fit: cover;\" src='." . $row[6] . "'; alt=\"spacex\" width=\"100%\" height=\"100%\">
                  </div>
                  <p class=\"category-homepage\"><em>" . $row[7] . "</em></p>
                  <p class=\"article-homepage\"><a href=\"./" . $row[9] . ".php\">" . $row[9] . "</a></p>   
                </div><hr>                
            ";
}

?>
    <div class="pagination">
    <div class="pagenav"><a href="?pageno=1">First</a></div>
    <div class="pagenav">
        <a href="<?php if ($pageno <= 1) {
                        echo '#';
                    } else {
                        echo "?pageno=" . ($pageno - 1);
                    } ?>">Prev</a>
    </div>
    <div class="pagenav">
        <a href="<?php if ($pageno >= $total_pages) {
                        echo '#';
                    } else {
                        echo "?pageno=" . ($pageno + 1);
                    } ?>">Next</a>
    </div>
    <div class="pagenav">
        <a href="?pageno=<?php echo $total_pages; ?>">Last</a>
    </div>
</div>

<?php
$najnovije = $connection->samoNaslovi();
//var_dump($najnovije);
echo "</div> ";
echo " 


<div class=\"rightcolumn\">
    <div class=\"card\">
      <h3><a href=\"#\">Latest news</a><hr style=\"height:5px; background-color:rgb(2, 11, 134);\"></h3>
      <a href=\"../stranice/vesti.php?id=" . $najnovije[0] . "\">" . $najnovije[1] . "</a><hr>
      <a href=\"../stranice/vesti.php?id=" . $najnovije[2] . "\">" . $najnovije[3] . "</a><hr>
      <a href=\"../stranice/vesti.php?id=" . $najnovije[4] . "\">" . $najnovije[5] . "</a><hr>
      <a href=\"../stranice/vesti.php?id=" . $najnovije[6] . "\">" . $najnovije[7] . "</a><hr>
      <a href=\"../stranice/vesti.php?id=" . $najnovije[8] . "\">" . $najnovije[9] . "</a><hr><hr>
      
    </div>
    "
   
    ?> 
    
    <div class="card">
      <div>
      <h3><a href="./stranice/bookstore.php">Check out our online bookstore</a><hr style="height:5px; background-color:rgb(2, 11, 134);"></h3>
        
    <?php 
       $promocija = $connection->nizKnjiga();
        echo " <div class=\"promoted-book\">
        <h3><a href=\"./bookstore.php?id=".$promocija[0][0]."\"><img src=\"..".$promocija[0][3]."\" alt=\"WoK2\" style=\"width:60%\"></a></h3>
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
      <h3></h3>
      <iframe width="420" height="345" src="https://www.youtube.com/embed/NQwrIlZmXF0">
      </iframe>
    
    
    </div>
        </div>
        </div>

<?php include_once($footer) ?>