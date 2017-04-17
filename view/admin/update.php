<?php

if ($app->session->get("role") != "admin") {
    echo "<p class='center'>You do not have permission to access this page. Return or you will be shot.</p>";
    header("Refresh:2; " . $app->url->create('login'));
} elseif (!$_POST) {
    header("Location: " . $app->url->create('admin'));
}

$username = (isset($_POST["name"])) ? $_POST["name"] : null;
$password = (isset($_POST["pass"])) ? $_POST["pass"] : null;
$old_user = (isset($_POST["old_username"])) ? $_POST["old_username"] : null;

$role = (isset($_POST["user_role"])) ? $_POST["user_role"] : null;

if ($username != null && $old_user != null) {
    if (!$app->users->exists($username) || $old_user == $username) {
        $app->users->updateUser($old_user, $password, $username, $role);
        $app->session->set("success", "user updated");
        header("Location: " . $app->url->create('admin'));
    } else {
        $app->session->set("error", "already exists");
        header("Location: " . $app->url->create('admin'));
    }
}
