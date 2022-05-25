<?php include('part/menu.php'); ?>
<section class="categories">
    <div class="conteiner">
        <div class="form-box2">
        <div class="button-box">
        <h2 class="submit-btn2">UpdateAdmin</h2>
        </div>
        
        <?php

if(isset($_SESSION['upd'])){
    echo $_SESSION['upd'];  
    unset($_SESSION['upd']); //remove session
  }


                $userId = $_GET['userId'];

                $sql ="SELECT * from user ";

                $res = mysqli_query($conn, $sql);


                if($res==TRUE){

                    $rows = mysqli_num_rows($res);
                    if($rows==1){
                        $rows= mysqli_fetch_assoc($res);

                        $userName =$rows['userName'];
                        $password =$rows['password'];
                        $fullName =$rows['fullName'];
                        $email =$rows['email'];
                        $phone =$rows['phone'];
                        $address =$rows['address'];
                    }
                  
                }else{
                   
                    header("location:".URL.'admin/manage.php');
                }
        ?>

        <form action="" method="POST" class="input-group">
              <input type="text" class="input-field" name="userName" value="<?php echo $userName;?>" placeholder="Your userName" required>
              <input type="password" class="input-field" name="password" value="<?php echo $password;?>" placeholder="Your password" required>
              <input type="text" class="input-field" name="fullName" value="<?php echo $fullName;?>" placeholder="Your fullName" required>
              <input type="email" class="input-field" name="email" value="<?php echo $email;?>" placeholder="Your email" required>
              <input type="tel" class="input-field" name="phone" value="<?php echo $phone;?>" placeholder="Your phone" required>
              <textarea type="address" class="input-field" name="address" value="<?php echo $address;?>" placeholder="Your address" required></textarea><br>
              <button type="submit" name="submit" value="upd admin" class="submit-btn2">Update admin</button>

        </form>
            </div>
        <div class="clear">
        </div>
</div>
</section>
<?php include('part/social.php'); ?>
<?php include('part/footer.php'); ?>
<?php
if(isset($_POST['submit'])){
    $userName=$_POST['userName'];
    $password=md5($_POST['password']); //encrypting password
    $fullName=$_POST['fullName'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

    $sql ="UPDATE  user set
    userName='$userName',
    password = '$password',
    fullName = '$fullName',
    email = '$email',
    phone = '$phone',
    address = '$address' 
    where userid='$userId'
    ";


   
$res = mysqli_query($conn, $sql); //save data in database

if($res==TRUE){
    $_SESSION['upd'] = '<div class="submit-btn2">Upd successfully </div>';

    header("location:".URL.'admin/manage.php');
}else{
    $_SESSION['upd'] = '<div class="submit-btn2">Upd failed</div>';

    header("location:".URL.'admin/updateAdmin.php');
}


}

?>