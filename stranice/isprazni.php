<?php include_once('../paths.php');?>
<?php require_once($cart); 
if(isset($_POST['isprazni'])) {
    $korpa->isprazniKorpu();
    header('Location:./bookstore.php');
}
?>