<?php include('part/menu.php'); ?>

<section class="categories">
<div class="conteiner">
        <div class="button-box">
        <h2 class="submit-btn">Your buy</h2>
        </div>
        <?php
          if(isset($_SESSION['addBuy'])){
            echo $_SESSION['addBuy'];  
            unset($_SESSION['addBuy']); //remove session
          }

          if(isset($_SESSION['delBuy'])){
            echo $_SESSION['delBuy'];  
            unset($_SESSION['delBuy']); //remove session
          }

          if(isset($_SESSION['updBuy'])){
            echo $_SESSION['updBuy'];  
            unset($_SESSION['updBuy']); //remove session
          }
        ?>
         </br>
        </br>
        </br>
        </br>
        <div class="form-box2">
        <table class="button-box2">
                <thead>
                <tr>
                    <th>buyId</th>
                    <th>carId</th>
                    <th>quantity</th>
                    <th>total</th>
                    <th>status</th>
                    <th>order_date</th>
                    <th>userID</th>
                    <th>Action</th>
                </tr>
                </thead>
          <?php

          $sql = "SELECT * from buy";

          $res = mysqli_query($conn, $sql) or die(mysqli_error()); 


          if($res==TRUE){

            $rows = mysqli_num_rows($res);

            if($rows>0){
                while($rows=mysqli_fetch_assoc($res)){
                        $buyId=$rows['buyId'];
                        $carId=$rows['carId'];
                        $quantity=$rows['quantity'];
                        $total=$rows['total'];
                        $status=$rows['status'];
                        $order_date=$rows['order_date'];
                        $userId=$rows['userId'];

                       ?>
                       <tbody>
                       <tr class="active-row">
                       <td><?php echo $buyId;?></td>
                       <td><?php echo $carId;?></td>
                       <td><?php echo $quantity;?></td>
                       <td><?php echo $total;?></td>
                       <td>
                         <?php if($status=="Bought"){
                            echo "<div class='submit-btn'>$status</div>";
                         }elseif($status=="On delivery"){
                          echo "<div class='submit-btn4'>$status</div>";
                         }elseif($status=="Delivered"){
                          echo "<div class='submit-btn2'>$status</div>";
                         }elseif($status=="Cancelled"){
                          echo "<div class='submit-btn3'>$status</div>";
                         }
                         
                         ?>
                        </td>
                       <td><?php echo $order_date;?></td>
                       <td><?php echo $userId;?></td>
                       <td>
                        <a href="updateBuy.php?buyId=<?php echo $buyId;?>" class="submit-btn2"> Update buy</a>
                        <a href="deleteBuy.php?buyId=<?php echo $buyId;?>" class="submit-btn3"> Delete buy</a>
                        </td>
                    </tr>
                    </tbody>
                    <?php 
               }
               
            }else{

            }
        }else{
           
        }
        
        
          ?>
            </table>
            </div>
        <div class="clear">
        </div>
</div>
</section>
<?php include('part/social.php'); ?>
<?php include('part/footer.php'); ?>