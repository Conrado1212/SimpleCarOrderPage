<?php include('part/menu.php'); ?>
<section class="categories">
    <div class="conteiner">
        <div class="form-box2">
        <div class="button-box">
        <h2 class="submit-btn">AddCategory</h2>
        </div>
        
        <?php
          if(isset($_SESSION['addCat'])){
            echo $_SESSION['addCat'];  
            unset($_SESSION['addCat']); //remove session
          }
        ?>

        <form action="" method="POST" class="input-group" enctype="multipart/form-data">
              <input type="text" class="input-field" name="title" value="title" placeholder="Your title" required>
              <input type="file" class="input-field" name="name"  >
              <h2 > Featured</h2><input type="radio"  name="featured" values="YES" >Yes
              <input type="radio"  name="featured" values="No" >No 
              <h2 > Active</h2><input type="radio"  name="active" values="YES" >Yes
              <input type="radio"  name="active" values="No" >No 
        </br></br> <button type="submit" name="submit" value="Add category" class="submit-btn">Add Category</button>

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
    $title=$_POST['title'];
    


    if(isset($_POST['featured'])){
        $featured=$_POST['featured'];

    }else{
        $featured="No";
    }
   
    if(isset($_POST['active'])){
        $active=$_POST['active'];

    }else{
        $active="No";
    }
    
   if(isset($_FILES['name']['name'])){

    $name=$_FILES['name']['name'];

    if($name!=""){

    


            $rename = end(explode('.', $name));


            $name = "Car_category".rand(000, 999).'.'.$rename;

            $source_path = $_FILES['name']['tmp_name'];

            $destination_path ="../img/category/".$name;

            $upload = move_uploaded_file($source_path, $destination_path);

            if($upload == false){
                $_SESSION['upload'] = '<div class="submit-btn">Upload failed</div>';
                header("location:".URL.'admin/addCategory.php');

                die();
            }
}
    }else{
        $_SESSION['upload'] = '<div class="submit-btn">Upload successfully</div>';
        header("location:".URL.'admin/category.php');
    }

   }else{
        $name="";

   }

    $sql ="INSERT INTO category set
    title='$title',
    name = '$name',
    featured = '$featured',
    active = '$active'
    ";

    
    $res = mysqli_query($conn, $sql) or die(mysqli_error()); //save data in database

    if($res==TRUE){
        $_SESSION['addCat'] = '<div class="submit-btn">Added successfully</div>';

        header("location:".URL.'admin/category.php');
    }else{
        $_SESSION['addCat'] = '<div class="submit-btn">Added fialed</div>';

        header("location:".URL.'admin/addCategory.php');
    }


?>