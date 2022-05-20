<!-- Incluimos el header de la aplicacion -->
<?php 
include_once("view/headerCmp.php");
$languageSession = getLanguageSession();
?>

<div class="columns is-vcentered is-centered" style="height:90vh">
    <article class="panel is-primary">

    <!-- Título del formulario -->
    <p class="panel-heading" style="text-align: center;">
    <?= getTraslationValue("CONFIG_SYSTEM") ?>
    </p>
    <div class="box has-text-centered">
        <form method="POST" action="">
            <div style=" text-align: center; margin-bottom: 10px;">
                <label for="language"><?= getTraslationValue("SELECCIONA_IDIOMA") ?>:</label>
                <select name="language" id="selectedLanguage">                    
                    <option value="es" <?= $languageSession == 'es' ? ' selected="selected"' : ''; ?> title="Español">🇪🇸 ESP</option>
                    <option value="en" <?= $languageSession == 'en' ? ' selected="selected"' : ''; ?> title="Ingles">🇬🇧 ING</option>
                    <option value="va" <?= $languageSession == 'va' ? ' selected="selected"' : ''; ?> title="Valencià">🇪🇺 VAL</option>                    
                </select>
            </div>
            <div class="buttons is-centered">
                <button class="button is-primary" type="submit"><?= getTraslationValue("APLICAR_CAMBIOS") ?></button>
                <a class="button is-link is-light" onclick="window.location.href = './index.php'"><?= getTraslationValue("CANCELAR") ?></a>
            </div>
        </form>
    </div>
    </article>
</div>


<!-- Como no queremos que se muestre una pàgina nueva, realizamos la acción de login del usuario desde esta
misma pàgina  -->
<?php include_once("controller/settings.php"); ?>

<!-- Incluimos el footer de la aplicación -->
<?php include_once("view/footerCmp.php"); ?>