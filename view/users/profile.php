<main class="main profile">
    <article class="article-main article-profile">

        <?php
        if (!$app->session->has("name")) {
            header("Location: " . $app->url->create('login'));
        }

        $_COOKIE["role"] = $app->session->get('role');

        echo "<h1>Welcome " . $app->session->get('name') . "! This is your profile.</h1>";

        echo "<p>Account role (cookie): " . $_COOKIE["role"] . "</p>";

        // echo "<p>You are logged in as " . $app->session->get('name') . "</p>";

        if ($_COOKIE["role"] == "admin") {
            echo "<p><a class='profile-item' href=" . $app->url->create('admin') . ">Admin page</a></p>";
        }

        echo "<p><a class='profile-item' href=" . $app->url->create('change_password') . ">Change password</a></p>";

        echo "<p><a class='profile-item' href=" . $app->url->create('logout') . ">Logout</a></p>";
        ?>

    </article>
</main>
