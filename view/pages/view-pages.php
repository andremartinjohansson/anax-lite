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

?>


<main class="main">
    <article class="article-main">
        <h1>All pages</h1>
        <table class="admin-users-list">
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Status</th>
                <th>Published</th>
                <th>Deleted</th>
            </tr>
        <?php $id = -1; foreach ($resultset as $row) :
            $id++;
        ?>
            <tr>
                <td><a href="<?=$app->url->create('pages/' . $row->path) ?>"><?= $row->title ?></a></td>
                <td><?= $row->type ?></td>
                <td><?= $row->status ?></td>
                <td><?= $row->published ?></td>
                <td><?= $row->deleted ?></td>
            </tr>
        <?php endforeach; ?>
        </table>

    </article>
</main>
