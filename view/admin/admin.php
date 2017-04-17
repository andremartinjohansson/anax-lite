<?php

if ($app->session->get("role") != "admin") {
    echo "You do not have permission to access this page. Return or you will be shot.";
    header("Refresh:2; " . $app->url->create('login'));
    die();
}

$defaultRoute = $app->url->create("admin") . "?";

$searchName = (isset($_GET["search"])) ? $_GET["search"] : null;

$orderBy = (isset($_GET["orderby"])) ? $_GET["orderby"] : "name";
$order = (isset($_GET["order"])) ? $_GET["order"] : "asc";

$hits = (isset($_GET["hits"])) ? (int)$_GET["hits"] : 4;

$sql = "SELECT COUNT(id) AS max FROM Users;";
$max = $app->db->executeFetchAll($sql);
$max = ceil($max[0]->max / $hits);

$page = (isset($_GET["page"])) ? (int)$_GET["page"] : 1;
$offset = $hits * ($page - 1);

if ($searchName) {
    $sql = "SELECT * FROM Users WHERE name LIKE ? ORDER BY $orderBy $order LIMIT $hits OFFSET $offset;";
    $searchName = "%" . $searchName . "%";
    $users = $app->db->executeFetchAll($sql, [$searchName]);
} else {
    $sql = "SELECT * FROM Users ORDER BY $orderBy $order LIMIT $hits OFFSET $offset;";
    $users = $app->db->executeFetchAll($sql);
}

/**
 * Function to create links for sorting.
 *
 * @param string $column the name of the database column to sort by
 * @param string $route  prepend this to the anchor href
 *
 * @return string with links to order by column.
 */
function orderby($column, $route)
{
    return <<<EOD
<span class='orderby'>
<a href="{$route}?orderby={$column}&order=asc">&darr;</a>
<a href="{$route}?orderby={$column}&order=desc">&uarr;</a>
</span>
EOD;
}

/**
 * Use current querystring as base, extract it to an array, merge it
 * with incoming $options and recreate the querystring using the resulting
 * array.
 *
 * @param array  $options to merge into exitins querystring
 * @param string $prepend to the resulting query string
 *
 * @return string as an url with the updated query string.
 */
function mergeQueryString($options, $prepend = "?")
{
    // Parse querystring into array
    $query = [];
    parse_str($_SERVER["QUERY_STRING"], $query);

    // Merge query string with new options
    $query = array_merge($query, $options);

    // Build and return the modified querystring as url
    return $prepend . http_build_query($query);
}

?>


<main class="main profile">
    <article class="article-main article-user article-profile">
        <form method="get">
        <p>
                <input class="input-default" type="search" name="search" placeholder="Search Username">
        </p>
        <p>
            <input type="submit" value="Search">
        </p>
        <p>
            <a href="<?=$app->url->create('admin')?>">Show all</a>
        </p>
        </form>
        <?php

        if ($app->session->get("success") == "user updated") {
            echo "<p>User updated successfully!</p>";
            $app->session->delete("success");
        } elseif ($app->session->get("error") == "already exists") {
            echo "<p>Username already exists. Can't overwrite.</p>";
            $app->session->delete("error");
        } elseif ($app->session->get("success") == "user deleted") {
            echo "<p>User deleted successfully!</p>";
            $app->session->delete("success");
        } elseif ($app->session->get("error") == "no such user") {
            echo "<p>Username not found.</p>";
            $app->session->delete("error");
        } elseif ($app->session->get("success") == "user created") {
            echo "<p>Successfully created user!</p>";
            $app->session->delete("success");
        }

        ?>
        <p>Items per page:
            <a href="<?= mergeQueryString(["hits" => 2], $defaultRoute) ?>">2</a> |
            <a href="<?= mergeQueryString(["hits" => 4], $defaultRoute) ?>">4</a> |
            <a href="<?= mergeQueryString(["hits" => 8], $defaultRoute) ?>">8</a>
        </p>
        <table class="admin-users-list">
            <tr>
                <th>Name <?= orderby("name", $defaultRoute) ?></th>
                <th>Role <?= orderby("role", $defaultRoute) ?></th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user->name ?></td>
                <td><?= $user->role ?></td>
                <td>
                    <form action="<?=$app->url->create('edit')?>" method="GET">
                        <input type="hidden" name="username" value="<?= $user->name ?>">
                        <!-- <input type="hidden" name="role" value="<?= $user->role ?>"> -->
                        <input class="btn-green" type="submit" value="Edit">
                    </form>
                </td>
                <td>
                    <form action="<?=$app->url->create('delete')?>" method="POST">
                        <input type="hidden" name="username" value="<?= $user->name ?>">
                        <input class="btn-green" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <p>
            Pages:
            <?php for ($i = 1; $i <= $max; $i++) : ?>
                <a href="<?= mergeQueryString(["page" => $i], $defaultRoute) ?>"><?= $i ?></a>
            <?php endfor; ?>
        </p>
        <a class="profile-item" href="<?=$app->url->create('admin_create')?>">Add User</a>
    </article>
</main>
