
<?php
require_once "load.php";
$objLayout->header();
$objNavigation->nav();
$objContent->displayUsers($conn);
$objLayout->footer();
