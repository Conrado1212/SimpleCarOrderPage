<?php

include('../config/configuration.php');

    session_destroy();

    header("location:".URL.'admin/login.php');
?>