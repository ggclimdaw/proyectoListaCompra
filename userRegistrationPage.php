<!-- Header -->
<?php include_once('view/headerCmp.php'); ?>

<div class="columns is-vcentered is-centered" style="height:90vh">
    <article class="panel is-primary" style="width:400px">

            <!-- Titulo del formulario -->
            <p class="panel-heading" style="text-align:center;">
            <?= getTraslationValue("REGISTRO_USUARIO") ?>
            </p>
        <div class="box">
            <!-- Sección de formulario -->
            <form action="" method="post">
                <div class="field">
                    <label class="label"><?= getTraslationValue("NOMBRE_APELLIDOS") ?></label>
                    <input class="input" type="text" name="name" placeholder="Nombre y apellidos">
                </div>
                <div class="field">
                    <label class="label"><?= getTraslationValue("NOMBRE_USUARIO") ?></label>
                    <input class="input" type="text" name="username" placeholder="Nombre de usuario">
                </div>
                <div class="field">
                    <label class="label"><?= getTraslationValue("EMAIL") ?></label>
                    <input class="input" type="email" name="email" placeholder="Email">
                </div>
                <div class="field">
                    <label class="label"><?= getTraslationValue("DIRECCION") ?></label>
                    <input class="input" type="text" name="address" placeholder="Dirección">
                </div>
                <div class="field">
                    <label class="label"><?= getTraslationValue("PASSWORD") ?></label>
                    <input class="input" type="password" name="password" placeholder="Password">
                </div>

                <div class="buttons is-centered">
                    <button class="button is-success" type="submit"><?= getTraslationValue("REGISTRARSE") ?></button>
                    <a class="button is-link is-light" onclick="window.location.href = './index.php'"><?= getTraslationValue("CANCELAR") ?></a>
                </div>
            </form>
        </div>
    </article>
</div>

<!-- Como no queremos que se muestre una pàgina nueva, realizamos la acción de registrar el usuarios desde 
esta misma pàgina -->
<?php include_once("controller/userRegistration.php"); ?>

<!-- Footer -->
<?php include_once("view/footerCmp.php"); ?>
