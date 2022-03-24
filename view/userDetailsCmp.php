<?php
include_once("model/user.php");
$user = new user();
$user = $user->getByName("guillermo");
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
    </div>
</article>
