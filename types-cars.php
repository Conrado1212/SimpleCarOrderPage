<?php include('part/menu.php');?>
<section class="categories">
    <div class="conteiner">
    <?php

if(isset($_GET['categoryId'])){
    $categoryId = $_GET['categoryId'];

    $sql = "SELECT title from category where categoryId=$categoryId; ";

    $res = mysqli_query($conn,$sql);

    $rows = mysqli_fetch_assoc($res);


    $title=$rows['title'];

}else{
    $_SESSION['category'] = '<div class="submit-btn">Not found category</div>';
    header("location:".URL);
}

        
?>
        <h2 >You are search by category <a href="" class="submit-btn">"<?php echo $title;?>"</a></h2>
    <div class="clear">

</div>
</div>
</section>
<section class="menuCar">
    <div class="conteiner">
    <h2 class="submit-btn">Explore your car</h2>
   <?php


                

                $sql2 = "SELECT * from car where categoryId=$categoryId ";

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