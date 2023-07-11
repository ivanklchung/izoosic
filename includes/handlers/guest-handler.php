<?php
    if (isset($_POST['signInGuest'])) {
        $username = 'guest';
        $password = 'password';

        $result = $account->login($username, $password);

        if ($result) {
            $_SESSION['userLoggedIn'] = $username;
            header("Location: browse.php");
        }
    }