<?php
    if(!isset($_SESSION['user'])){

        $_SESSION['loginCheck'] = '<div class="submit-btn">You must login</div>';
        header("location:".URL.'admin/login.php');
    }
?>