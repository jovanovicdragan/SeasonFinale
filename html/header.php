<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get the latest news</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/SeasonFInale/style/style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ultra&display=swap" rel="stylesheet"> <!-- Font za logo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <!-- Font za naslove -->
    <!-- za tekstove-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <!-- -->  
    <!-- arrow up -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- -->
</head>
<html>
<body>
    <hr style="height:5px; background-color:rgb(2, 11, 134);">
    <div class="header">
        <div class="logo"><a id="logo" href="/SeasonFInale/index.php">Sometown Post</a></div>
        <div class="navbar"><a href="/SeasonFInale/index.php">Home</a></div>
        <div class="navbar"><a href="/SeasonFInale/stranice/news.php">News</a></div>
        <div class="navbar"><a href="/SeasonFInale/stranice/columns.php">Columns</a></div>
        <div class="navbar"><a href="/SeasonFInale/stranice/world.php">World</a></div>
        <div class="navbar"><a href="/SeasonFInale/stranice/showbiz.php">Showbiz</a></div>
        <div class="navbar"><a href="/SeasonFInale/stranice/sports.php">Sports</a></div>
        <a id='top'></a>
    </div>
    <div class="datum-vreme">
        <?php date_default_timezone_set('Europe/Belgrade');
        echo date("F j, Y, g:i a") ?>
    </div><hr style="height:5px; background-color:rgb(2, 11, 134);">
    <div class="my-search">
        <form action="../..//SeasonFinale/stranice/search.php" method="post">
            <input type="text" name="seek" class="my-search" placeholder="<--Your search here -->" required>
            <input type="submit" name="submit" class="my-search" id="search" >
        </form>
        <form id="admnlgn" action='/SeasonFinale/admin/login.php' method="POST">
        <input type="submit" value="Admin login" />
    </form>
    </div>
    
    <hr style="height:5px; background-color:rgb(2, 11, 134);">
    <a href='#bottom'><i class="fa fa-angle-double-down" style="font-size:48px;color: rgb(36, 47, 91);"></i></i></a>
</div>