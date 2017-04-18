<?php

// $app->renderDefaultLayout($route, $title, $byline = false, $flash = true);

$app->router->add("", function () use ($app) {
    $app->renderDefaultLayout("base/home", "Start");
});

$app->router->add("about", function () use ($app) {
    $app->renderDefaultLayout("base/about", "About", $byline = true);
});

$app->router->add("report", function () use ($app) {
    $app->renderDefaultLayout("base/report", "Reports");
});

$app->router->add("test", function () use ($app) {
    $app->renderDefaultLayout("base/test", "Testpage");
});

$app->router->add("session", function () use ($app) {
    $app->renderDefaultLayout("base/session", "Session");
});

$app->router->add("calendar", function () use ($app) {
    $app->renderDefaultLayout("base/calendar", "Calendar");
});
