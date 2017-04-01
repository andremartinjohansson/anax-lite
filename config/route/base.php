<?php

$app->router->add("", function () use ($app) {
    $app->view->add("views/header", ["title" => "Start"]);
    $app->view->add("views/navbar", ["home" => "active"]);
    $app->view->add("views/flash");
    $app->view->add("views/home");
    $app->view->add("views/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("about", function () use ($app) {
    $app->view->add("views/header", ["title" => "Om webbplatsen"]);
    $app->view->add("views/navbar", ["about" => "active"]);
    $app->view->add("views/flash");
    $app->view->add("views/about");
    $app->view->add("views/byline");
    $app->view->add("views/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("report", function () use ($app) {
    $app->view->add("views/header", ["title" => "Redovisningar"]);
    $app->view->add("views/navbar", ["report" => "active"]);
    $app->view->add("views/flash");
    $app->view->add("views/report");
    $app->view->add("views/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("test", function () use ($app) {
    $app->view->add("views/header", ["title" => "Test"]);
    $app->view->add("views/navbar", ["test" => "active"]);
    $app->view->add("views/flash");
    $app->view->add("views/test");
    $app->view->add("views/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});
