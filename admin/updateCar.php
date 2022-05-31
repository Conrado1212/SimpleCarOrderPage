<?php include('part/menu.php'); ?>
<section class="categories">
    <div class="conteiner">
        <div class="form-box2">
        <div class="button-box">
        <h2 class="submit-btn2">UpdateCar</h2>
        </div>
        
        <?php
                if(isset($_GET['carId'])){

                
                $carId = $_GET['carId'];

                $sql ="SELECT * from car where carId=$carId";

                $res = mysqli_query($conn, $sql);

                    $rows = mysqli_num_rows($res);
                    if($rows==1){
                        $rows= mysqli_fetch_assoc($res);
                        $nameCar =$rows['nameCar'];
                        $img_name =$rows['img_name'];
                        $categoryId =$rows['categoryId'];
                        $featured =$rows['featured'];
                        $active =$rows['active'];
                        $descCar =$rows['descCar'];
                        $price =$rows['price'];


                    }else{
                    $_SESSION['updCar'] = '<div class="submit-btn2">No data found</div>';
                    header("location:".URL.'admin/cars.php');
                    }
            }else{
                
                header("location:".URL.'admin/cars.php');
            }
        ?>

        <form action="" method="POST" class="input-group" enctype="multipart/form-data">
              <input type="text" class="input-field" name="nameCar"  value="<?php echo $nameCar; ?>" placeholder="Your nameCar" >
              <h2 > Current img</h2> <td>
                  <?php 
                        if($img_name!= ""){
                          ?>
                          <img src="<?php echo URL; ?>img/car/<?php echo $img_name; ?>" width="100px" >

                          <?php
                          

                        }else{
                          echo "<div class='submit-btn'>Image not found</div>";
                        }
                        ?>  </td></br>
                        <input type="file" class="input-field" name="name"  >
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
                              echo  "<option value="0">No category found</option>";
                            }
                           
                        ?>
                    
                        </select>         
              <h2 > Featured</h2><input <?php if($featured == "on"){echo "checked";} ?> type="radio"  name="featured" values="on" >On
              <input <?php if($featured == "No"){echo "checked";} ?>  type="radio"  name="featured" values="off" >off 
              <h2 > Active</h2><input <?php if($active == "on"){echo "checked";} ?>  type="radio"  name="active" values="on" >On
              <input <?php if($active == "No"){echo "checked";} ?> type="radio"  name="active" values="off" >off 
              <textarea class="input-field" name="descCar"  value="<?php echo $descCar; ?>" placeholder="Your descCar" ></textarea>
              <input type="text" class="input-field" name="price"  value="<?php echo $price; ?>" placeholder="Your price" >
              </br></br> <button type="submit" name="submit" value="upd category" class="submit-btn2">Update category</button>

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
    $img_name=$_POST['img_name'];
    $categoryId=$_POST['categoryId'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];
    $descCar=$_POST['descCar'];
    $price=$_POST['price'];

    if(isset($_FILES['img_name']['name'])){

        $img_name=$_FILES['img_name']['name'];


        if($img_name!=""){


            $rename = end(explode('.', $img_name));


            $img_name = "Car".rand(000, 999).'.'.$rename;

            $source_path = $_FILES['img_name']['tmp_name'];

            $destination_path ="../img/car/".$name;

            $upload = move_uploaded_file($source_path, $destination_path);

            if($upload == false){
                $_SESSION['uploadUpd'] = '<div class="submit-btn">Upload failed</div>';
                header("location:".URL.'admin/cars.php');

                die();
            }
            
            if($img_name !=""){
                $remove_path = "../img/car/".$img_name;


                $remove = unlink($remove_path);
    
                if($remove==false){
                    $_SESSION['failedRemove'] = '<div class="submit-btn">Upload failed</div>';
                    header("location:".URL.'admin/cars.php');
    
                    die();
                }
            }
           
        }else{


            $img_name = $img_name;
        }


    }else{
        $img_name = $img_name;
    }


    $sql2 ="UPDATE  car set
    nameCar='$nameCar',
    categoryId = '$categoryId',
    featured = '$featured',
    active = '$active',
    descCar = '$descCar',
    price = '$price',
    where carId='$carId'
    ";


   
$res2 = mysqli_query($conn, $sql2); //save data in database

if($res2==TRUE){
    $_SESSION['updCar'] = '<div class="submit-btn2">Upd successfully </div>';

    header("location:".URL.'admin/category.php');
}else{
    $_SESSION['updCar'] = '<div class="submit-btn2">Upd failed</div>';

    header("location:".URL.'admin/updateCategory.php');
}


}

?>