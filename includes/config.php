<?php
    
    ob_start();
    session_start();
    
    $timezone = date_default_timezone_set("America/Vancouver");
     $con = mysqli_connect("localhost", "root", "Duckbunny101!", "Bearitunes" ); 
    


    if(mysqli_connect_errno()) {
        echo "Failed to connect" . mysqli_connect_errno();
    }