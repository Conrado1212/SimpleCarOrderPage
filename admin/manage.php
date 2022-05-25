<?php include('part/menu.php'); ?>
<section class="categories">
    <div class="conteiner">
        <div class="button-box">
        <h2 class="submit-btn">Manage</h2>
        </div>
        <?php
          if(isset($_SESSION['add'])){
            echo $_SESSION['add'];  
            unset($_SESSION['add']); //remove session
          }


          if(isset($_SESSION['del'])){
            echo $_SESSION['del'];  
            unset($_SESSION['del']); //remove session
          }
        ?>
        </br>
        </br>
        </br>
        </br>
        <a href="addAdmin.php" class="submit-btn">Add Admin</a>
        <div class="form-box2">
        <table class="button-box2">
                <thead>
                <tr>
                    <th>userId</th>
                    <th>userName</th>
                    <th>fullName</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                </thead>
               
                <?php
                  $sql = "SELECT * FROM user";

                  $res = mysqli_query($conn, $sql) or die(mysqli_error()); //save data in database

                  if($res==TRUE){
                    $rows = mysqli_num_rows($res);

                    if($rows>0){
                        while($rows=mysqli_fetch_assoc($res)){
                          $userId=$rows['userId'];
                          $userName=$rows['userName'];
                          $fullName=$rows['fullName'];
                          $email=$rows['email'];
                          $phone=$rows['phone'];
                          $address=$rows['address'];


                       ?>
                      <tbody>
                      <tr class="active-row">
                      <td><?php echo $userId; ?></td>
                        <td><?php echo $userName; ?></td>
                        <td><?php echo $fullName; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $address; ?></td>
                        <td>
                          <a href="updateAdmin.php" class="submit-btn2"> Update Click</a>
                          <a href="deleteAdmin.php?userId=<?php echo $userId;?>" class="submit-btn3"> Delete Click</a>
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