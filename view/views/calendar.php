<?php

$date = time();

if (isset($_GET["next_month"])) {
    $month = $_GET["next_month"] + 1;
    $year = (int)$_GET["year"];
} elseif (isset($_GET["prev_month"])) {
    $month = $_GET["prev_month"] - 1;
    $year = (int)$_GET["year"];
} else {
    $month = date('m', $date);
    $year = date('Y', $date);
}

?>

    <main class="main">
        <article class="article-main">
            <h1>Calendar</h1>
            <?php

            $calendar = new QuasaR\Calendar\Calendar($month, $year);

            $calendar->createPicture();
            $calendar->createMonth();
            $calendar->createCalendar();

            $year = $calendar->getYear();
            $month = $calendar->getMonth();

            ?>
            <div class="cal-nav-buttons">
                <form action="" method="get" class="right">
                    <input type="hidden" name="next_month" value="<?=$month?>">
                    <input type="hidden" name="year" value="<?=$year?>">
                    <input type="submit" value="Next Month >" class="button">
                </form>
                <form method="get">
                    <input type="hidden" name="prev_month" value="<?=$month?>">
                    <input type="hidden" name="year" value="<?=$year?>">
                    <input type="submit" value="< Previous Month" class="button">
                </form>
            </div>
        </article>
    </main>
