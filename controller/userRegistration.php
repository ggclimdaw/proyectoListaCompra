<?php
if (!empty($_POST)) {
    if (!empty($_POST["name"]) && !empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["address"]) && !empty($_POST["email"])) {
        $nombreUsuario = $_POST["name"];
        $usernameUsuario = $_POST["username"];
        $passwordUsuario = $_POST["password"];
        $hashed_password = password_hash($passwordUsuario, PASSWORD_DEFAULT); //Encriptem el password
        $direccionUsuario = $_POST["address"];
        $emailUsuario = $_POST["email"];
        $user = new User($nombreUsuario, $usernameUsuario, $hashed_password, $direccionUsuario, $emailUsuario);
        $isUserCreated = $user->create();
        if ($isUserCreated) {
            setUserSession($user); 
            header('Location: ' . constant('URL_BASE'));
        }
        $_POST = array();
    }
}