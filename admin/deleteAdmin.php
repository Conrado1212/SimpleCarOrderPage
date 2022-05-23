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
              <input type="text" class="input-field" name="userID" placeholder="Your userID" required>
              <button type="submit" name="submit" value="Add admin" class="submit-btn">Delete admin</button>

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
    $userID=$_POST['userID'];


    $sql ="Delete user where userId
   
    ";

    
    $res = mysqli_query($conn, $sql) or die(mysqli_error()); //save data in database

    if($res==TRUE){
        $_SESSION['del'] = 'deleted successfully';

        header("location:".URL.'admin/manage.php');
    }else{
        $_SESSION['del'] = 'deleted failed';

        header("location:".URL.'admin/addAdmin.php');
    }

}
?>