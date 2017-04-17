<?php

$app->router->addInternal("404", function () use ($app) {
    $app->view->add("includes/header", ["title" => "404 Not Found"]);
    $app->view->add("includes/navbar");
    $app->view->add("includes/flash");
    $app->view->add("internal/404");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send(404);
});

$app->router->add("status", function () use ($app) {
    $data = [
        "Server" => php_uname(),
        "PHP version" => phpversion(),
        "Included files" => count(get_included_files()),
        "Memory used" => memory_get_peak_usage(true),
        "Execution time" => microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'],
    ];

    $app->response->sendJson($data);
});
