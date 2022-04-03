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
    <p class="panel-heading">
        Información de usuario
    </p>
    <div class="box">
        <div>
            <h2><?= $user->getName() ?></h2>
            <h2><?= $user->getUsername() ?></h2>
            <h2><?= $user->getAddress() ?></h2>
            <h3><?= $user->getEmail() ?></h3>
            <div style="text-align: center;"><img src=<?= $user->getAvatarImage() ?> width="200" height="200"></div>
        </div>
        <?php
        if ($userInSession) {
        ?>
            <div style="text-align: right;">
                <button class="button is-rounded" title="Editar" onclick="window.location.href = './userEditPage.php'">/</button>
            </div>  
        <?php  
        }
        ?>
    </div>
</article>
