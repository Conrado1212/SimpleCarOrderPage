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
</br>
        <form action="" method="POST" class="input-group" enctype="multipart/form-data">
              <input type="text" class="input-field" name="nameCar"  placeholder="Your nameCar" required>
              <input type="file" class="input-field" name="img_name"  >
              <h2 > CategoryId</h2><select name ="categoryId">
                  <?php

                    $sql = "SELECT * from category where active='on'";

                    $res = mysqli_query($conn, $sql) or die(mysqli_error()); 


                    $rows = mysqli_num_rows($res);


                    if($rows>0){
                            while($rows=mysqli_fetch_assoc($res)){
                                $categoryId=$rows['categoryId'];
                                $title=$rows['title'];

                                ?>
                                    <option value="<?php echo $categoryId ;?>"><?php echo $title; ?></option>
                                    
                                <?php

                            }
                        }else{
                            ?>
                             <option value="0">No category found</option>
                            <?php

                        }
                        
                  ?>
                 </select></br>
                <h2>Featured</h2><input type="radio"  name="featured" values="YES" >Yes
              <input type="radio"  name="featured" values="No" >No 
              <h2>Active</h2><input type="radio"  name="active" values="YES" >Yes
              <input type="radio"  name="active" values="No" >No 
        </br><textarea  class="input-field" name="descCar" placeholder="Your descCar" ></textarea><br>
              <input type="text" class="input-field" name="price"  placeholder="Your price" >
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

            $destination_path ="../img/car/".$img_name;

            $upload = move_uploaded_file($source_path, $destination_path);

            if($upload == false){
                $_SESSION['upload'] = '<div class="submit-btn">Upload failed</div>';
                header("location:".URL.'admin/addCar.php');

                die();
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

}
?>