<?php

$app->router->add("login", function () use ($app) {
    $app->renderDefaultLayout("users/login", "Login");
});

$app->router->add("logout", function () use ($app) {
    $app->users->logout();
});

$app->router->add("register", function () use ($app) {
    $app->renderDefaultLayout("users/create_user", "Register");
});

$app->router->add("profile", function () use ($app) {
    ifNotLoggedIn($app, "login");
    $app->renderDefaultLayout("users/profile", "Your Profile", $byline = false, $flash = false);
});

$app->router->add("password", function () use ($app) {
    ifNotLoggedIn($app, "login");

    $oldPass = isset($_POST["old_pass"]) ? htmlentities($_POST["old_pass"]) : null;
    $newPass = isset($_POST["new_pass"]) ? htmlentities($_POST["new_pass"]) : null;
    $rePass = isset($_POST["re_pass"]) ? htmlentities($_POST["re_pass"]) : null;

    $app->users->handlePasswordChange($oldPass, $newPass, $rePass);

    $app->renderDefaultLayout("users/change_password", "Change Password", $byline = false, $flash = false);
    $app->session->delete("status");
});

$app->router->add("validate", function () use ($app) {
    ifNotPost($app, $_POST, "login");

    $username = isset($_POST["name"]) ? htmlentities($_POST["name"]) : null;
    $userPass = isset($_POST["pass"]) ? htmlentities($_POST["pass"]) : null;

    $app->users->validateLogin($username, $userPass);
});

$app->router->add("new_user", function () use ($app) {
    ifNotPost($app, $_POST, "register");

    $username = isset($_POST["new_name"]) ? htmlentities($_POST["new_name"]) : null;
    $userPass = isset($_POST["new_pass"]) ? htmlentities($_POST["new_pass"]) : null;
    $reUserPass = isset($_POST["re_pass"]) ? htmlentities($_POST["re_pass"]) : null;

    $app->users->handleNewUser($username, $userPass, $reUserPass);
});
