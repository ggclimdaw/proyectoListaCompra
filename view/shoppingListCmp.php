<?php

include_once("model/shoppingListElement.php");

$shoppingListElements = array();
$shoppingListElements[0] = new shoppingListElement(1, "Peras", "Fruta", 2, 1);
$shoppingListElements[1] = new shoppingListElement(1, "Uvas", "Fruta", 3, 2);
$shoppingListElements[2] = new shoppingListElement(1, "Cerezas", "Fruta", 1, 1.5);

$shoppingListName = "Lista molona"

?>

<article class="panel is-primary">
    <p class="panel-heading" style="text-align: center;">
    Lista de la compra - <i><?= $shoppingListName ?></i>
    </p>
    <div class="box">
        <table class="table is-fullwidth is-bordered is-striped is-narrow is-hoverable is-fullwidth">
         <thead>
             <tr>
                 <th>Producto</th>
                 <th>Categoria</th>
                 <th>Cantidad</th>
                 <th>Total</th>
             </tr>
         </thead>
         <tbody>
             <?php
             $total = 0;
             foreach ($shoppingListElements as $shoppingItem){
                 $productTotal = $shoppingItem->getQuantity() * $shoppingItem->getPrice();
                 $total = $total + $productTotal;
                 print("<tr><td>{$shoppingItem->getCatProduct()}</td><td>{$shoppingItem->getName()}</td><td>{$shoppingItem->getQuantity()}</td><td>$productTotal</td></tr>");
             }
             print("<tfoot><th colspan=\"3\">TOTAL</th><th>$total</th></tfoot>");
             ?>
         </tbody>   
        </table>
    </div>
</article>