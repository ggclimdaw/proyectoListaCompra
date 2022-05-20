<?php

include_once("model/product.php");
$user = getUserSession();
$productList = new Product();

?>

<article class="panel is-primary">

<?php

?>     
        <div class="panel-heading" style="text-align: center;">
            <p><?= getTraslationValue("LISTADO_DE_PRODUCTOS") ?></p>
            
        
           
        </div>
    <div class="box">
        <table class="table is-fullwidth is-bordered is-striped is-narrow is-hoverable is-fullwidth">
         <thead>
             <tr>
                 
                 <th style="text-align:center"><?= getTraslationValue("NOMBRE") ?></th>
                 <th style="text-align:center"><?= getTraslationValue("DESCRIPCION") ?></th>
                 <th style="text-align:center"><?= getTraslationValue("PRECIO_UNIDAD") ?></th>
                 <th style="text-align:center"><?= getTraslationValue("IMAGEN") ?></th>
                 
             </tr>
         </thead>

          <!-- fer una consulta mostrant els resultat utilitzant la funció getAll() de product.php -->
         <tbody>
         <?php
             $productListElements = array();
             $productElement = new Product();
             $productListElements = $productElement->getAll();
            
             foreach ($productListElements as $productItem){
                
                 print("<tr>
                        <td>{$productItem->getName()}</td>
                        <td style=\"text-align:center\">{$productItem->getDescription()}</td>
                        <td style=\"text-align:center\">{$productItem->getUnitPrice()}</td>
                        <td style=\"text-align:center\">
                            <img src='{$productItem->getImage()}' width='100' height='100' alt='{$productItem->getName()}'>
                        </td>                        
                    </tr>");
             }
             print("<tfoot><th colspan=\"3\">Productos Totales</th><th style=\"text-align:center\">" .count($productListElements)."</th></tfoot>");
             ?>
         </tbody>   
        
      
        </table>
           
    </div>
<?php

?>
    
</article>