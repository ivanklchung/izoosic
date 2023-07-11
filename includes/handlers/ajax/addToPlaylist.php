<?php
 include("../../config.php");

 if (isset($_POST['playlistId']) && isset($_POST['songId'])) {
     $playlistId = intval($_POST['playlistId']);  // Convert to integer
     $songId = $_POST['songId'];
 
     $orderIdQuery = mysqli_query($con, "SELECT MAX(playlistOrder) as maxOrder FROM playlistSongs WHERE playlistId = '$playlistId'");
     $row = mysqli_fetch_array($orderIdQuery);
     $maxOrder = $row['maxOrder'];
     $order = ($maxOrder !== null) ? intval($maxOrder) + 1 : 1;
 
     if (is_numeric($order)) {
         $query = mysqli_query($con, "INSERT INTO playlistSongs (songId, playlistId, playlistOrder) VALUES ('$songId', '$playlistId', '$order')");
 
         if ($query) {
             // Insertion successful
         } else {
             // Insertion failed
         }
     } else {
         echo "Invalid playlist order value!";
     }
 } else {
     echo "playlistId/songId not found!";
 }
 
?>
