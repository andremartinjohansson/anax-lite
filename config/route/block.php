<?php

$sql = "SELECT * FROM content WHERE type=?;";
$resultset = $app->db->executeFetchAll($sql, ["block"]);

$app->router->add("block", function () use ($app) {
    $app->renderDefaultLayout("block/view-blocks", "Blocks");
});

// $app->router->add("block/**", function () use ($app) {
//     ifNotAdmin($app, "login");
// });

foreach ($resultset as $row) {
    $app->router->add("block/" . $row->slug, function () use ($app, $row) {
        $app->renderDefaultLayout("block/block", $row->title);
    });
}
