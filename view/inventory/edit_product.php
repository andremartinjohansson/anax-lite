<?php

$productId = ($app->request->getGet("id")) ? $app->request->getGet("id") : null;

if (!$productId) {
    $app->redirect("404");
}

$sql = "SELECT * FROM Product WHERE id = ?;";
$product = $app->db->executeFetchAll($sql, [$productId])[0];

?>


<main class="main profile">
    <article class="article-main-wider article-user article-profile">
        <form class="form-pages" action="<?=$app->url->create('inventory/update')?>" method="post">
            <fieldset>
                <legend>Edit</legend>
                <input type="hidden" name="id" value="<?= $app->format->htmlentities($product->id) ?>"/>
                <p>
                    <label>Title:</label><br>
                    <input class="input-pages" type="text" name="title" value="<?= $app->format->htmlentities($product->title) ?>"/>
                </p>
                <p>
                    <label>Description:</label><br>
                    <textarea class="textarea-pages" name="description"><?= $app->format->htmlentities($product->description) ?></textarea>
                </p>
                <p>
                    <label>Price:</label><br>
                    <input class="input-pages" type="number" name="price" value="<?= $app->format->htmlentities($product->price) ?>"/>
                </p>
                <p>
                    <label>Image:</label><br>
                    <input class="input-pages" type="text" name="image" value="<?= $app->format->htmlentities($product->image) ?>"/>
                </p>
                <p>
                    <label>Amount:</label><br>
                    <input class="input-pages" type="number" name="inventory" value="<?= $app->format->htmlentities($product->inventory) ?>"/>
                </p>
                 <p>
                     <button class="btn-green" type="submit" name="doSave">Save</button>
                     <!-- <button class="btn-green" type="reset">Reset</button> -->
                     <!-- <button class="btn-green" type="submit" name="doDelete">Delete</button> -->
                 </p>
             </fieldset>
         </form>
    </article>
</main>
