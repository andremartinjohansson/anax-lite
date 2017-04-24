<?php

$sql = <<<EOD
SELECT
    *,
    CASE
        WHEN (deleted <= NOW()) THEN "isDeleted"
        WHEN (published <= NOW()) THEN "isPublished"
        ELSE "notPublished"
    END AS status
FROM content
WHERE type=?
;
EOD;
$resultset = $app->db->executeFetchAll($sql, ["page"]);

$app->router->add("pages", function () use ($app) {
    $app->renderDefaultLayout("pages/view-pages", "All Pages");
});

// $app->router->add("pages/**", function () use ($app) {
//     ifNotAdmin($app, "login");
// });

foreach ($resultset as $row) {
    $app->router->add("pages/" . $row->path, function () use ($app, $row) {
        $app->renderDefaultLayout("pages/page", $row->title);
    });
}
