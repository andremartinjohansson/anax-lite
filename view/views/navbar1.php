<?php
// $urlHome  = $app->url->create("");
// $urlAbout = $app->url->create("about");
// $urlReport = $app->url->create("report");
// $urlTest = $app->url->create("test");

$home = (isset($home)) ? $home : "";
$about = (isset($about)) ? $about : "";
$report = (isset($report)) ? $report : "";
$test = (isset($test)) ? $test : "";

$navbar = [
    "config" => [
        "navbar-class" => "navbar"
    ],
    "links" => [
        "home" => [
            "text" => "Home",
            "route" => "",
            "class" => $home,
        ],
        "about" => [
            "text" => "About",
            "route" => "about",
            "class" => $about,
        ],
        "report" => [
            "text" => "Report",
            "route" => "report",
            "class" => $report,
        ],
        "test" => [
            "text" => "Test",
            "route" => "test",
            "class" => $test,
        ],
    ]
];

$html = "";

foreach ($navbar["config"] as $key => $value) {
    $html .= '<div class="' . $value . '">';
}

foreach ($navbar["links"] as $key => $value) {
    $html .= '<a class="' . $value["class"] . '" href="' . $app->url->create($value["route"]) . '">' . $value["text"] . '</a>';
}

$html .= "</div>";

?>
    <header>
        <navbar class="site-nav">
            <span class="header-name">André Johansson</span>
            <?= $html ?>
        </navbar>
    </header>
