<?php
include_once("model/user.php");
$user =new user(1, "Nom usuari", "correu@correu.com", "https://gravatar.com/avatar/b3b00f7ff897d0761582eac881253706?s=200&d=robohash&r=x");
?>

<article class="panel is-primary">
    <p class="panel-heading">
        Información de usuario
    </p>
    <div class="box">
        <div>
            <h2><?= $user->getName() ?></h2>
            <h3><?= $user->getEmail() ?></h3>
            <div style="text-align: center;"><img src=<?= $user->getAvatarImage() ?> width="200" height="200"></div>
        </div>
    </div>
</article>
