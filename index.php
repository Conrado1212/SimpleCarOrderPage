<?php
include('part/menu.php');
?>


<section class="categories">
<?php
          if(isset($_SESSION['addBuy'])){
            echo $_SESSION['addBuy'];  
            unset($_SESSION['addBuy']); //remove session
          }
          ?>
    <div class="conteiner">
        <h2 >Cars menu</h2>
        <?php
            $sql = "SELECT * from category where active='on' and featured ='on' limit 3";

            $res = mysqli_query($conn,$sql);

            $rows = mysqli_num_rows($res);

            if($rows>0){
                while($rows=mysqli_fetch_assoc($res)){
                    $categoryId=$rows['categoryId'];
                    $title=$rows['title'];
                    $name=$rows['name'];
                    ?>
                    <a href="types-cars.php?categoryId=<?php echo $categoryId;?>">
                    <div class="box">
                        <?php 
                        if($name==""){
                            echo "<div class='submit-btn'>Not image found</div>";
                        }else{
                            ?>
                                <img src="<?php echo URL; ?>img/category/<?php echo $name;?>" alt="hachback" class="img-resp img-curve">
                            <?php
                        }
                        ?>
                     <h3><?php echo $title ;?></h3>
                    </div>
                    </a>

                    <?php
                }
            }else{
             echo  "<div class='submit-btn'>Error no data</div>";
            }
        ?>
        <div class="clear">

        </div>
</div>
</section>

<section class="menuCar">
    <div class="conteiner">
       
    <h2 class="submit-btn">Explore your car</h2>
   
            <?php


            $sql2 = "SELECT * from car where active='on' and featured= 'on' limit 6";

            $res2 = mysqli_query($conn,$sql2);

            $rows2 = mysqli_num_rows($res2);

            if($rows2>0){
                while($rows2=mysqli_fetch_assoc($res2)){

                    $carId=$rows2['carId'];
                    $nameCar=$rows2['nameCar'];
                    $img_name=$rows2['img_name'];
                    $categoryId=$rows2['categoryId'];
                    $featured=$rows2['featured'];
                    $active=$rows2['active'];
                    $descCar=$rows2['descCar'];
                    $price=$rows2['price'];


                    ?>
                    <div class="menuCar-box">
                            <div class="imgCar">
                                <?php
                                    if($img_name==""){

                                        echo "<div class='submit-btn'>Not image found</div>";

                                    }else{
                                        ?>
                                            <img src="img/car/<?php echo $img_name;?>" alt="Golf 6 gtd"class="img-resp img-curve">
                                        <?php
                                    }

                                ?>
                                
                            </div>
                            <div class="desc">
                                <h4><?php echo $nameCar ;?></h4>
                                <p class="engine"><?php echo $descCar ;?></p>
                                <p class="price"><?php echo $price ;?></p>
                                <button onclick="location.href='buy.php?carId=<?php echo $carId?>'" type="submit" class="submit-btn">Buy</button>
                            </div>
                        </div>
                       
                    <?php
                }

            }else{
                    echo "<div class='submit-btn'>No data found</div>";
            }
            ?>



   
    
    <div class="clear">

    </div>
</div>
</section>
<?php include('part/social.php');?>
<?php include('part/footer.php');?>