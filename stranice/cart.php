

<?php include_once("../paths.php") ?>
<?php include_once($intdb);

session_start();
class Korpa {
    function __construct() {
        if(!isset($_SESSION['item_cart'])) { 
            $_SESSION['item_cart'] = [];
        }
    }

    function dodajUKorpu($id,$amount) {
        if(isset($_SESSION['item_cart'][$id])) {
            $_SESSION['item_cart'][$id] += $amount;
        } else {
            $_SESSION['item_cart'][$id] = $amount;
        }
    }

    function listajKorpu() {
        foreach ($_SESSION['item_cart'] as $id => $amount) {
            echo "<p class=\"cart-items\">Item $id has been added $amount times</p>";
        }
    }

    function isprazniKorpu() {
        $_SESSION['item_cart'] = [];
    }
}


$korpa = new Korpa();
?>