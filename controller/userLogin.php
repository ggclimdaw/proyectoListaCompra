<?php
if (!empty($_POST)) {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $usernameUsuario = $_POST["username"];
        $passwordUsuario = $_POST["password"];
        $user = new User();
        $selectedUser = $user->getUserByUserName($usernameUsuario);
        if ($selectedUser != null) {
            if (password_verify($passwordUsuario, $selectedUser->getPassword())) {
            setUserSession($selectedUser); 
            header('Location: '. constant('URL_BASE'));
            }
        }
        $_POST = array();
    }
}