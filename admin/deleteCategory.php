<?php
    include('../config/configuration.php');


if(isset($_GET['categoriId']) and isset($_GET['name'])){
    $categoryId = $_GET['categoryId'];
    $name = $_GET['name'];


    if($name!=""){


        $path = "..img/category".$name;

        $remove = unlink($path);


        if($remove ==false){

            $_SESSION['delImg'] = '<div class="submit-btn3">deleted failed </div>';
            header("location:".URL.'admin/deleteCategory.php');

            die();
        }

        
    }

    $sql = "DELETE FROM category where categoryId=$categoryId";

    $res = mysqli_query($conn, $sql); //save data in database

    if($res==TRUE){
        $_SESSION['delCat'] = '<div class="submit-btn3">deleted successfully </div>';

        header("location:".URL.'admin/category.php');
    }else{
        $_SESSION['delCat'] = '<div class="submit-btn3">deleted failed</div>';

        header("location:".URL.'admin/deleteCategory.php');
    }



}else{
    $_SESSION['delImg'] = '<div class="submit-btn3">deleted successfully </div>';

    header("location:".URL.'admin/category.php');
}

?>