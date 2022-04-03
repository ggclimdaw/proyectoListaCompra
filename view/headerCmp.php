<?php 
require_once('config/config.php');
require_once("model/user.php");
require_once('controller/database.php');
require_once('controller/session.php');
startSession();
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

        <div class="navbar-end">

            <?php
            $userSession = getUserSession();
            if ($userSession == null) {
            ?>  
            <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-primary is-outlined" onclick="window.location.href =
                            './userRegistrationPage.php'">Registrarse</a>
                            <a class="button is-primary" onclick="window.location.href ='./loginPage.php'">Log in</a>
                        </div>
                    </div>
            <?php
        
            }else {

            ?>
                < class="navbar-item">
                        <form action="" method="post">
                            <buttom class="button is-danger" onclick="window.location.href = './loginPage.php'"> Log out</buttom>
                        </form>    
                    <?php
                    if (isset($_POST['logout'])) {
                        closeSession();
                        $_POST = array();
                        header('Location: ' . constant('URL_BASE') . 'loginPage.php');
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        
        </div>
        
    </nav>
</body>