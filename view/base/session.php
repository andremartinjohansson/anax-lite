<?php

if ($app->request->getRoute() == "session/dump") {
    $res = $app->session->dump();
    ob_start();
    var_dump($res);
    $res = ob_get_clean();
    $html = '<code class="session-code">' . $res . '</code>';
} else {
    $html = "";
}

$increase = $app->url->create("session/increase");
$decrease = $app->url->create("session/decrease");
$status = $app->url->create("session/status");
$dump = $app->url->create("session/dump");
$destroy = $app->url->create("session/destroy");

$value = ($app->session->get("value")) ? $app->session->get("value") : 0;

?>

    <main class="main">
        <article class="article-main">
            <h1>Session</h1>
            <p>Current value: <?=$value?></p>
            <ul class="session-list">
                <li><a href="<?=$increase?>">Increase</a></li>
                <li><a href="<?=$decrease?>">Decrease</a></li>
                <li><a href="<?=$status?>">Status</a></li>
                <li><a href="<?=$dump?>">Dump</a></li>
                <li><a href="<?=$destroy?>">Destroy</a></li>
            </ul>
            <?=$html?>
        </article>
    </main>
