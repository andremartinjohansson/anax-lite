<?php

if ($app->session->get("role") != "admin") {
    echo "<p class='center'>You do not have permission to access this page. Return or you will be shot.</p>";
    header("Refresh:2; " . $app->url->create('login'));
}

?>

<main class="main profile">
    <article class="article-main article-user article-profile">
        <form action="<?=$app->url->create('add_user')?>" method="POST">
            <table>
                <legend><h3>New user</h3></legend>
                <tr>
                    <td><input class="input-default" type="text" name="name" placeholder="Username" required></td>
                </tr>
                <tr>
                    <td><input class="input-default" type="password" name="pass" placeholder="Password" required></td>
                </tr>
                <tr>
                    <td>
                        <select name="user_role">
                            <option class="input-default" value="user">Role: User</option>
                            <option class="input-default" value="admin">Role: Admin</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input class="btn-green" type="submit" value="Save"></td>
                </tr>
            </table>
        </form>
    </article>
</main>
