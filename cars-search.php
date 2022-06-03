<?php include('part/menu.php');?>
<section class="categories">
    <div class="conteiner">
        <?php

            $search = $_POST['search'];


        ?>
        <h2 >You are search for <a href="" class="submit-btn">"<?php echo $search;?></a></h2>
    <div class="clear">

</div>
</div>
</section>
<section class="menuCar">
    <div class="conteiner">
    <h2 class="submit-btn">Explore your car</h2>
   <?php


                        $search = $_POST['search'];

                $sql = "SELECT * from car where nameCar LIKE '%$search%' or descCar like '%$search%' ";

                $res = mysqli_query($conn,$sql);

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
                       <button onclick="location.href='buy.php'" type="submit" class="submit-btn">Buy</button>
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