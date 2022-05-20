<?php include_once('view/headerCmp.php');
    //Activitat 3 punt 7
     $user = getUserSession();
    if ($user == null) {
        header('Location: ' . constant('URL_BASE') . 'loginPage.php');
    }
?>

<!-- Sección principal -->
<section class="section" id="seccionPrincipal">
    <div class="container">
    <div class="columns">
    <div class="column">
        <?php include("view/userDetailsCmp.php");?>
        </div>
    <div class="column is-three-quarters">
        <?php include_once("view/shoppingListCmp.php"); ?>
    </div>  
    </div>
    </div>
</section>



<?php include_once('view/footerCmp.php');?>

