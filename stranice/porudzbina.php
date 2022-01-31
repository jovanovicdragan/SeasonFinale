<?php include_once('../paths.php')?>
<?php  
    $metoda = $_SERVER['REQUEST_METHOD'];
    include_once($cart);
    $data = json_decode(file_get_contents("php://input"));
    if(isset($data->id)) {
        $korpa->dodajUKorpu($data->id,1);
        echo '{"response": "success"}';
    } else {
        echo '{"response":"error"}';
    }
?>