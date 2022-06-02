<?php include('part/menu.php');?>
<section class="categories">
    <div class="conteiner">
        <h2 >Cars menu</h2>
        <?php
            $sql = "SELECT * from category where active='on' and featured ='on' ";

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
 

    </a>
        <div class="clear">

        </div>
</div>
</section>
<?php include('part/social.php');?>
<?php include('part/footer.php');?>