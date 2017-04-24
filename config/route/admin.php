<?php

$app->router->add("admin/**", function () use ($app) {
    ifNotAdmin($app, "login");
});

$app->router->add("admin", function () use ($app) {
    $app->renderDefaultLayout("admin/admin", "Admin Area", $byline = false, $flash = false);
});

$app->router->add("edit", function () use ($app) {
    $app->renderDefaultLayout("admin/edit", "Edit User", $byline = false, $flash = false);
});

$app->router->add("admin_create", function () use ($app) {
    $app->renderDefaultLayout("admin/admin_create", "Create User", $byline = false, $flash = false);
});

$app->router->add("add_user", function () use ($app) {
    ifNotPost($app, $_POST, "admin");

    $username = $app->request->getPost("name");
    $userPass = $app->request->getPost("pass");
    $userRole = $app->request->getPost("user_role");

    $app->admin->add($username, $userPass, $userRole);
});

$app->router->add("update", function () use ($app) {
    ifNotPost($app, $_POST, "admin");

    $username = $app->request->getPost("name");
    $password = $app->request->getPost("pass");
    $oldUser = $app->request->getPost("old_username");
    $role = $app->request->getPost("user_role");

    $app->admin->update($username, $password, $oldUser, $role);
});

$app->router->add("delete", function () use ($app) {
    ifNotPost($app, $_POST, "admin");

    $username = $app->request->getPost("username");

    $app->admin->delete($username);
});

$app->router->add("admin/content", function () use ($app) {
    $app->renderDefaultLayout("admin/content", "Content", $byline = false, $flash = false);
});

$app->router->add("admin/edit_content", function () use ($app) {
    $app->renderDefaultLayout("admin/edit_content", "Edit Content", $byline = false, $flash = false);
});

$app->router->add("admin/create_content", function () use ($app) {
    $app->renderDefaultLayout("admin/create_content", "Create Content", $byline = false, $flash = false);
});

$app->router->add("admin/delete_content", function () use ($app) {
    $app->renderDefaultLayout("admin/delete_content", "Delete Content", $byline = false, $flash = false);
});

$app->router->add("admin/update_content", function () use ($app) {
    if ($app->request->getPost("doSave") !== null) {
        $params = $app->request->getPostArray([
            "title",
            "path",
            "slug",
            "data",
            "type",
            "filter",
            "publish",
            "id"
        ]);
        if (!$params["slug"]) {
            $params["slug"] = slugify($params["title"]);
        }
        if (!$params["path"]) {
            $params["path"] = null;
        }
        if (!$params["publish"]) {
            // $time = date('Y-m-d H:i:s');
            $params["publish"] = null;
        }
        $sql = "UPDATE content SET title=?, path=?, slug=?, data=?, type=?, filter=?, published=?, updated=NOW() WHERE id=?;";
        $app->db->execute($sql, array_values($params));
        $app->response->redirect($app->url->create("admin/content"));
    } elseif ($app->request->getPost("doCreate") !== null) {
        $title = $app->request->getPost("title");
        $sql = "INSERT INTO content (title) VALUES (?);";
        $app->db->execute($sql, [$title]);
        $id = $app->db->lastInsertId();
        $app->response->redirect($app->url->create("admin/edit_content") . "?id=" . $id);
    } elseif ($app->request->getPost("doDelete") !== null) {
        $id = $app->request->getPost("id");
        $app->response->redirect($app->url->create("admin/delete_content") . "?id=" . $id);
    } elseif ($app->request->getPost("confirmDelete") !== null) {
        $contentId = $app->request->getPost("id");
        $sql = "UPDATE content SET deleted=NOW() WHERE id=?;";
        $app->db->execute($sql, [$contentId]);
        $app->response->redirect($app->url->create("admin/content"));
    } elseif ($app->request->getGet("doPublish") !== null) {
        $contentId = $app->request->getGet("id");
        $sql = "UPDATE content SET published=NOW() WHERE id=?;";
        $app->db->execute($sql, [$contentId]);
        $app->response->redirect($app->url->create("admin/content"));
    } else {
        $app->redirect("admin/content");
    }
});
