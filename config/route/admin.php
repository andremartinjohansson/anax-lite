<?php

$app->router->add("admin/**", function () use ($app) {
    ifNotAdmin($app, "login");
});

$app->router->add("admin", function () use ($app) {
    $app->renderDefaultLayout("admin/admin", "Admin Area", $byline = false, $flash = false);
});

$app->router->add("edit", function () use ($app) {
    $app->renderDefaultLayout("admin/edit", "Edit User", $byline = false, $flash = false);
});

$app->router->add("admin_create", function () use ($app) {
    $app->renderDefaultLayout("admin/admin_create", "Create User", $byline = false, $flash = false);
});

$app->router->add("add_user", function () use ($app) {
    ifNotPost($app, $_POST, "admin");

    $username = isset($_POST["name"]) ? htmlentities($_POST["name"]) : null;
    $userPass = isset($_POST["pass"]) ? htmlentities($_POST["pass"]) : null;
    $userRole = isset($_POST["user_role"]) ? htmlentities($_POST["user_role"]) : null;

    $app->admin->add($username, $userPass, $userRole);
});

$app->router->add("update", function () use ($app) {
    ifNotPost($app, $_POST, "admin");

    $username = (isset($_POST["name"])) ? $_POST["name"] : null;
    $password = (isset($_POST["pass"])) ? $_POST["pass"] : null;
    $oldUser = (isset($_POST["old_username"])) ? $_POST["old_username"] : null;
    $role = (isset($_POST["user_role"])) ? $_POST["user_role"] : null;

    $app->admin->update($username, $password, $oldUser, $role);
});

$app->router->add("delete", function () use ($app) {
    ifNotPost($app, $_POST, "admin");

    $username = (isset($_POST["username"])) ? $_POST["username"] : null;

    $app->admin->delete($username);
});
