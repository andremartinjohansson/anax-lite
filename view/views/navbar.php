<?php
$urlHome  = $app->url->create("");
$urlAbout = $app->url->create("about");
$urlReport = $app->url->create("report");
$urlTest = $app->url->create("test");

$home = (isset($home)) ? $home : "";
$about = (isset($about)) ? $about : "";
$report = (isset($report)) ? $report : "";
$test = (isset($test)) ? $test : "";

?>
    <header>
        <navbar class="site-nav">
            <span class="header-name">André Johansson</span>
            <div class="navbar">
                <a class="<?= $home ?>" href="<?= $urlHome ?>">Home</a>
                <a class="<?= $about ?>" href="<?= $urlAbout ?>">About</a>
                <a class="<?= $report ?>" href="<?= $urlReport ?>">Report</a>
                <a class="<?= $test ?>" href="<?= $urlTest ?>">Test</a>
            </div>
        </navbar>
    </header>
