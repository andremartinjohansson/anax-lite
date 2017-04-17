<?php

$app->router->add("session/increase", function () use ($app) {
    if ($app->session->has("value")) {
        $val = $app->session->get("value");
    } else {
        $val = 0;
    }
    $app->session->set("value", $val + 1);
    $app->response->redirect($app->url->create("session"));
});

$app->router->add("session/decrease", function () use ($app) {
    if ($app->session->has("value")) {
        $val = $app->session->get("value");
    } else {
        $val = 0;
    }
    $app->session->set("value", $val - 1);
    $app->response->redirect($app->url->create("session"));
});

$app->router->add("session/dump", function () use ($app) {
    $app->view->add("includes/header", ["title" => "Session"]);
    $app->view->add("includes/navbar");
    $app->view->add("includes/flash");
    $app->view->add("base/session");
    $app->view->add("includes/footer");

    $app->response->setBody([$app->view, "render"])
                  ->send();
});

$app->router->add("session/destroy", function () use ($app) {
    $app->session->destroy();
    $app->response->redirect($app->url->create("session/dump"));
});

$app->router->add("session/status", function () use ($app) {
    $data = [
        "Session name" => session_name(),
        "Session id" => session_id(),
        "Session status" => session_status(),
    ];

    $app->response->sendJson($data);
});
