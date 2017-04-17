<?php

if (!$app->session->has("name")) {
    header("Location: " . $app->url->create('login'));
}

$user = $app->session->get("name");
$status = "Change password";

$old_pass = isset($_POST["old_pass"]) ? htmlentities($_POST["old_pass"]) : null;
$new_pass = isset($_POST["new_pass"]) ? htmlentities($_POST["new_pass"]) : null;
$re_pass = isset($_POST["re_pass"]) ? htmlentities($_POST["re_pass"]) : null;

if ($old_pass != null && $new_pass != null && $re_pass != null) {
    if (password_verify($old_pass, $app->users->getHash($user))) {
        if ($new_pass == $re_pass) {
                $crypt_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $app->users->changePassword($user, $crypt_pass);
                $status = "Password changed.";
        } else {
            $status = "The passwords do not match.";
        }
    } else {
        $status = "Old password is incorrect.";
    }
} else {
    $status = "All fields must be filled.";
}

?>

<main class="main profile">
    <article class="article-main article-user article-profile">
        <form action="<?=$app->url->create('change_password')?>" method="POST">
            <table>
                <legend><h3><?=$status?></h3></legend>
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
