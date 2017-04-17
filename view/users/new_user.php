<main class="main">
    <article class="article-main">

        <?php

        if (!$_POST) {
            header("Location: " . $app->url->create('create_user'));
            die();
        }

        $user_name = isset($_POST["new_name"]) ? htmlentities($_POST["new_name"]) : null;
        $user_pass = isset($_POST["new_pass"]) ? htmlentities($_POST["new_pass"]) : null;
        $re_user_pass = isset($_POST["re_pass"]) ? htmlentities($_POST["re_pass"]) : null;

        if (!$app->users->exists($user_name)) {
            if ($user_pass != $re_user_pass) {
                $app->session->set("error", "password mismatch");
                header("Location: " . $app->url->create('create_user'));
            } else {
                $crypt_pass = password_hash($user_pass, PASSWORD_DEFAULT);
                $app->users->addUser($user_name, $crypt_pass);
                $app->session->set("success", "user created");
                $app->session->set("temp", $user_name);
                header("Location: " . $app->url->create('create_user'));
            }
        } else {
            $app->session->set("error", "already exists");
            header("Location: " . $app->url->create('create_user'));
        }
        ?>

    </article>
</main>
