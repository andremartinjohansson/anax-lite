<?php

if ($app->session->get("role") != "admin") {
    echo "<p class='center'>You do not have permission to access this page. Return or you will be shot.</p>";
    header("Refresh:2; " . $app->url->create('login'));
} elseif (!$_POST) {
    header("Location: " . $app->url->create('admin'));
}

$username = (isset($_POST["username"])) ? $_POST["username"] : null;

if ($username != null) {
    if ($app->users->exists($username)) {
        $app->users->deleteUser($username);
        $app->session->set("success", "user deleted");
        header("Location: " . $app->url->create('admin'));
    } else {
        $app->session->set("error", "no such user");
        header("Location: " . $app->url->create('admin'));
    }
}
