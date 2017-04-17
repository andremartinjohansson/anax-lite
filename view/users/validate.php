<main class="main">
    <article class="article-main">

        <?php

        if (!$_POST) {
            header("Location: " . $app->url->create('login'));
            die();
        }

        $user_name = isset($_POST["name"]) ? htmlentities($_POST["name"]) : null;
        $user_pass = isset($_POST["pass"]) ? htmlentities($_POST["pass"]) : null;

        if ($user_name != null && $user_pass != null) {
            if ($app->users->exists($user_name)) {
                $get_hash = $app->users->getHash($user_name);
                // var_dump(password_hash('test', PASSWORD_DEFAULT));
                // $get_hash = password_hash($get_hash, PASSWORD_DEFAULT);
                if (password_verify($user_pass, $get_hash)) {
                    $app->session->set("name", $user_name);
                    $sql = "SELECT * FROM Users WHERE name='$user_name'";
                    $user = $app->db->executeFetchAll($sql)[0];
                    $app->session->set("role", $user->role);
                    header("Location: " . $app->url->create('profile'));
                } else {
                    $app->session->set("error", "invalid login");
                    header("Location: " . $app->url->create('login'));
                }
            } else {
                $app->session->set("error", "user not found");
                header("Location: " . $app->url->create('login'));
            }
        }

        ?>

    </article>
</main>
