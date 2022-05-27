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
        <div class="box">
            <img src="../img/hachback.png" alt="hachback" class="img-resp img-curve">
            <h3>Hachback</h3>
        </div>
         </a>
         <a href="#">
        <div class="box">
            <img src="../img/coupe.png" alt="coupe" class="img-resp img-curve">
            <h3>Coupe</h3>
        </div>
         </a>
         <a href="#">
        <div class="box">
            <img src="../img/sedan.png"  alt="sedan" class="img-resp img-curve">
            <h3>Sedan</h3>
        </div>

    </a>
        <div class="clear">

        </div>
</div>
</section>



<?php include('part/social.php'); ?>
<?php include('part/footer.php'); ?>
