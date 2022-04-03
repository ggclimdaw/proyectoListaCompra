<!-- Incluimos el header de la aplicacion -->
<?php include_once("view/headerCmp.php"); ?>

<div class="columns is-vcentered is-centered" style="height: 90vh">
    <article class="panel is-primary">

    <!-- Titulo del formulario -->
    <p class="panel-heading" style="text-align: center;">
        Log in 
    </p>
    <div class="box">
        <!-- Seccion de formulario -->
        <form action="" method="post">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" name="username" placeholder="Nombre de usuario">
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <input class="input" type="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="buttons is-centered">
                <button class="button is-primary">Acceder</button>
            </div>
        </form>
        <br />

        <!-- Sección con opcion de registro -->
        <div>
            <mall><em>¿No dispones de una cuenta ya?, <a href="./userRegistrationPage.php">Regístrate</a></em></mall>
        </div>
    </div>
    </article>
</div>


<!-- Como no queremos que se mueste en una pagina nueva, realizamos la acción de login del usuario desde esta
misma pàgina -->
<?php include_once("controller/userLogin.php"); ?>


<!-- Incluimos el footer de la aplicación -->
<?php include_once("view/footerCmp.php"); ?>