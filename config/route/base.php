<?php

$app->router->add("", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Start"]);
    $app->view->add("includes/navbar");
    $app->view->add("includes/flash");
    $app->view->add("base/home");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("about", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Om webbplatsen"]);
    $app->view->add("includes/navbar");
    $app->view->add("includes/flash");
    $app->view->add("base/about");
    $app->view->add("includes/byline");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("report", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Redovisningar"]);
    $app->view->add("includes/navbar");
    $app->view->add("includes/flash");
    $app->view->add("base/report");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("test", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Test"]);
    $app->view->add("includes/navbar");
    $app->view->add("includes/flash");
    $app->view->add("base/test");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("session", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Session"]);
    $app->view->add("includes/navbar");
    $app->view->add("includes/flash");
    $app->view->add("base/session");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("calendar", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Calendar"]);
    $app->view->add("includes/navbar");
    $app->view->add("includes/flash");
    $app->view->add("base/calendar");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});
