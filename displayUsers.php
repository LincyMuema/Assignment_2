
<?php
require_once "load.php";
$objLayout->header();
$objNavigation->nav_signedin();
$objContent->displayUsers($conn);
$objLayout->footer();
