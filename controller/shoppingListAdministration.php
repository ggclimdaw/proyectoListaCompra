<?php 
$user = getUserSession();
$action = $_GET['action'];
if (!empty($_POST)) {

    $isShoppingListOk = false;

    switch ($action) {
        case 'create':
            if (!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["urlImagen"])) {
                $nombreLista = $_POST["name"];
                $descripcionLista = $_POST["description"];
                $urlImagenLista = $_POST["urlImagen"];
                // 1 recuperamos el valor del campo oculto.
                $shoppingListId = intval($_POST["shoppingListId"]);
                if ($shoppingListId == -1) {
                    // 2 se ejecuta la lógica de creación de una lista puesto que el if anterior determina que, al tener id = -1 la lista, estamos generando una nueva.
                    $shoppingList = new ShoppingList(-1, $nombreLista, $descripcionLista, $user->getId(), $urlImagenLista);
                    $isShoppingListOk = $shoppingList->Create();
                }
            }
            break;

        case 'update':
            $nombreLista = $_POST["name"];
            $descripcionLista = $_POST["description"];
            $urlImagenLista = $_POST["urlImagen"];
            // 1 recuperamos el valor del campo oculto.
            $shoppingListId = intval($_POST["shoppingListId"]);
                // 3 se ejecuta la lógica de modificación
                $isShoppingListOk = $shoppingList->update($shoppingListId, $nombreLista, $descripcionLista, $urlImagenLista);
            
            break;

        case 'delete':
                    // Gestió de la eliminació
                $shoppingListId = intval($_POST["shoppingListId"]);
                $isShoppingListOk = $shoppingList->delete($shoppingListId);
                $shoppingListElement = new shoppingListElement();
                $isShoppingListOk = $isShoppingListOk && $shoppingListElement->deleteListItems($shoppingListId);
            break;

        case 'deleteProduct':
            $shoppingListElement = new shoppingListElement();
            $shoppingListItemId = $_GET['shoppingListItemId'];
            $isShoppingListOk = $shoppingListElement->delete($shoppingListItemId);
            break;

        case 'addProduct':
            if (!empty($_POST["selectedProduct"]) && !empty($_POST["productQuantity"])) {
                $selectedProductId = intval($_POST["selectedProduct"]);
                $productQuantity = floatval($_POST["productQuantity"]);
                $shoppingListId = intval($_POST["shoppingListId"]);
                $shoppingListElement = new shoppingListElement();
                $isShoppingListOk = $shoppingListElement->addListItem($shoppingListId, $selectedProductId, $productQuantity);
            }
            break;     
        
        
    }

    
        
    // Redireccionamos a index.php si la acción (modificación, creación o eliminiación) a funcionado correctamente
    if ($isShoppingListOk) {
        header('Location: ' . constant('URL_BASE'));
    }
    $_POST = array();
    
}

