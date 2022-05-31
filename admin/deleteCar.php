<?php
    include('../config/configuration.php');

    if(isset($_GET['carId']) and isset($_GET['img_name'])){
        $carId = $_GET['carId'];
        $img_name = $_GET['img_name'];


        if($img_name!=""){
            $path = "..img/car".$name;

            $remove = unlink($path);

            if($remove ==false){

                $_SESSION['delImg'] = '<div class="submit-btn3">deleted failed </div>';
                header("location:".URL.'admin/deleteCar.php');
    
                die();
            }
        }
        $sql = "DELETE FROM car where carId=$carId";

        $res = mysqli_query($conn, $sql); //save data in database

        if($res==TRUE){
            $_SESSION['delCar'] = '<div class="submit-btn3">deleted successfully </div>';
    
            header("location:".URL.'admin/cars.php');
        }else{
            $_SESSION['delCar'] = '<div class="submit-btn3">deleted failed</div>';
    
            header("location:".URL.'admin/deleteCar.php');
        }
    }else{
        $_SESSION['delImg'] = '<div class="submit-btn3">deleted successfully </div>';
    
        header("location:".URL.'admin/cars.php');
    }
?>