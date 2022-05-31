<?php include('part/menu.php'); ?>
<section class="categories">
    <div class="conteiner">
        <div class="form-box2">
        <div class="button-box">
        <h2 class="submit-btn">AddCar</h2>
        </div>
        
        <?php
          if(isset($_SESSION['addCar'])){
            echo $_SESSION['addCar'];  
            unset($_SESSION['addCar']); //remove session
          }
        ?>

        <form action="" method="POST" class="input-group" enctype="multipart/form-data">
              <input type="text" class="input-field" name="nameCar" value="nameCar" placeholder="Your nameCar" required>
              <input type="file" class="input-field" name="img_name"  >
              <input type="text" class="input-field" name="categoryId" value="categoryId" placeholder="Your categoryId" required>
              <h2 > Featured</h2><input type="radio"  name="featured" values="YES" >Yes
              <input type="radio"  name="featured" values="No" >No 
              <h2 > Active</h2><input type="radio"  name="active" values="YES" >Yes
              <input type="radio"  name="active" values="No" >No 
              <input type="text" class="input-field" name="descCar" value="descCar" placeholder="Your descCar" required>
              <input type="text" class="input-field" name="price" value="price" placeholder="Your price" required>
        </br></br> <button type="submit" name="submit" value="Add car" class="submit-btn">Add car</button>

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
    $nameCar=$_POST['nameCar'];
    $categoryId=$_POST['categoryId'];
    $descCar=$_POST['descCar'];
    $price=$_POST['price'];
    
    


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
    
   if(isset($_FILES['img_name']['name'])){

    $img_name=$_FILES['img_name']['name'];

    if($img_name!=""){

    


            $rename = end(explode('.', $img_name));


            $img_name = "Car".rand(000, 999).'.'.$rename;

            $source_path = $_FILES['img_name']['tmp_name'];

            $destination_path ="../img/car/".$name;

            $upload = move_uploaded_file($source_path, $destination_path);

            if($upload == false){
                $_SESSION['upload'] = '<div class="submit-btn">Upload failed</div>';
                header("location:".URL.'admin/addCar.php');

                die();
            }
}
    }else{
        $_SESSION['upload'] = '<div class="submit-btn">Upload successfully</div>';
        header("location:".URL.'admin/car.php');
    }

   }else{
        $img_name="";

   }

    $sql ="INSERT INTO car set
    nameCar='$nameCar',
    img_name = '$img_name',
    categoryId='$categoryId',
    featured = '$featured',
    active = '$active',
    descCar = '$descCar',
    price = '$price'
    ";

    
    $res = mysqli_query($conn, $sql) or die(mysqli_error()); //save data in database

    if($res==TRUE){
        $_SESSION['addCar'] = '<div class="submit-btn">Added successfully</div>';

        header("location:".URL.'admin/car.php');
    }else{
        $_SESSION['addCar'] = '<div class="submit-btn">Added fialed</div>';

        header("location:".URL.'admin/addCar.php');
    }


?>