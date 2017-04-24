<?php

$sql = "SELECT * FROM content;";
$resultset = $app->db->executeFetchAll($sql);

?>


<main class="main profile">
    <article class="article-main-wider article-user article-profile">
        <h1>All content types</h1>
        <a class="profile-item" href="<?=$app->url->create('pages')?>">View Pages</a>
        <a class="profile-item" href="<?=$app->url->create('block')?>">View Blocks</a>
        <table class="admin-users-list">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Type</th>
                <th>Published</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Deleted</th>
                <th>Path</th>
                <th>Slug</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        <?php $id = -1; foreach ($resultset as $row) :
            $id++;
        ?>
            <tr>
                <td><?= $row->id ?></td>
                <td><?= $row->title ?></td>
                <td><?= $row->type ?></td>
                <td><?= $row->published ?></td>
                <td><?= $row->created ?></td>
                <td><?= $row->updated ?></td>
                <td><?= $row->deleted ?></td>
                <td><?= $row->path ?></td>
                <td><?= $row->slug ?></td>
                <td><a href="<?=$app->url->create("admin/edit_content") . "?id=" . $row->id?>">Edit</a></td>
                <td><a href="<?=$app->url->create("admin/delete_content") . "?id=" . $row->id?>">Delete</a></td>
                <td><a href="<?=$app->url->create("admin/update_content") . "?doPublish=true&id=" . $row->id?>">Publish</a></td>
            </tr>
        <?php endforeach; ?>
        </table>
        <a class="profile-item" href="<?=$app->url->create('admin/create_content')?>">Add New</a>

    </article>
</main>
