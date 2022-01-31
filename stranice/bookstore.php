<?php include_once("../paths.php") ?>
<?php include_once($header_path);?>
<?php include_once($intdb); session_start();?>

<div class="cart-header"> 
    <form method="POST" action="./isprazni.php">
        <input type="hidden" name="isprazni" />
        <input type="submit" value="Reset the cart" />
    </form>
    <form action="./logout.php">
        <input type="submit" value="Logout"/>
    </form>
</div>
<hr>

<?php 
//include_once('../config/initdb.php');
//include_once('./routes.php');
//session_start();
/* if(isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
}

if(!isset($_SESSION['user'])) {
    die('Molimo vas da kliknete <a href="./login.php">ovde</a> da se ulogujete');
}
?>*/
?>


    <?php 
    $knjige = $connection->sveKnjige();
    
    foreach($knjige as $knjiga) {
        echo "<div class=\"items\">
    <h3><a href=\"./book.php?id=".$knjiga[0]."\"><img src=\".".$knjiga[3]."\" alt=\"WoK2\" style=\"width:50%;\"></a></h3>
      <h1>".$knjiga[1]."</h1>
      <button type='button' onclick='naruci(". $knjiga[0] .")'>Price: $".$knjiga[4]." - Add to Cart</button><br>
      <button class=\"korpa\"><a href=\"./prikaz.php\">Cart</a></button>
       </div>
  </div>";
    }   

?>
<div></div>   

<?php include_once($footer) ?>
<script>
        const naruci = (_id) => {
            data = {
                id: _id
            };
            data = JSON.stringify(data);
            fetch('./porudzbina.php',{
                method: "POST",
                body: data,
            }).then((response) => {
                response.json().then((data)=> {
                    console.log(data);
                    if(data.response == 'success') {
                        alert('Item has been added to your cart!');
                    } else {
                        alert('error!');
                    }
                });
            })
        }
    </script>