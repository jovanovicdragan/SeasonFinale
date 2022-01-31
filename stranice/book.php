<?php include_once("../paths.php") ?>
<?php include_once($header_path);?>
<?php include_once($intdb); session_start();?>
<br>
</div>
<div class="cart-header"> 
    <form method="POST" action="./isprazni.php">
        <input type="submit" value="Reset the cart" />
    </form>
    <form action="./bookstore.php">
        <input type="submit" name="cartsub" id="cartsubmit" value="Go back to bookstore">
    </form>   
    <form action="../admin/logout.php">
        <input type="submit" value="Logout" id="logout"/>
    </form>
</div>
<hr> 



<?php

if (isset($_GET["id"])) {
    $bas_ta_knjiga = $connection->preuzmiKnjigu($_GET["id"]);

        echo "
        <div class=\"row\">
            <div class=\"rightcolumn\">
                <div class=\"card\">
                    <img src=\".".$bas_ta_knjiga["cover"]."\" alt=\"knjiga\" style><hr>
                    <button class=\"bookprice\" type='button' onclick='naruci(". $bas_ta_knjiga['id'] .")'>Price: $".$bas_ta_knjiga['price']." - Add to Cart</button><br>

                    ";?>
                </div>
            </div>
            <div class="leftcolumn">
                <div class="card">
        <?php echo "<h1>".$bas_ta_knjiga["title"]."<h1>
                    <h2>".$bas_ta_knjiga["author"]."<h2>";
        
        $opis = explode(".", $bas_ta_knjiga['description']);
             foreach($opis as $paragraph1){
        echo "<p>$paragraph1</p>";}?>
                </div>
             </div>
        </div>     
        <?php      
        
}
?>
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
                        alert('Error!');
                    }
                });
            })
        }
    </script>
<?php include_once($footer) ?>