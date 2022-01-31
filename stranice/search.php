<?php include_once("../paths.php") ?>
<?php include_once($header_path);?>
<?php include_once($intdb); session_start();?>

<?php

if (isset($_POST["submit"]) && (isset($_POST["seek"]))) {
    $search = $_POST["seek"];
    $result = $connection->pretraga($search);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo "

            <div class=\"rezultati\">
                <a href=\"./vesti.php?id=" . $row['id'] . "\">".$row['id']."  :  " . $row['naslov'] . "</a><hr>
            
                ";
        }
    } else {
        echo "Your search failed miserably";
    }
}echo "</div>       "


?>
<?php include_once($footer) ?>