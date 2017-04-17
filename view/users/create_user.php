<main class="main">
    <article class="article-main article-user register">
        <form action="<?=$app->url->create('new_user')?>" method="POST">
            <table>
                <legend><h3>Register</h3></legend>
                <?php
                if ($app->session->get("error") == "password mismatch") {
                    echo "<p>Passwords do not match. Try again.</p>";
                    $app->session->delete("error");
                } elseif ($app->session->get("error") == "already exists") {
                    echo "<p>Username is already taken. Try another.</p>";
                    $app->session->delete("error");
                } elseif ($app->session->get("success") == "user created") {
                    echo "<p>Successfully created user<i> " . $app->session->get("temp") . "</i>. You can now <a href=" . $app->url->create('login') . ">Login</a></p>";
                    $app->session->delete("success");
                    $app->session->delete("temp");
                }
                ?>
                <tr>
                    <td><input class="input-default" type="text" name="new_name" placeholder="Username" required></td>
                </tr>
                <tr>
                    <td><input class="input-default" type="password" name="new_pass" placeholder="Password" required></td>
                </tr>
                <tr>
                    <td><input class="input-default" type="password" name="re_pass" placeholder="Confirm password" required></td>
                </tr>
                <tr>
                    <td><input class="btn-green" type="submit" name="submitCreateForm" value="Register"></td>
                </tr>
            </table>
        </form>
        <p>Already have an account? <a href='<?=$app->url->create('login')?>'>Login</a></p>
    </article>
</main>
