<?php

$app->router->add("login", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Login"]);
    $app->view->add("includes/navbar");
    $app->view->add("includes/flash");
    $app->view->add("users/login");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("validate", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Validating..."]);
    $app->view->add("includes/navbar");
    // $app->view->add("includes/flash");
    $app->view->add("users/validate");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("logout", function () use ($app) {
    $app->view->add("includes/header", ["title" => "You logged out"]);
    $app->view->add("includes/navbar");
    // $app->view->add("includes/flash");
    $app->view->add("users/logout");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("create_user", function () use ($app) {
    $app->view->add("includes/header", ["title" => "New User"]);
    $app->view->add("includes/navbar");
    $app->view->add("includes/flash");
    $app->view->add("users/create_user");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("new_user", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Creating user..."]);
    $app->view->add("includes/navbar");
    // $app->view->add("includes/flash");
    $app->view->add("users/new_user");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("profile", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Profile"]);
    $app->view->add("includes/navbar");
    // $app->view->add("includes/flash");
    $app->view->add("users/profile");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("change_password", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Change Password"]);
    $app->view->add("includes/navbar");
    // $app->view->add("includes/flash");
    $app->view->add("users/change_password");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});
