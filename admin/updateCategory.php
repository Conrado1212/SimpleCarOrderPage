<?php include('part/menu.php'); ?>
<section class="categories">
    <div class="conteiner">
        <div class="form-box2">
        <div class="button-box">
        <h2 class="submit-btn2">UpdateCategory</h2>
        </div>
        
        <?php
                if(isset($_GET['categoryId'])){

                
                $categoryId = $_GET['categoryId'];

                $sql ="SELECT * from category where categoryId=$categoryId";

                $res = mysqli_query($conn, $sql);

                    $rows = mysqli_num_rows($res);
                    if($rows==1){
                        $rows= mysqli_fetch_assoc($res);
                        $title =$rows['title'];
                        $name =$rows['name'];
                        $featured =$rows['featured'];
                        $active =$rows['active'];


                    }else{
                    $_SESSION['updCat'] = '<div class="submit-btn2">No data found</div>';
                    header("location:".URL.'admin/category.php');
                    }
            }else{
                
                header("location:".URL.'admin/category.php');
            }
        ?>

        <form action="" method="POST" class="input-group" enctype="multipart/form-data">
              <input type="text" class="input-field" name="title"  value="<?php echo $title; ?>" placeholder="Your title" >
              <h2 > Current img</h2> <td>
                  <?php 
                        if($name!= ""){
                          ?>
                          <img src="<?php echo URL; ?>img/category/<?php echo $name; ?>" width="100px" >

                          <?php
                          

                        }else{
                          echo "<div class='submit-btn'>Image not found</div>";
                        }
                        ?>  </td>
              <h2 > Featured</h2><input type="radio"  name="featured" values="YES" >Yes
              <input type="radio"  name="featured" values="No" >No 
              <h2 > Active</h2><input type="radio"  name="active" values="YES" >Yes
              <input type="radio"  name="active" values="No" >No 
              </br></br> <button type="submit" name="submit" value="upd category" class="submit-btn2">Update category</button>

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
    $title=$_POST['title'];
    $name=$_POST['name'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];

    $sql ="UPDATE  category set
    title='$title',
    name = '$name',
    featured = '$featured',
    active = '$active',
    where categoryId='$categoryId'
    ";


   
$res = mysqli_query($conn, $sql); //save data in database

if($res==TRUE){
    $_SESSION['updCat'] = '<div class="submit-btn2">Upd successfully </div>';

    header("location:".URL.'admin/category.php');
}else{
    $_SESSION['updCat'] = '<div class="submit-btn2">Upd failed</div>';

    header("location:".URL.'admin/updateCategory.php');
}


}

?>