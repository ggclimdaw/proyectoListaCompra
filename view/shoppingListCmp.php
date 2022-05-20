<?php

include_once("model/shoppingListElement.php");
$user = getUserSession();
$shoppingList = new ShoppingList();
if ($user != null) {
    $shoppingList = $shoppingList->getByUserId($user->getId());
}

?>

<article class="panel is-primary">
<?php
 if ($shoppingList->getId() != -1) {
?>     
        <div class="panel-heading" style="text-align: center;">
            <p>
            <?= getTraslationValue("LISTA_COMPRA") ?> - <i><?= $shoppingList->getName() ?></i><br />
            <?= $shoppingList->getDescription() ?> <br />
        
            <div style="text-align: center;"><img src=<?= $shoppingList->getUrlImagen() ?> width="100" height="100"></div>
            </p>

            <div style="display: flex;flex-direction: row; justify-content: flex-end;">
                <button class="button is-rounded" title="Editar" onclick="window.location.href = './shoppingListAdministrationPage.php?action=update'">✏️</button>
                <button class="button is-rounded" title="Eliminar" onclick="window.location.href = './shoppingListAdministrationPage.php?action=delete'">🗑️</button>
            </div>
        </div>
    <div class="box">
        <table class="table is-fullwidth is-bordered is-striped is-narrow is-hoverable is-fullwidth">
         <thead>
             <tr>
                 
                 <th style="text-align:center"><?= getTraslationValue("PRODUCTO") ?></th>
                 <th style="text-align:center"><?= getTraslationValue("CANTIDAD") ?></th>
                 <th style="text-align:center"><?= getTraslationValue("PRECIO_UNIDAD") ?></th>
                 <th style="text-align:center"><?= getTraslationValue("TOTAL") ?></th>
                 <th style="text-align:center"><?= getTraslationValue("ACCIONES") ?></th>
             </tr>
         </thead>
         <tbody>
             <?php
             $shoppingListElements = array();
             $shoppingElement = new shoppingListElement();
             $shoppingListElements = $shoppingElement->getShoppingItemsList($shoppingList->getId());
             $total = 0;
             foreach ($shoppingListElements as $shoppingItem){
                 $productTotal = $shoppingItem->getQuantity() * $shoppingItem->getPrice();
                 $total = $total + $productTotal;

                 print("<tr>
                        <td>{$shoppingItem->getName()}</td>
                        <td style=\"text-align:center\">{$shoppingItem->getQuantity()}</td>
                        <td style=\"text-align:center\">{$shoppingItem->getPrice()}</td>
                        <td style=\"text-align:center\">$productTotal</td>
                        <td style=\"text-align:center\">
                            <button class=\"button\" onclick=\"window.location.href = './shoppingListAdministrationPage.php?action=deleteProduct&shoppingListItemId={$shoppingItem->getId()}&shoppingItemName={$shoppingItem->getName()}'\">🗑️</button>
                        </td>
                    </tr>");
             }
             print("<tfoot><th colspan=\"3\">TOTAL</th><th>$total €</th></tfoot>");
             ?>
         </tbody>   
        </table>
            <div style="text-align: right;">
                <button class="button is-rounded" title="Añador producto"
                onclick="window.location.href ='./shoppingListAdministrationPage.php?action=addProduct'">➕<?= getTraslationValue("ANYADIR_PRODUCTO") ?></button>
            </div>

    </div>
<?php
}else {
?>
    <div class="notification is-primary" style="text-aling: center; ">
    <p style="margin-bottom: 10px; "> <?= getTraslationValue("DISPONE_LISTA_COMPRA") ?> </p>
    <button class="button" onclick="window.location.href = './shoppingListAdministrationPage.php?action=create'">📝<?= getTraslationValue("NUEVA") ?></button>
    </div>     

<?php
 }
?>
</article>