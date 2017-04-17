<?php

$app->router->add("admin", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Admin Area"]);
    $app->view->add("includes/navbar");
    // $app->view->add("includes/flash");
    $app->view->add("admin/admin");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("edit", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Edit User"]);
    $app->view->add("includes/navbar");
    // $app->view->add("includes/flash");
    $app->view->add("admin/edit");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("update", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Update"]);
    $app->view->add("includes/navbar");
    // $app->view->add("includes/flash");
    $app->view->add("admin/update");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("delete", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Delete"]);
    $app->view->add("includes/navbar");
    // $app->view->add("includes/flash");
    $app->view->add("admin/delete");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("admin_create", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Create User"]);
    $app->view->add("includes/navbar");
    // $app->view->add("includes/flash");
    $app->view->add("admin/admin_create");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("add_user", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Adding User"]);
    $app->view->add("includes/navbar");
    // $app->view->add("includes/flash");
    $app->view->add("admin/add_user");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});
