<!-- Incluimos el header de la aplicacion -->
<?php 
include_once("view/headerCmp.php");
$languageSession = getLanguageSession();
?>

<!-- Sección principal -->
<section class="section" id="seccionPrincipal">
    <div class="container">
    <div class="columns">
    <div class="column">
        
    <div class="column is-quarters-quarters">
        <?php include_once("view/productsListCmp.php"); ?>
    </div>  
    </div>
    </div>
</section>

<!-- Botó anar a inici -->
    <div class="buttons is-centered">
        <button class="button is-primary"><a href="./index.php">Ir a inicio</button>
    </div>



<!-- Como no queremos que se muestre una pàgina nueva, realizamos la acción de login del usuario desde esta
misma pàgina  -->
<?php include_once("controller/settings.php"); ?>

<!-- Incluimos el footer de la aplicación -->
<?php include_once("view/footerCmp.php"); ?>