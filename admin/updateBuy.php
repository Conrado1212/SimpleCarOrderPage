<?php include('part/menu.php'); ?>
<section class="categories">
    <div class="conteiner">
        <div class="form-box2">
        <div class="button-box">
        <h2 class="submit-btn2">UpdateBuy</h2>
        </div>
        
        <?php

if(isset($_SESSION['updBuy'])){
    echo $_SESSION['updBuy'];  
    unset($_SESSION['updBuy']); //remove session
  }

            if(isset($_GET['buyId'])){

           
                $buyId = $_GET['buyId'];

                $sql ="SELECT * from buy where buyId=$buyId";

                $res = mysqli_query($conn, $sql);


                if($res==TRUE){

                    $rows = mysqli_num_rows($res);
                    if($rows==1){
                        $rows= mysqli_fetch_assoc($res);
                        $carId =$rows['carId'];
                        $quantity =$rows['quantity'];
                        $total =$rows['total'];
                        $status =$rows['status'];
                        $order_date =$rows['order_date'];
                        $userId =$rows['userId'];
                    }
                  
                }else{
                   
                    header("location:".URL.'admin/buy.php');
                }
            }else{
                header("location:".URL.'admin/buy.php');
            }
        ?>

        <form action="" method="POST" class="input-group">
        <h1 class="submit-btn">Your carId</h1></br></br><input type="text" class="input-field" name="carId" value="<?php echo $carId;?>"  required></br></br>
              <h1 class="submit-btn">Your quantity</h1> </br></br><input type="number" class="input-field" name="quantity" value="<?php echo $quantity;?>"></br></br>
              <h1 class="submit-btn">Your status</h1><select name="status">
                  <option class="buyOption" <?php if($status=="Bought"){echo "selected";} ;?> value="Bought">Bought</option>
                  <option class="buyOption" <?php if($status=="On delivery"){echo "selected";} ;?> value="On delivery">On delivery</option>
                  <option class="buyOption" <?php if($status=="Delivered"){echo "selected";} ;?> value="Delivered">Delivered</option>
                  <option class="buyOption" <?php if($status=="Cancelled"){echo "selected";} ;?> value="Cancelled">Cancelled</option>
              </select>
              <input type="hidden" name="price" value="<?php echo $price=$total/$quantity;?>">
            </br></br> <h1 class="submit-btn">Your order_date</h1> </br></br><input type="text" class="input-field" name="order_date" value="<?php echo $order_date;?>"  required></br></br>
            <h1 class="submit-btn">Your userId</h1></br></br><input type="number" class="input-field" name="userId" value="<?php echo $userId;?>" placeholder="Your userId" required><br>
              <button type="submit" name="submit" value="upd buy" class="submit-btn2">Update buy</button>

        </form>
            </div>
        <div class="clear">
        </div>
</div>
</section>
<?php include('part/social.php'); ?>
<?php include('part/footer.php'); ?>
<?php
if(isset($_POST['submit'])){
    $carId=$_POST['carId'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $total=$price*$quantity;
    $status=$_POST['status'];
    $order_date=$_POST['order_date'];
    $userId=$_POST['userId'];

    $sql2 ="UPDATE  buy set
    carId='$carId',
    quantity = '$quantity',
    total = '$total',
    status = '$status',
    order_date = '$order_date',
    userId = '$userId'
    where buyId='$buyId'
    ";


   
$res2 = mysqli_query($conn, $sql2); //save data in database

if($res2==TRUE){
    $_SESSION['updBuy'] = '<div class="submit-btn2">Upd successfully </div>';

    header("location:".URL.'admin/buy.php');
}else{
    $_SESSION['updBuy'] = '<div class="submit-btn2">Upd failed</div>';

    header("location:".URL.'admin/updateBUy.php');
}


}

?>