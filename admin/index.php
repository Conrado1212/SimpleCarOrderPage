<?php include('part/menu.php'); ?>

<section class="categories">
    <div class="conteiner">
        <div class="button-box">
        <h2 class="submit-btn">Your dashboard</h2>
        </div>
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


<section class="Social">
    <div class="social">
  
        <div class="socialdiv">
            <div class="fb">
              <a href=" https://www.facebook.com/"><i class="icon-facebook-squared"></i></a>
            </div>
            <div class="yt">
                <a href="https://www.youtube.com/"><i class="icon-youtube-play"></i></a>
            </div>
            <div class="tw">
                <a href="https://www.twitch.tv/"><i class="icon-twitch"></i></a>
            </div>
            <div class="am">
               <a href="https://www.amazon.de/"><i class="icon-amazon" ></i></a>

            </div>
            <div style="clear: both"> </div>
        </div>
   
</div>
</section>
<section class="Footer">
    <div class="conteiner">
        <div class="footer">ElectricOrderApp.com &copy; 2022 Thank you for your visit</div>
</div>
</section>
<script src="jquery-1.11.3.min.js"></script>
<script>

    $(document).ready(function() {
        var NavY = $('.nav').offset().top;

        var stickyNav = function(){
            var ScrollY = $(window).scrollTop();

            if (ScrollY > NavY) {
                $('.nav').addClass('sticky');
            } else {
                $('.nav').removeClass('sticky');
            }
        };

        stickyNav();

        $(window).scroll(function() {
            stickyNav();
        });
    });

</script>
</body>
</html>