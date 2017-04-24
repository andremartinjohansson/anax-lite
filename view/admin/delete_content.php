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
                <legend>Delete</legend>
                <input type="hidden" name="id" value="<?= $app->format->htmlentities($content->id) ?>"/>

                <p>
                    <label>Title:<br>
                    <input type="text" name="contentTitle" value="<?= $app->format->htmlentities($content->title) ?>" readonly/>
                    </label>
                </p>

                <p>
                    <button class="btn-green" type="submit" name="confirmDelete">Delete</button>
                    <!-- <button class="btn-green" type="reset">Reset</button> -->
                </p>
            </fieldset>
         </form>
    </article>
</main>
