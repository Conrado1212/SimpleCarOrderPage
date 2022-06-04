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
        <form action="" method="POST" class="input-group" >
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
                    <input type="hidden" name="carId" value="<?php echo $carId;?>">
                    <p class="engine"><?php echo $descCar;?></p>
                    <p class="price"><?php echo $price;?></p>

                    <input type="hidden" name="price" value="<?php echo $price;?>">

                        <input type="number" name="quantity" class="resp-input" value="1" >
                    
                </div>
                
              </br></br> <h4 class="submit-btn"> Your userId</h4><input type="number" name="userId" class="input-field" value="1" >
              <button type="submit" name="submit" value="addBuy" class="submit-btn">Buy</button>

        </form>


<?php
        if(isset($_POST['submit'])){
            $carId=$_POST['carId'];
            $quantity=$_POST['quantity'];
            $total= $price * $quantity;
            $status= "Bought";
            $order_date = date("Y-m-d h:i:sa");
            $userId=$_POST['userId'];

            $sql2 ="INSERT INTO buy set
            carId='$carId',
            quantity = $quantity,
            total=$total,
            status = '$status',
            order_date = '$order_date',
            userId = '$userId'
            ";

           // echo $sql2; die();

            $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());


            if($res2==TRUE){
                $_SESSION['addBuy'] = '<div class="submit-btn">Buy successfully</div>';
        
                header("location:".URL);
            }else{
                $_SESSION['addBuy'] = '<div class="submit-btn">Buy fialed</div>';
        
                header("location:".URL);
            }

        }
            ?>
    </div>
    </div>


    <?php include('part/social.php'); ?>
    <?php include('part/footer.php'); ?>