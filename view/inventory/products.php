<?php

$sql = "SELECT * FROM Product;";
$resultset = $app->db->executeFetchAll($sql);

?>


<main class="main">
    <article class="article-main">
        <h1>Products</h1>
        <table class="admin-users-list">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Amount</th>
                <th></th>
                <th></th>
            </tr>
        <?php $id = -1; foreach ($resultset as $row) :
            $id++;
        ?>
            <tr>
                <td><?= $row->id ?></td>
                <td><?= $row->title ?></td>
                <td><?= $row->description ?></td>
                <td><?= $row->price ?></td>
                <td><img src="<?= $row->image . '&w=50' ?>" alt="<?= $row->title ?>"></td>
                <td><?= $row->inventory ?></td>
                <td><a href="<?=$app->url->create('inventory/edit_product')?>?id=<?=$row->id?>">Edit</a></td>
                <td><a href="<?=$app->url->create('inventory/update')?>?doDelete=<?=$row->id?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </table>
    </article>
</main>
