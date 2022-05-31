<?php include('part/menu.php'); ?>

<section class="categories">
<div class="conteiner">
        <div class="button-box">
        <h2 class="submit-btn">Your cars</h2>
        </div>
        <?php
          if(isset($_SESSION['addCar'])){
            echo $_SESSION['addCar'];  
            unset($_SESSION['addCar']); //remove session
          }
        ?>
         </br>
        </br>
        </br>
        </br>
        <a href="addCar.php" class="submit-btn">Add car</a>
        <div class="form-box2">
        <table class="button-box2">
                <thead>
                <tr>
                    <th>carId</th>
                    <th>nameCar</th>
                    <th>img_name</th>
                    <th>categoryId</th>
                    <th>featured</th>
                    <th>active</th>
                    <th>descCar</th>
                    <th>price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM car";

                $res = mysqli_query($conn, $sql) or die(mysqli_error()); //save data in database
                if($res==TRUE){
                  $rows = mysqli_num_rows($res);

                  if($rows>0){
                      while($rows=mysqli_fetch_assoc($res)){
                        $carId=$rows['carId'];
                        $nameCar=$rows['nameCar'];
                        $img_name=$rows['img_name'];
                        $categoryId=$rows['categoryId'];
                        $featured=$rows['featured'];
                        $active=$rows['active'];
                        $descCar=$rows['descCar'];
                        $price=$rows['price'];
                ?>
                <tbody>
                    <tr class="active-row">
                        <td><?php echo $carId;?></td>
                        <td><?php echo $nameCar;?></td>
                        <td>
                            <?php 
                            if($img_name!=""){
                                ?>
                                <img src="<?php echo URL; ?>img/car/<?php echo $img_name; ?>" width="100px" >
      
                                <?php
                                
      
                              }else{
                                echo "<div class='submit-btn'>Image not found</div>";
                              }
                        ?>
                        </td>
                        <td><?php echo $categoryId;?></td>
                        <td><?php echo $featured;?></td>
                        <td><?php echo $active;?></td>
                        <td><?php echo $descCar;?></td>
                        <td><?php echo $price;?></td>
                        <td>
                        <a href="updateCar.php?carId=<?php echo $carId;?>" class="submit-btn2"> Update car</a>
                        <a href="deleteCar.php?carId=<?php echo $carId;?> & img_name=<?php echo $img_name; ?>" class="submit-btn3"> Delete car</a>
                        </td>
                    </tr>
                </tbody>

                <?php
                        }
                    }else{

                    }
                }else{
                   
                }

                 ?>

            </table>
            </div>
        <div class="clear">
        </div>
</div>
</section>
<?php include('part/social.php'); ?>
<?php include('part/footer.php'); ?>