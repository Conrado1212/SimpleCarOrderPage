<?php include('../config/configuration.php'); ?>
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
        <?php
          if(isset($_SESSION['login'])){
            echo $_SESSION['login'];  
            unset($_SESSION['login']); //remove session
          }

          if(isset($_SESSION['loginCheck'])){
            echo $_SESSION['loginCheck'];  
            unset($_SESSION['loginCheck']); //remove session
          }
          ?>
        <form action="" method="POST" class="input-group">
        </br><input type="text" class="input-field" name="userName"  placeholder="Your userName" >
             <input type="password" class="input-field" name="password"  placeholder="Your password" ></br></br>
              <button type="submit" name="submit" value="login" class="submit-btn">Log in</button>

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
if(isset($_POST['submit'])){
    //$userName=$_POST['userName']; 
    $userName=mysqli_real_escape_string($conn,$_POST['userName']); 
    //$password=md5($_POST['password']); 
    $password1 = md5($_POST['password']);
    $password=mysqli_real_escape_string($conn,$password1); 


    $sql ="SELECT * from  user 
    where userName='$userName' and password='$password'
    ";

    
    $res = mysqli_query($conn, $sql);

    $rows = mysqli_num_rows($res);

    if($rows==1){
        
        $_SESSION['login'] = '<div class="submit-btn">Login successfully </div>';

        $_SESSION['user'] = $userName; //check log in or log out


        header("location:".URL.'admin/');
    }else{

        $_SESSION['login'] = '<div class="submit-btn">Login failed </div>';

        header("location:".URL.'admin/login.php');

    }

}
?>