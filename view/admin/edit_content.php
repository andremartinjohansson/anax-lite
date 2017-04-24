<?php

$contentId = ($app->request->getGet("id")) ? $app->request->getGet("id") : null;

if (!$contentId) {
    $app->redirect("404");
}

$sql = "SELECT * FROM content WHERE id = ?;";
$content = $app->db->executeFetchAll($sql, [$contentId])[0];

?>


<main class="main profile">
    <article class="article-main-wider article-user article-profile">
        <form class="form-pages" action="<?=$app->url->create('admin/update_content')?>" method="post">
            <fieldset>
                <legend>Edit</legend>
                <input type="hidden" name="id" value="<?= $app->format->htmlentities($content->id) ?>"/>
                <p>
                    <label>Title:</label><br>
                    <input class="input-pages" type="text" name="title" value="<?= $app->format->htmlentities($content->title) ?>"/>
                </p>
                <p>
                    <label>Path:</label><br>
                    <input class="input-pages" type="text" name="path" value="<?= $app->format->htmlentities($content->path) ?>"/>
                </p>
                <p>
                    <label>Slug:</label><br>
                    <input class="input-pages" type="text" name="slug" value="<?= $app->format->htmlentities($content->slug) ?>"/>
                </p>
                <p>
                    <label>Text:</label><br>
                    <textarea class="textarea-pages" name="data"><?= $app->format->htmlentities($content->data) ?></textarea>
                </p>
                <p>
                    <label>Type:</label><br>
                    <input class="input-pages" type="text" name="type" value="<?= $app->format->htmlentities($content->type) ?>"/>
                </p>
                <p>
                    <label>Filter:</label><br>
                    <input class="input-pages" type="text" name="filter" value="<?= $app->format->htmlentities($content->filter) ?>"/>
                </p>
                <p>
                     <label>Publish:</label><br>
                     <input class="input-pages" type="datetime" name="publish" value="<?= $app->format->htmlentities($content->published) ?>"/>
                 </p>
                 <p>
                     <button class="btn-green" type="submit" name="doSave">Save</button>
                     <!-- <button class="btn-green" type="reset">Reset</button> -->
                     <button class="btn-green" type="submit" name="doDelete">Delete</button>
                 </p>
             </fieldset>
         </form>
    </article>
</main>
