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