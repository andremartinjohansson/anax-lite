<?php

if ($app->session->get("role") != "admin") {
    echo "<p class='center'>You do not have permission to access this page. Return or you will be shot.</p>";
    header("Refresh:2; " . $app->url->create('login'));
}

$username = (isset($_GET["username"])) ? $_GET["username"] : null;
$role = (isset($_GET["role"])) ? $_GET["role"] : null;

?>


<main class="main profile">
    <article class="article-main article-user article-profile">
        <form action="<?=$app->url->create('update')?>" method="POST">
            <input type="hidden" name="old_username" value="<?=$username?>">
            <table>
                <legend><h3>Edit user <?=$username?> (leave password blank for same)</h3></legend>
                <tr>
                    <td><input class="input-default" type="text" name="name" value="<?=$username?>" placeholder="Username" required></td>
                </tr>
                <tr>
                    <td><input class="input-default" type="password" name="pass" placeholder="Password"></td>
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
