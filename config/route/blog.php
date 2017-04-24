<?php

$sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
    FROM content
WHERE type=?
ORDER BY published DESC
;
EOD;
$resultset = $app->db->executeFetchAll($sql, ["post"]);

$app->router->add("blog", function () use ($app) {
    $app->renderDefaultLayout("blog/view-posts", "Blog");
});

foreach ($resultset as $row) {
    $app->router->add("blog/" . $row->slug, function () use ($app, $row) {
        $app->renderDefaultLayout("blog/post", $row->title);
    });
}
