<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="../css/fontello.css" rel="stylesheet" type="text/css" />
    <title>Login</title>
</head>
<body>
<div class="nav">
    <nav>
        <div class="conteiner">
       <div class="logo">
           <img src="../img/logo_ccexpress.png" alt="Car logo" class="img-resp">
           <span style="color: #808080">Electric</span>OrderApp.com
       </div>
       <div class="clear">

       </div>
       <div class="contact">

       </div>
       </nav>
       <section class="categories">
    <div class="conteiner">
        <div class="form-box2">
        <div class="button-box">
        <h2 class="submit-btn">Login</h2>
        </div>
        
        <form action="" method="POST" class="input-group">
        </br><input type="text" class="input-field" name="userName"  placeholder="Your userName" >
             <input type="password" class="input-field" name="password"  placeholder="Your password" ></br></br>
              <button type="submit" name="submit" value="change password" class="submit-btn">Log in</button>

        </form>
            </div>
        <div class="clear">
        </div>
</div>
</section>
</body>
</html>
<?php include('part/social.php'); ?>
<?php include('part/footer.php'); ?>
<?php