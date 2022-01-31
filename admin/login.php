<?php include_once('../paths.php')?>
<?php include_once($header_path);?>
<?php include_once($intdb)?>;
<?php 
session_start();
//ako korisnik vec postoji u sesiji
if(isset($_SESSION['user'])) {
    header('Location: adminform.php');
}

//ako korisnik vec postoji u cookies
if(isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
    header('Location: ./index.php');
}
//ako se korisnik upravo ulogovao
if(isset($_POST['user']) && isset($_POST['pass'])) {
    if($connection->proveriKorisnika($_POST['user'],$_POST['pass'])) {
        //ako je checkiran keep me logged in
        if(isset($_POST['keep'])) {
            setcookie("user",$_POST['user'],time()+60*60*24);
        }
        $_SESSION['user'] = $_POST['user'];
        header('Location: ../admin/adminform.php');
    }
    $greska = true;
}
?>
<div form-admin>
    <form method="POST" action="./login.php">
        <fieldset id="adminlogin">
            <legend>Admin login</legend>
        <label for="user" >Username: </label>
        <input type="email" id="user" name="user" required />
        <br>
        <label for="pass" >Password: </label>
        <input type="password" id="pass" name="pass"  required/>
        <br>
        <label for="keep" >Keep me logged in: </label>
        <input type="checkbox" name="keep" id="keep" /> 
        <br> 
        <input type="submit" value="Login" id="sbb" />
        </fieldset>
    </form>
</div>   
    <?php if(isset($greska) && $greska) :?>
        <div id='greska'>Wrong data entered.</div>
    <?php endif; ?>

    

    <?php include_once("../html/footer.php") ?>