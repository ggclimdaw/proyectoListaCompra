<?php
$oldUser = getUserSession();
if ($oldUser == null) {
    $oldUser = new User();
}

if (!empty($_POST)) {
    if (!empty($_POST["name"]) && !empty($_POST["username"]) && !empty($_POST["address"]) && !empty($_POST["email"])) {
        $oldUsername = $oldUser->getUsername();
        $nombreUsuario = $_POST["name"];
        $usernameUsuario = $_POST["username"];
        $direccionUsuario = $_POST["address"];
        $emailUsuario = $_POST["email"];
        $hashed_password = '';
        if (!empty($_POST["password"])) {
            $passwordUsuario = $_POST["password"];
            $hashed_password = password_hash($passwordUsuario, PASSWORD_DEFAULT);
        }

        $user = new User();
        $isUserUpdated = $user->update($oldUsername, $nombreUsuario, $usernameUsuario, $hashed_password, $direccionUsuario, $emailUsuario);
        if ($isUserUpdated) {
            $selectedUser = $user->getUserByUserName($usernameUsuario);
            setUserSession($selectedUser); 
            header('Location: '. constant('URL_BASE'));
        }
        $_POST = array();
    }
}