<main class="main profile">
    <article class="article-main-wider article-user article-profile">
        <form class="form-pages" action="<?=$app->url->create('admin/update_content')?>" method="post">
            <fieldset>
                <legend>Create</legend>

                <p>
                    <label>Title:<br>
                    <input type="text" name="title" default="A Title"/>
                    </label>
                </p>

                <p>
                    <button class="btn-green" type="submit" name="doCreate">Create</button>
                    <!-- <button class="btn-green" type="reset">Reset</button> -->
                </p>
            </fieldset>
         </form>
    </article>
</main>
