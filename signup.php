<?php
require_once "load.php";
$errors = []; 
$errors = $objInsert->signup($conn); 
$objLayout->header();
$objNavigation->nav();
$objForms->signupform($errors); 
$objLayout->footer();
