<?php include('part/menu.php'); ?>
<section class="categories">
    <div class="conteiner">
        <div class="form-box2">
        <div class="button-box">
        <h2 class="submit-btn4">Change password</h2>
        </div>
        
        <?php
                if(isset($_GET['userID'])){
                    $userId = $_GET['userId'];

                }
        ?>

        <form action="" method="POST" class="input-group">
        <h2>Old password</h2></br><input type="password" class="input-field" name="oldPassword"  placeholder="Your old password" >
              <h2 >New password</h2><input type="password" class="input-field" name="newPassword"  placeholder="Your new password" ></br>
              <h2 >Confirm password</h2><input type="password" class="input-field" name="ConPassword"  placeholder="Confirm new password" ></br>
              <button type="submit" name="submit" value="change password" class="submit-btn4">Change password</button>

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
    $oldPassword=md5($_POST['oldPassword']); //encrypting password
    $newPassword=md5($_POST['newPassword']);
    $ConPassword=md5($_POST['ConPassword']);


    
    $sql ="SELECT * from user where userId=$userId and password='$oldPassword'";
   
$res = mysqli_query($conn, $sql); //save data in database

if($res==TRUE){


    $rows = mysqli_num_rows($res);


    if($rows==1){
        

        if($newPassword == $ConPassword){
            $sql2 ="UPDATE user set 
            password='$newPassword'
            where useriId='$userId
            ";


            $res2 = mysqli_query($conn, $sql2); //save data in database

            if($res==TRUE){
                $_SESSION['change'] = '<div class="submit-btn4">Change success</div>';
                header("location:".URL.'admin/manage.php');
            }else{
                $_SESSION['change'] = '<div class="submit-btn4">Change failed</div>';
                 header("location:".URL.'admin/manage.php');
            }

        }else{
            $_SESSION['change'] = '<div class="submit-btn4">Change failed wrong password</div>';
        header("location:".URL.'admin/manage.php');
        }

        $_SESSION['change'] = '<div class="submit-btn4">Change success</div>';
        header("location:".URL.'admin/manage.php');

    }else{

        $_SESSION['change'] = '<div class="submit-btn4">Change failed</div>';
        header("location:".URL.'admin/manage.php');
    }
}

?>