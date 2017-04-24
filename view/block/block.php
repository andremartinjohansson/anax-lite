<?php

$route = $app->request->getRoute();
$parts = explode("/", $route);
$slug = $parts[1];

$sql = "SELECT * FROM content WHERE slug=? AND type=?;";

$content = $app->db->executeFetchAll($sql, [$slug, "block"])[0];
if (!$content) {
    $app->redirect("404");
}

$text = $app->format->doFilter($content->data, $content->filter);

?>


<main class="main">
    <article class="article-main">
        <h1><?=$content->title?> preview</h1>
        <div class="preview-content">
            <?= $text ?>
        </div>
    </article>
</main>
