<?php
    //include_once("model/user.php");
    //$user = new user();
    //$user = $user->getByName("pepe");

    $user =getUserSession();
    $userInSession = True;
    if ($user == null){
        $user = new User();
        $userInSession = false;
    }
?>

<article class="panel is-primary">
    <p class="panel-heading" style="text-align: center;">
    <?= getTraslationValue("INFORMACION_USUARIO") ?></p>
    <div class="box">
        <div>
            <h2><b><?= $user->getName() ?></b></h2>
            <h3><?= $user->getEmail() ?></h3>
            <div style="text-align: center;"><img src=<?= $user->getAvatarImage() ?> width="200" height="200"></div>
        </div>
        <?php
        if ($userInSession) {
        ?>
            <div style="text-align: right;">
                <button class="button is-rounded" title="Editar" onclick="window.location.href = './userEditPage.php'">✏️</button>
            </div>  
        <?php  
        }
        ?>
    </div>
</article>
