<?php
    include "config/config.php";
    session_start();
    session_destroy();
    header("location: ".$home."");
?>