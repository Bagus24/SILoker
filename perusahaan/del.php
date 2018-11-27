<?php
    include "config/config.php";
    $query_del_vacan = mysqli_query($con, "DELETE FROM posisi WHERE id='$_GET[id]'");
    if ($query_del_vacan == true) {
        header("location:all_vacan.php");
    }

    $query_del_apply = mysqli_query($con, "DELETE FROM applicants WHERE id='$_GET[a_id]'");
    if ($query_del_apply == true) {
        header("location:index.php");
    }
