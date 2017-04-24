<?php

$sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
    FROM content
WHERE
    type=?
    AND published <= NOW()
ORDER BY published DESC
;
EOD;
$resultset = $app->db->executeFetchAll($sql, ["post"]);

?>


<main class="main">
    <article class="article-main">
        <h1>Blog</h1>
        <?php foreach ($resultset as $row) : ?>
        <section>
            <header>
                <h1><a href="<?= $app->url->create('blog/' . $row->slug) ?>"><?= $app->format->htmlentities($row->title) ?></a></h1>
                <p><i>Published: <time datetime="<?= $app->format->htmlentities($row->published_iso8601) ?>" pubdate><?= $app->format->htmlentities($row->published) ?></time></i></p>
            </header>
            <?= $app->format->htmlentities($row->data) ?>
        </section>
        <?php endforeach; ?>
    </article>
</main>
