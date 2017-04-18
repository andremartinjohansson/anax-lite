<?php

$_COOKIE["role"] = $app->session->get('role');

?>

<main class="main profile">
    <article class="article-main article-profile">

        <h1>Welcome <?=$app->session->get('name')?>! This is your profile.</h1>

        <p>Account role (cookie): <?=$_COOKIE["role"]?></p>

        <?php
        if ($_COOKIE["role"] == "admin") {?>
            <p><a class='profile-item' href="<?=$app->url->create('admin')?>">Admin page</a></p><?php
        }?>

        <p><a class='profile-item' href="<?=$app->url->create('password')?>">Change password</a></p>
        <p><a class='profile-item' href="<?=$app->url->create('logout')?>">Logout</a></p>

    </article>
</main>
