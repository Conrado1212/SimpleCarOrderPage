<?php include('part/menu.php'); ?>

<section class="categories">
    <div class="conteiner">
        <div class="button-box">
        <h2 class="submit-btn">Your dashboard</h2>
        </div>
        <?php
          if(isset($_SESSION['login'])){
            echo $_SESSION['login'];  
            unset($_SESSION['login']); //remove session
          }
          ?>
          </br>
        <a href="#">
        <div class="boxy">
            <?php
                $sql ="SELECT * from category";

                $res=mysqli_query($conn,$sql);

                $rows=mysqli_num_rows($res);

            ?>
            <h1 class="submit-btn"><?php echo $rows ;?> Categories</h1>
        </div>
         </a>
         <a href="#">
        <div class="boxy">
        <?php
                $sql1 ="SELECT * from car";

                $res1=mysqli_query($conn,$sql1);

                $rows1=mysqli_num_rows($res1);

            ?>
        <h1 class="submit-btn5"><?php echo $rows1 ;?> Cars</h1>
        </div>
         </a>
         <a href="#">
        <div class="boxy">
        <?php
                $sql2 ="SELECT * from buy";

                $res2=mysqli_query($conn,$sql2);

                $rows2=mysqli_num_rows($res2);

            ?>
        <h1 class="submit-btn2"><?php echo $rows2 ;?> Bought</h1>
        </div>

    </a>
    <a href="#">
        <div class="boxy">
        <?php
                $sql3 ="SELECT sum(total) as totalValue from buy where status='Delivered'";

                $res3=mysqli_query($conn,$sql3);

                $rows3=mysqli_fetch_assoc($res3);

                $totalValue = $rows3['totalValue'];

            ?>
        <h1 class="submit-btn3">PLN <?php echo $totalValue ;?>  Total value</h1>
        </div>

    </a>

        <div class="clear">

        </div>
</div>
</section>



<?php include('part/social.php'); ?>
<?php include('part/footer.php'); ?>
