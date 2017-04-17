<main class="main">
    <article class="article-main">

        <?php
        if ($app->session->has("name")) {
            $app->session->destroy();
        } else {
            header("Location: " . $app->url->create('login'));
            die();
        }

        $has_session = session_status() == PHP_SESSION_ACTIVE;

        if (!$has_session) {
            $app->session->set("success", "logout");
            header("Location: " . $app->url->create('login'));
        }

        ?>

    </article>
</main>
