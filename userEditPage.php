<!-- Incluimos el header en la aplicación -->
<?php
include_once("view/headerCmp.php");
$user = getUserSession();
if ($user == null) {
    $user = new User();
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
                    <label class="label">Nombre y apellidos</label>
                    <input class="input" type="text" name="name" placeholder="Nombe y apellidos" value="<?= $user->getName() ?>">  
                </div>
                <div class="field">
                    <label class="label">Username</label>
                    <input class="input" type="text" name="username" placeholder="Nombe de usuario" value="<?= $user->getUserName() ?>">  
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <input class="input" type="email" name="email" placeholder="Email" value="<?= $user->getEmail() ?>">  
                </div>
                <div class="field">
                    <label class="label">Direccion</label>
                    <input class="input" type="text" name="address" placeholder="Dirección" value="<?= $user->getAddress() ?>">  
                </div>
                <div class="field">
                    <label class="label">Nuevo Password</label>
                    <input class="input" type="password" name="password" placeholder="Password">
                    <p class="help">* Introducir uno si se desea modificar el existente. Dejar en blanco en caso contrario</p>  
                </div>

                <div class="buttons is-centered">
                    <button class="button is-primary" type="submit">modificar</button>
                    <a class="button is-link is-light" onclick="window.location.href = './index.php'">Cancelar</a>  
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
