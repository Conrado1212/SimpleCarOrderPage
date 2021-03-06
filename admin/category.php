<?php include('part/menu.php'); ?>

<section class="categories">
<div class="conteiner">
        <div class="button-box">
        <h2 class="submit-btn">Your category</h2>
        </div>
        <?php
          if(isset($_SESSION['addCat'])){
            echo $_SESSION['addCat'];  
            unset($_SESSION['addCat']); //remove session
          }

          if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];  
            unset($_SESSION['upload']); //remove session
          }

          if(isset($_SESSION['delCat'])){
            echo $_SESSION['delCat'];  
            unset($_SESSION['delCat']); //remove session
          }

          if(isset($_SESSION['delImg'])){
            echo $_SESSION['delImg'];  
            unset($_SESSION['delImg']); //remove session
          }

          if(isset($_SESSION['updCat'])){
            echo $_SESSION['updCat'];  
            unset($_SESSION['updCat']); //remove session
          }

          if(isset($_SESSION['uploadUpd'])){
            echo $_SESSION['uploadUpd'];  
            unset($_SESSION['uploadUpd']); //remove session
          }

          if(isset($_SESSION['failedRemove'])){
            echo $_SESSION['failedRemove'];  
            unset($_SESSION['failedRemove']); //remove session
          }
        ?>
        </br>
        </br>
        </br>
        </br>
        <a href="addCategory.php" class="submit-btn">Add Category</a>
        <div class="form-box2">
        <table class="button-box2">
                <thead>
                <tr>
                    <th>categoryId</th>
                    <th>title</th>
                    <th>name</th>
                    <th>featured</th>
                    <th>active</th>
                    <th>action</th>
                </tr>
                </thead>
                <?php
                  $sql = "SELECT * FROM category";

                  $res = mysqli_query($conn, $sql) or die(mysqli_error()); //save data in database
                  if($res==TRUE){
                    $rows = mysqli_num_rows($res);

                    if($rows>0){
                        while($rows=mysqli_fetch_assoc($res)){
                          $categoryId=$rows['categoryId'];
                          $title=$rows['title'];
                          $name=$rows['name'];
                          $featured=$rows['featured'];
                          $active=$rows['active'];
                       ?>
                <tbody>
                    <tr class="active-row">
                    <td><?php echo $categoryId; ?></td>
                        <td><?php echo $title; ?></td>
                        <td>
                        <?php 
                        if($name!=""){
                          ?>
                          <img src="<?php echo URL; ?>img/category/<?php echo $name; ?>" width="100px" >

                          <?php
                          

                        }else{
                          echo "<div class='submit-btn'>Image not found</div>";
                        }
                        ?>
                       </td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                        <a href="updateCategory.php?categoryId=<?php echo $categoryId;?>" class="submit-btn2"> Update category</a>
                        <a href="deleteCategory.php?categoryId=<?php echo $categoryId;?> & name=<?php echo $name; ?>" class="submit-btn3"> Delete category</a>
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