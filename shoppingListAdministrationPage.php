<!-- Incluimos el header de la aplicación -->
<?php include_once("view/headerCmp.php");
$user = getUserSession();
if ($user == null) {
    header('Location: ' . constant('URL_BASE') . 'loginPage.php');
}
$shoppingList = new ShoppingList();
$shoppingList = $shoppingList->getByUserId($user->getId());
$action = $_GET['action'];

if ($action == 'create' || $action == 'update') {
    $textoBoton = "Crear";
    if ($shoppingList->getId() != -1) {
        $textoBoton = "Modificar";
    }

?>

<div class="columns is-vcentered is-centered" Style="height:90vh">
    <article class="panel is-primary" Style="width:400px">

        <!-- Título del formulario -->
        <p class="panel-heading" Style="text-align: center;">
        <?= getTraslationValue("REGISTRO_LISTA") ?><?= $user->getUsername() ?>
        </p>
        <div class="box">
            <!-- Sección de formulario -->
            <form action="" method="post">
                <div class="field">
                    <label class="label"><?= getTraslationValue("NOMBRE_LISTA") ?></label>
                    <input class="input" type="text" name="name" placeholder="Nombre" value="<?= $shoppingList->getName() ?>">
                </div>
                <div class="field">
                    <label class="label"><?= getTraslationValue("DESCRIPCION") ?></label>
                    <input class="input" type="text" name="description" placeholder="Descripcion" value="<?= $shoppingList->getDescription() ?>">
                </div>
                <div class="field">
                    <label class="label"><?= getTraslationValue("IMAGEN") ?></label>
                    <input class="input" type="text" name="urlImagen" placeholder="Imagen" value="<?= $shoppingList->getUrlImagen() ?>">
                </div>
                <input id="proId" name="shoppingListId" type="hidden" value="<?= $shoppingList->getId() ?>">
                <div class="buttons is-centered">
                    <button class="button is-primary" type="submit"><?= $textoBoton ?></button>
                    <a class="button is-link is-light" onclick="window.location.href = './index.php'"><?= getTraslationValue("CANCELAR") ?></a>
                </div>
            </form>
        </div>
    </article>
</div>
<?php } else if ($action == 'delete') { ?>

    <!-- Código html que mostramos cuando recibimos una action de delete-->
    <div class="columns is-vcentered is-centered" Style="height:90vh">
        <article class="panel is-primary" Style="width:400px">

            <p class="panel-heading" style="text-align: center;">
            <?= getTraslationValue("ELIMINAR_LISTA") ?>
            </p>
            <div class="box">
                <p style="text-align: center;"><?= getTraslationValue("DESEA_ELIMINAR") ?> <b><?= $shoppingList->getName() ?></b>?</p>

                <br />
                <form action="" method="post">
                    <input id="prodId" name="shoppingListId" type="hidden" value="<?= $shoppingList->getId() ?>">
                    <div class="buttons is-centered">
                        <button class="button is-primary" type="submit"><?= getTraslationValue("ACEPTAR") ?></button>
                        <a class="button is-link is-light" onclick="window.location.href ='./index.php'"><?= getTraslationValue("CANCELAR") ?></a>
                    </div>
                </form>
            </div>
        </article>
    </div>

<?php } else if ($action == 'deleteProduct') {

    $shoppingListItemId = $_GET['shoppingListItemId'];
    $shoppingItemName = $_GET['shoppingItemName'];
    
?>    

    <!-- Código html que mostramos cuando recibimos una action de delete -->
    <div class="columns is-vcentered is-centered" style="height:90vh">
        <article class="panel is-primary" style="width:400px">
    
            <p class="panel-heading" style="text-aling: center;">
            <?= getTraslationValue("ELIMINAR_PRODUCTO") ?>
            </p>
            <div class="box">
                <p style="text-align: center;"><?= getTraslationValue("DESEA_ELIM_PRODUCTO") ?> <b><?= $shoppingItemName ?></b> <?= getTraslationValue("DELALISTA") ?> <b><?= $shoppingList->getName() ?></b>?</p>

                <br />
                <form action="" method="post">
                    <input id="prodId" name="shoppingListItemId" type="hidden" value="<?= $shoppingListItemId ?>">
                    <div class="buttons is-centered">
                        <button class="button is-primary" type="submit"><?= getTraslationValue("ACEPTAR") ?></button>
                        <a class="button is-link is-light" onclick="window.location.href = './index.php'"><?= getTraslationValue("CANCELAR") ?></a>
                    </div>
                </form>
            </div>
        </article>
    </div>
<?php } else if ($action == 'addProduct') {
    $product = new Product();
    $productList = $product->getAll();

    $productList = $product->getProductsNotInList($shoppingList->getId());
?>
    <!-- Código html que mostramos cuando recibimos una action de addProduct -->
    <div class="columns is-vcentered is-centered" style="height:90vh">
        <article class="panel is-primary" style="width:400px">

            <p class="panel-heading" style="text-align: center;">
            Añadir producto
            </p>
            <div class="box">
                <p style="text-align: center;"><?= getTraslationValue("DESPLEGABLE") ?></p>
                <br />
                <form action="" method="post">
                    <div style="text-aling: center; margin-bottom; 10px;">
                        <label for="products">Producto:</label>
                        <select name="selectedProduct" id="selectedProduct">
                            <?php foreach ($productList as $product) {
                                $selProductId = $product->getId();
                                $selProductName = $product->getName();
                                $selProductDescription = $product->getDescription() . " (" . $product->getUnitPrice() . " € por unidad)";
                            ?>
                                <option value="<?= $selProductId ?>" title="<?= $selProductDescription ?>"><?= $selProductName ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div style=" text-align: center; margin-bottom: 10px;">
                        <label for="productQuantity"><?= getTraslationValue("CANTIDAD") ?>:</label>
                        <input name="productQuantity" type="number" value="">
                    </div>
                    <input id="shoppingListId" name="shoppingListId" type="hidden" value="<?= $shoppingList->getId() ?>">
                    <div class="buttons is-centered">
                        <button class="button is-primary" type="submit"><?= getTraslationValue("ANYADIR_PRODUCTO") ?></button>
                        <a class="button is-link is-light" onclick="window.location.href = './index.php'"><?= getTraslationValue("CANCELAR") ?></a>
                    </div>
                </form>
            </div>
        </article>
    </div>
<?php } ?>

<!-- Como no queremos que se muestre una pàgina nueva, realizamos la acción de registrar el ususario desde esta
 misma página -->
 <?php include_once("controller/shoppingListAdministration.php"); ?>
 
 <!-- Footer -->
 <?php include_once("view/footerCmp.php"); ?>