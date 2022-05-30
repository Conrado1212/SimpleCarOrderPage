<?php
    include('../config/configuration.php');

   $categoryId = $_GET['categoryId'];

   $sql = "DELETE FROM category where categoryId=$categoryId";
    
    $res = mysqli_query($conn, $sql); //save data in database

    if($res==TRUE){
        $_SESSION['delCat'] = '<div class="submit-btn3">deleted successfully </div>';

        header("location:".URL.'admin/category.php');
    }else{
        $_SESSION['delCat'] = '<div class="submit-btn3">deleted failed</div>';

        header("location:".URL.'admin/deleteCategory.php');
    }


?>