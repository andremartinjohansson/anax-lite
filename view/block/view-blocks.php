<?php

$sql = "SELECT * FROM content WHERE type=?;";
$resultset = $app->db->executeFetchAll($sql, ["block"]);

?>


<main class="main">
    <article class="article-main">
        <h1>All blocks</h1>
        <table class="admin-users-list">
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th></th>
            </tr>
        <?php $id = -1; foreach ($resultset as $row) :
            $id++;
        ?>
            <tr>
                <td><?= $row->title ?></td>
                <td><?= $row->type ?></td>
                <td><a href="<?=$app->url->create('block/' . $row->slug) ?>">Preview</a></td>
            </tr>
        <?php endforeach; ?>
        </table>
    </article>
</main>
