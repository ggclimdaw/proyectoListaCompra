<?php 
require_once('config/config.php');
require_once("model/user.php");
require_once("model/shoppingList.php");
require_once("model/shoppingListElement.php");
require_once("model/product.php");
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
                            <a class="button is-primary is-outlined" onclick="window.location.href ='./userRegistrationPage.php'">🎟️<?= getTraslationValue("REGISTRARSE") ?></a>
                            <a class="button is-primary" onclick="window.location.href ='./loginPage.php'">👉<?= getTraslationValue("ACCEDER") ?></a>
                        </div>
                    </div>
            <?php
        
            }else {

            ?>
                <div class="navbar-item">

                    <!-- CODIC ANTIC
                    <form action="" method="post">
                        <button class="button is-danger" type="submit" name="logout"> Log out</button>
                     </form>    -->

                    <div class="box has-text-centered">
                        <form method="POST" action="">
                            <label for="language">Hola <?= $userSession->getName(); ?></label>
                            <select name="selectedOption" id="selectedOption" onchange="this.form.submit()">
                                <option value="" title="Opciones" disabled="disabled" selected="true">💡<?= getTraslationValue("OPCIONES") ?></option>
                                <option value="products" title="Listado de productos">🍇<?= getTraslationValue("LISTADO_DE_PRODUCTOS") ?></option>
                                <option value="logout" title="Log out">👈<?= getTraslationValue("LOG_OUT") ?></option>
                                <option value="settings" title="Settings">⚙️<?= getTraslationValue("SETTINGS") ?></option>
                            </select>
                        </form>
                    </div>

                    <?php
                    if (isset($_POST['selectedOption'])) {
                        $selectedOption = $_POST['selectedOption'];
                        if ($selectedOption == 'logout'){
                            closeSession();
                            $_POST = array();
                            header('Location: ' . constant('URL_BASE') . 'loginPage.php');
                        }
                        if ($selectedOption == 'settings') {
                            header('Location: ' . constant('URL_BASE') . 'settingsPage.php');
                        }
                        if ($selectedOption == 'products') {
                            header('Location: ' . constant('URL_BASE') . 'productsPage.php');
                        }
                        $_POST = array();
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        
        </div>
        
    </nav>
</body>