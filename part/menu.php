
<?php include('config/configuration.php');?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="css/fontello.css" rel="stylesheet" type="text/css" />
    <title>Car main page</title>
</head>
<body>
    <div class="nav">
    <nav>
        <div class="conteiner">
       <div class="logo">
       <a href="index.php">
           <img src="img/logo_ccexpress.png" alt="Car logo" class="img-resp">
           </a>
           <span style="color: #808080">Electric</span>OrderApp.com
       </div>
       <div class="menu">
        <form class="inputek" action="cars-search.php" method="POST">
            <input type="search"  class="input-field" name="search" placeholder="Type car ...." required>
            <button type="submit" class="submit-btn">Search</button>
        </form>
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="types.php">Types</a>
                </li>
                <li>
                    <a href="cars.php">Cars</a>
                </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>
            </ul>
       </div>
       
    
       <div class="clear">

       </div>
       <div class="contact">

       </div>
    </nav>
</div>
</div>