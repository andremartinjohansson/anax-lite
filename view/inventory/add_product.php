<main class="main profile">
    <article class="article-main-wider article-user article-profile">
        <form class="form-pages" action="<?=$app->url->create('inventory/update')?>" method="post">
            <fieldset>
                <legend>Add</legend>
                <p>
                    <label>Title:</label><br>
                    <input class="input-pages" type="text" name="title" placeholder="Title" required/>
                </p>
                <p>
                    <label>Description:</label><br>
                    <textarea class="textarea-pages" name="description"></textarea>
                </p>
                <p>
                    <label>Price:</label><br>
                    <input class="input-pages" type="number" name="price" placeholder="Price" required/>
                </p>
                <p>
                    <label>Image:</label><br>
                    <input class="input-pages" type="text" name="image" placeholder="Image" required/>
                </p>
                <p>
                    <label>Amount:</label><br>
                    <input class="input-pages" type="number" name="inventory" placeholder="Amount" required/>
                </p>
                 <p>
                     <button class="btn-green" type="submit" name="doAdd">Add</button>
                     <!-- <button class="btn-green" type="reset">Reset</button> -->
                     <!-- <button class="btn-green" type="submit" name="doDelete">Delete</button> -->
                 </p>
             </fieldset>
         </form>
    </article>
</main>
