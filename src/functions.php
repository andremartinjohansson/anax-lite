<?php

function ifNotPost($app, $posted, $route)
{
    if (!$posted) {
        $app->redirect($route);
    }
}

function ifNotLoggedIn($app, $route)
{
    if (!$app->session->has("name")) {
        $app->redirect($route);
    }
}

function ifNotAdmin($app, $route)
{
    if ($app->session->get("role") != "admin") {
        $app->redirect($route);
    }
}
