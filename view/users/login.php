<?php

if ($app->session->has("name")) {
    $app->redirect("profile");
}

$user_loggedin = "";

// Make sure no one is logged in
if ($app->session->has("name")) {
    echo "<p>You are already logged in as " . $app->session->get('name') . "</p>";
    echo "<p><a href=" . $app->url->create('logout') . ">Logout</a></p>";
    $user_loggedin = "disabled";
}

?>

<main class="main">
    <article class="article-main article-user login">
        <form action="<?=$app->url->create('validate')?>" method="POST">
            <table>
                <legend><h3>Login</h3></legend>
                <?php
                if ($app->session->get("error") == "invalid login") {
                    echo "<p>Incorrect password. Try again or contact administrator.</p>";
                    $app->session->delete("error");
                } elseif ($app->session->get("error") == "user not found") {
                    echo "<p>Username doesn't exist.</p>";
                    $app->session->delete("error");
                }
                if ($app->session->get("success") == "logout") {
                    echo "<p>You've been logged out.</p>";
                    $app->session->delete("success");
                }
                ?>
                <tr>
                    <td><input class="input-default" type="text" name="name" <?=$user_loggedin?> placeholder="Username" required></td>
                </tr>
                <tr>
                    <td><input class="input-default" type="password" name="pass" <?=$user_loggedin?> placeholder="Password" required></td>
                </tr>
                <tr>
                    <td><input class="btn-green" type="submit" name="submitForm" value="Login" <?=$user_loggedin?>></td>
                </tr>
            </table>
        </form>
        <p>Don't have an account? <a href="<?=$app->url->create('register')?>">Sign up</a></p>
    </article>
</main>
