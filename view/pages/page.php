<?php

$route = $app->request->getRoute();
$parts = explode("/", $route);
$path = $parts[1];

$sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS modified_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS modified
FROM content
WHERE
    path = ?
    AND type = ?
    AND (deleted IS NULL OR deleted > NOW())
    AND published <= NOW()
;
EOD;

$content = $app->db->executeFetchAll($sql, [$path, "page"])[0];
if (!$content) {
    $app->redirect("404");
}

$text = $app->format->doFilter($content->data, $content->filter);

?>


<main class="main">
    <article class="article-main">
        <header>
            <h1><?= $app->format->htmlentities($content->title) ?></h1>
            <p><i>Latest update: <time datetime="<?= $app->format->htmlentities($content->modified_iso8601) ?>" pubdate><?= $app->format->htmlentities($content->modified) ?></time></i></p>
        </header>
        <?= $text ?>
    </article>
</main>
