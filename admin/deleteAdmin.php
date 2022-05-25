<?php
    include('../config/configuration.php');

   $userId = $_GET['userId'];

   $sql = "DELETE FROM user where userId=$userId";
    
    $res = mysqli_query($conn, $sql); //save data in database

    if($res==TRUE){
        $_SESSION['del'] = '<div class="submit-btn3">deleted successfully </div>';

        header("location:".URL.'admin/manage.php');
    }else{
        $_SESSION['del'] = '<div class="submit-btn3">deleted failed</div>';

        header("location:".URL.'admin/deleteAdmin.php');
    }


?>