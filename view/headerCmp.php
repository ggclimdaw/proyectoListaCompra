<?php 
require_once('config/config.php');
require_once('controller/database.php');
?>


<!DOCTYPE html>
<html lang="en" class="has-navbar-fixed-top">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./Styles/bulma.min.css">
<title>ListaCompra App</title>
</head>
<body class="main">
<!-- Barra de navegación -->
<nav class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item">
            <img src="https://www.filigranashop.com/wp-content/uploads/2020/08/LOGO-FILIGRANA-valen-OK-02.ico" width="200"  height="100">
        </a>
    </div>
    <div class="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary">
                        <strong> Sign up</strong>
                    </a>
                    <a class="button is-light">
                        Log in
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>