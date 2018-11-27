<?php
    $con = mysqli_connect("localhost","root","","web-hiring");

    if ($con == false) {
        die("Connection error: " . mysqli_connect_error());
    }

    $home = "/SILoker/perusahaan";
