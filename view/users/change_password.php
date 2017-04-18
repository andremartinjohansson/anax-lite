<main class="main profile">
    <article class="article-main article-user article-profile">
        <form action="<?=$app->url->create('password')?>" method="POST">
            <table>
                <legend><h3><?=$app->session->get("status")?></h3></legend>
                <tr>
                    <td><input class="input-default" type="password" name="old_pass" placeholder="Old Password" required></td>
                </tr>
                <tr>
                    <td><input class="input-default" type="password" name="new_pass" placeholder="New Password" required></td>
                </tr>
                <tr>
                    <td><input class="input-default" type="password" name="re_pass" placeholder="Confirm New Password" required></td>
                </tr>
                <tr>
                    <td><input class="btn-green" type="submit" name="submitForm" value="Change password"></td>
                </tr>
            </table>
        </form>
        <p><a href='<?=$app->url->create('profile')?>'>Back to profile</a></p>
    </article>
</main>
