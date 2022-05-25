<?php include('part/menu.php'); ?>
<section class="categories">
    <div class="conteiner">
        <div class="form-box2">
        <div class="button-box">
        <h2 class="submit-btn">AddAdmin</h2>
        </div>
        
        <?php
          if(isset($_SESSION['add'])){
            echo $_SESSION['add'];  
            unset($_SESSION['add']); //remove session
          }
        ?>

        <form action="" method="POST" class="input-group">
              <input type="text" class="input-field" name="userName" placeholder="Your userName" required>
              <input type="password" class="input-field" name="password" placeholder="Your password" required>
              <input type="text" class="input-field" name="fullName" placeholder="Your fullName" required>
              <input type="email" class="input-field" name="email" placeholder="Your email" required>
              <input type="tel" class="input-field" name="phone" placeholder="Your phone" required>
              <textarea type="address" class="input-field" name="address" placeholder="Your address" required></textarea><br>
              <button type="submit" name="submit" value="Add admin" class="submit-btn">Add admin</button>

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


    $sql ="INSERT INTO user set
    userName='$userName',
    password = '$password',
    fullName = '$fullName',
    email = '$email',
    phone = '$phone',
    address = '$address' 
    ";

    
    $res = mysqli_query($conn, $sql) or die(mysqli_error()); //save data in database

    if($res==TRUE){
        $_SESSION['add'] = '<div class="submit-btn">Added successfully</div>';

        header("location:".URL.'admin/manage.php');
    }else{
        $_SESSION['add'] = '<div class="submit-btn">Added fialed</div>';

        header("location:".URL.'admin/addAdmin.php');
    }

}
?>