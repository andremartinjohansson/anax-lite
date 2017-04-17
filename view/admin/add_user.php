<?php

if ($app->session->get("role") != "admin") {
    echo "<p class='center'>You do not have permission to access this page. Return or you will be shot.</p>";
    header("Refresh:2; " . $app->url->create('login'));
} elseif (!$_POST) {
    header("Location: " . $app->url->create('admin'));
}

?>

<main class="main profile">
    <article class="article-main article-user article-profile">

        <?php

        $user_name = isset($_POST["name"]) ? htmlentities($_POST["name"]) : null;
        $user_pass = isset($_POST["pass"]) ? htmlentities($_POST["pass"]) : null;
        $user_role = isset($_POST["user_role"]) ? htmlentities($_POST["user_role"]) : null;

        if (!$app->users->exists($user_name)) {
            $crypt_pass = password_hash($user_pass, PASSWORD_DEFAULT);
            $app->users->addUser($user_name, $crypt_pass, $user_role);
            $app->session->set("success", "user created");
            header("Location: " . $app->url->create('admin'));
        } else {
            $app->session->set("error", "already exists");
            header("Location: " . $app->url->create('admin'));
        }
        ?>

    </article>
</main>
