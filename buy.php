<?php include('part/menu.php')
; ?>


<?php
        if(isset($_GET['carId'])){

            $carId= $_GET['carId'];


            $sql= "SELECT * from car where carId=$carId";


            $res=mysqli_query($conn,$sql);

            $rows = mysqli_num_rows($res);


            if($rows>0){

                $rows=mysqli_fetch_assoc($res);
                    $carId=$rows['carId'];
                    $nameCar=$rows['nameCar'];
                    $img_name=$rows['img_name'];
                    $categoryId=$rows['categoryId'];
                    $featured=$rows['featured'];
                    $active=$rows['active'];
                    $descCar=$rows['descCar'];
                    $price=$rows['price'];
            }else{
                echo "<div class='submit-btn'>Car not found</div>";
                header("location:".URL.'admin/index.php');
            }

        }else{
            header("location:".URL.'admin/index.php');
        }
?>
    <div class="conteiner">
        <div class="form-box">
            <div class="button-box">
                <h4 class="submit-btn">Fill this field to gey your dream car</h4>
            </div>
        <form action="" class="input-group" method="POST">
                <?php 
                
                if($img_name==""){
                    echo "<div class='submit-btn'>Not image found</div>";
                }else{
                    ?>
                    <div class="imgCar">
                    <img src="img/car/<?php echo $img_name;?> " alt="Golf 6 gtd"class="img-resp img-curve">
                 </div>
                 <?php
                }
                ?>
                

                 <div class="desc">
                    <h4><?php echo $nameCar;?></h4>
                    <p class="engine"><?php echo $descCar;?></p>
                    <p class="price"><?php echo $price;?></p>
                   
                        <input type="number" name="qty" class="resp-input" value="1" required>
                    
                </div>
                
              </br></br><input type="text" class="input-field" placeholder="Your  name" required>
              <input type="tel" class="input-field" placeholder="Your phone " required>
              <input type="email" class="input-field" placeholder="Your email" required>
              <textarea type="address" class="input-field" placeholder="Your address" required></textarea><br>
              <button type="submit" class="submit-btn">Buy</button>

        </form>


<?php
        if(isset($_POST['submit'])){


        }else{

        }

            ?>
    </div>
    </div>


    <?php include('part/social.php'); ?>
    <?php include('part/footer.php'); ?>