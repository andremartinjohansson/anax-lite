<?php

$link = $app->format->makeClickable("https://dbwebb.se/uppgift/skapa-en-klass-for-textfiltrering-och-formattering");

$bbcode = $app->format->bbcode2html("[b]Bold text[/b] [i]Italic text[/i] [url=http://dbwebb.se]a link to dbwebb[/url]");

$markdown = $app->format->markdown("Here is a paragraph with some **bold** text and some *italic* text and a [link to dbwebb.se](http://dbwebb.se).");

$nl2br = $app->format->nl2br("nl2br");

?>

    <main class="main">
        <article class="article-main">
            <h1>Test</h1>
            <p><?=$link?></p>
            <p><?=$bbcode?></p>
            <p><?=$markdown?></p>
            <p><?=$nl2br?></p>
        </article>
    </main>
