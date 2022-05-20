<!-- Incluimos el header en la aplicación -->
<?php
include_once("view/headerCmp.php");
$user = getUserSession();
if ($user == null) {
    $user = new User();
    header('Location: ' . constant('URL_BASE') . 'loginPage.php');
}
?>

<div class="columns is-vcentered is-centered" style="height: 90vh">
    <article class="panel is-primary" style="width: 400px">

        <!-- Titulo del formulario -->
        <p class="panel-heading" style="width: 400px">
            Modificación de datos del usuario
        </p>
        <div class="box">
            <!-- Sección de formulario -->
            <form action="" method="post">
                <div class="field">
                    <label class="label"><?= getTraslationValue("NOMBRE_APELLIDOS") ?></label>
                    <input class="input" type="text" name="name" placeholder="Nombe y apellidos" value="<?= $user->getName() ?>">  
                </div>
                <div class="field">
                    <label class="label"><?= getTraslationValue("NOMBRE_USUARIO") ?></label>
                    <input class="input" type="text" name="username" placeholder="Nombe de usuario" value="<?= $user->getUserName() ?>">  
                </div>
                <div class="field">
                    <label class="label"><?= getTraslationValue("EMAIL") ?></label>
                    <input class="input" type="email" name="email" placeholder="Email" value="<?= $user->getEmail() ?>">  
                </div>
                <div class="field">
                    <label class="label"><?= getTraslationValue("DIRECCION") ?></label>
                    <input class="input" type="text" name="address" placeholder="Dirección" value="<?= $user->getAddress() ?>">  
                </div>
                <div class="field">
                    <label class="label"><?= getTraslationValue("NEW_PASSWORD") ?></label>
                    <input class="input" type="password" name="password" placeholder="Password">
                    <p class="help"><?= getTraslationValue("NOTA_PASSWORD") ?></p>  
                </div>

                <div class="buttons is-centered">
                    <button class="button is-primary" type="submit"><?= getTraslationValue("MODIFICAR") ?></button>
                    <a class="button is-link is-light" onclick="window.location.href = './index.php'"><?= getTraslationValue("CANCELAR") ?></a>  
                </div>
            </form>
        </div>
    </article>
</div>

<!-- Como no queremos que se muestre una pàgina nueva, realizamos la acción de modificar el usuario desde esta
misma pàgina -->
<?php include_once("controller/userUpdate.php"); ?>

<!-- Footer -->
<?php include_once("view/footerCmp.php"); ?>
