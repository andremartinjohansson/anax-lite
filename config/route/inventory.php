<?php

$app->router->add("inventory/**", function () use ($app) {
    ifNotAdmin($app, "login");
});

$app->router->add("inventory", function () use ($app) {
    $app->renderDefaultLayout("inventory/products", "Products");
});

$app->router->add("inventory/edit_product", function () use ($app) {
    $app->renderDefaultLayout("inventory/edit_product", "Edit Product", $byline = false, $flash = false);
});

$app->router->add("inventory/add_product", function () use ($app) {
    $app->renderDefaultLayout("inventory/add_product", "Add Product", $byline = false, $flash = false);
});

$app->router->add("inventory/update", function () use ($app) {
    if ($app->request->getPost("doSave") !== null) {
        $params = $app->request->getPostArray([
            "id",
            "title",
            "description",
            "image",
            "price",
            "inventory"
        ]);
        $sql = "CALL updateProduct(?, ?, ?, ?, ?, ?);";
        $app->db->execute($sql, array_values($params));
        $app->response->redirect($app->url->create("inventory"));
    } elseif ($app->request->getPost("doAdd") !== null) {
        $params = $app->request->getPostArray([
            "title",
            "description",
            "image",
            "price",
            "inventory"
        ]);
        $sql = "CALL addProduct(?, ?, ?, ?, ?);";
        $app->db->execute($sql, array_values($params));
        $app->response->redirect($app->url->create("inventory"));
    } elseif ($app->request->getGet("doDelete") !== null) {
        $id = $app->request->getGet("doDelete");
        $sql = "CALL deleteProduct(?);";
        $app->db->execute($sql, [$id]);
        $app->response->redirect($app->url->create("inventory"));
    } else {
        $app->redirect("inventory");
    }
});
