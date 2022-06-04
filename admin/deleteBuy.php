<?php
    include('../config/configuration.php');

   $buyID = $_GET['buyID'];

   $sql = "DELETE FROM buy where buyID=$buyID";
    
    $res = mysqli_query($conn, $sql); //save data in database

    if($res==TRUE){
        $_SESSION['delBuy'] = '<div class="submit-btn3">deleted successfully </div>';

        header("location:".URL.'admin/buy.php');
    }else{
        $_SESSION['delBuy'] = '<div class="submit-btn3">deleted failed</div>';

        header("location:".URL.'admin/deleteBuy.php');
    }


?>