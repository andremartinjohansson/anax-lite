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

    $oldPass = $app->request->getPost("old_pass");
    $newPass = $app->request->getPost("new_pass");
    $rePass = $app->request->getPost("re_pass");

    $app->users->handlePasswordChange($oldPass, $newPass, $rePass);

    $app->renderDefaultLayout("users/change_password", "Change Password", $byline = false, $flash = false);
    $app->session->delete("status");
});

$app->router->add("validate", function () use ($app) {
    ifNotPost($app, $_POST, "login");

    $username = $app->request->getPost("name");
    $userPass = $app->request->getPost("pass");

    $app->users->validateLogin($username, $userPass);
});

$app->router->add("new_user", function () use ($app) {
    ifNotPost($app, $_POST, "register");

    $username = $app->request->getPost("new_name");
    $userPass = $app->request->getPost("new_pass");
    $reUserPass = $app->request->getPost("re_pass");

    $app->users->handleNewUser($username, $userPass, $reUserPass);
});
