<?php include_once('./paths.php');?>
<?php include_once($intdb);?>
<?php 
  session_start();

  $vesti = $connection->triNajvaznijeVesti();
    echo "
    
    <div class=\"row\">

        <div class=\"leftcolumn\">

        <div class=\"card\">

        <h1><a href=\"./stranice/vesti.php?id=".$vesti[0][0]."\">".$vesti[0][1]."</a></h1>

      <h5><a href=\"./stranice/".$vesti[0][9].".php\">".$vesti[0][9]."</a> - - -".$vesti[0][5]."</h5>

      <div class=\"img-here\" style=\"height:200px;\"><img style=\"object-fit: contain;\" src='".$vesti[0][6]."'; alt=\"spacex\" width=\"100%\" height=\"100%\"></div>

      
      <p class=\"category-homepage\"><em>".$vesti[0][7]."</em></p>
      
      <p class=\"article-homepage\">".$vesti[0][3]."</p>   

    </div><hr>


    <div class=\"card\">
      <h1><a href=\"./stranice/vesti.php?id=".$vesti[1][0]."\">".$vesti[1][1]."</a></h1>
      <h5><a href=\"./stranice/".$vesti[1][9].".php\">".$vesti[1][9]."</a> - - - ".$vesti[1][5]."</h5>
      <div class=\"img-here\" style=\"height:200px;\"><img style=\"object-fit: scale-down;\" src='".$vesti[1][6]."'; alt=\"spacex\" width=\"100%\" height=\"100%\"></div>
      <p class=\"category-homepage\"> ".$vesti[1][7]."</p>
      <p class=\"article-homepage\">".$vesti[1][3]."</p>
      <div class=\"card\">  
   </div><hr>
  </div>


  <div class=\"card\">
        <h1><a href=\"./stranice/vesti.php?id=".$vesti[2][0]."\">".$vesti[2][1]."</a></h1>
        <h5><a href=\"./stranice/".$vesti[2][9].".php\">".$vesti[2][9]."</a> - - - ".$vesti[2][5]."</h5>
        <div class=\"img-here\" style=\"height:200px;\"><img style=\"object-fit: scale-down;\" src='".$vesti[2][6]."'; alt=\"spacex\" width=\"100%\" height=\"100%\"></div>
        <p class=\"category-homepage\"> ".$vesti[2][7]."</p>
        <p class=\"article-homepage\">".$vesti[2][3]."</p>
        <div class=\"card\">  <hr>
</div>
</div>
 </div>
  ";
  ?>
  


  