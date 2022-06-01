<?php include('part/menu.php')
; ?>
    <div class="conteiner">
        <div class="form-box">
            <div class="button-box">
                <h4 class="submit-btn">Fill this field to gey your car</h4>
            </div>
        <form action="#" class="input-group">
                
                <div class="imgCar">
                    <img src="img/gtd.png" alt="Golf 6 gtd"class="img-resp img-curve">
                 </div>

                 <div class="desc">
                    <h4>Car title</h4>
                    <p class="engine">2.0 tdi 170km common rail</p>
                    <p class="price">Only for 40k PLN</p>
                   
                        <input type="number" name="qty" class="resp-input" value="1" required>
                    
                </div>
       
              <input type="text" class="input-field" placeholder="Your  name" required>
              <input type="tel" class="input-field" placeholder="Your phone " required>
              <input type="email" class="input-field" placeholder="Your email" required>
              <textarea type="address" class="input-field" placeholder="Your address" required></textarea><br>
              <button type="submit" class="submit-btn">Click</button>

        </form>
    </div>
    </div>


    <?php include('part/social.php'); ?>
    <?php include('part/footer.php'); ?>