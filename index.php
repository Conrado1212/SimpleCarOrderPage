<?php
include('part/menu.php');
?>
<section class="categories">
    <div class="conteiner">
        <h2 >Cars menu</h2>
        <?php
            $sql = "SELECT * from category ";

            $res = mysqli_query($conn,$sql);

            $rows = mysqli_num_rows($res);

            if($rows>0){
                while($rows=mysqli_fetch_assoc($res)){
                    $categoryId=$rows['categoryId'];
                    $title=$rows['title'];
                    $name=$rows['name'];
                    ?>
                    <a href="types.html">
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
   
    <div class="menuCar-box">
        <div class="imgCar">
            <img src="img/gtd.png" alt="Golf 6 gtd"class="img-resp img-curve">
        </div>
        <div class="desc">
            <h4>Golf 6 GTD</h4>
            <p class="engine">2.0 tdi 170km common rail</p>
            <p class="price">Only for 40k PLN</p>
            <button onclick="location.href='buy.html'" type="submit" class="submit-btn">Buy</button>
        </div>
    </div>
    <div class="menuCar-box">
      <div class="imgCar">
        <img src="img/a3.png" alt="A3"class="img-resp img-curve">
        </div>
        <div class="desc">
            <h4>Audi a3 S-line</h4>
            <p class="engine">2.0 tdi 170km common rail</p>
            <p  class="price">Only for 38k PLN</p>
            <button onclick="location.href='buy.html'" type="submit" class="submit-btn">Buy</button>
        </div>
    </div>
    <div class="menuCar-box">
        <div class="imgCar">
            <img src="img/a5.png" alt="A5"class="img-resp img-curve">
        </div>
        <div class="desc">
            <h4>Audi a5 S-line</h4>
            <p class="engine">3.0 tdi common rail 240kkm</p>
            <p  class="price">Only for 50k PLN</p>
            <button onclick="location.href='buy.html'" type="submit" class="submit-btn">Buy</button>
        </div>
    </div>
    <div class="menuCar-box">
        <div class="imgCar">
            <img src="img/e92.png" alt="e92"class="img-resp img-curve">
        </div>
        <div class="desc">
            <h4>BMW e92 </h4>
            <p class="engine">3.0 diesel 231km</p>
            <p  class="price">Only for 45k pln</p>
            <button onclick="location.href='buy.html'" type="submit" class="submit-btn">Buy</button>
        </div>
    </div>
    <div class="menuCar-box">
        <div class="imgCar">
            <img src="img/f30.png" alt="f30"class="img-resp img-curve">
        </div>
        <div class="desc">
            <h4>BMW f30</h4>
            <p class="engine">3.0 diesel 231km</p>
            <p  class="price">Only for 42k pln</p>
            <button onclick="location.href='buy.html'" type="submit" class="submit-btn">Buy</button>
        </div>
    </div>
    <div class="menuCar-box">
        <div class="imgCar">
            <img src="img/f30.png" alt="f30"class="img-resp img-curve">
        </div>
        <div class="desc">
            <h4>BMW f30</h4>
            <p class="engine">2.0 diesel 200km</p>
            <p  class="price">Only for 42k pln</p>
            <button onclick="location.href='buy.html'" type="submit" class="submit-btn">Buy</button>
        </div>
    </div>
    <div class="clear">

    </div>
</div>
</section>
<?php include('part/social.php');?>
<?php include('part/footer.php');?>