<?php
    include("../../config.php");

    if (isset($_POST['playlistId']) && isset($_POST['songId'])) {
        $playlistId = $_POST['playlistId'];
        $songId = $_POST['songId'];

        // Prepare and execute the query using prepared statements
        $stmt = mysqli_prepare($con, "DELETE FROM playlistSongs WHERE playlistId = ? AND songid = ?");
        mysqli_stmt_bind_param($stmt, "ii", $playlistId, $songId);
        mysqli_stmt_execute($stmt);

        // Check if any row was affected by the query
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Song successfully deleted from the playlist.";
        } else {
            echo "Song not found in the playlist.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "playlistId/songId not found!";
    }
?>
