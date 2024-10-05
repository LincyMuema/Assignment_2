<?php
require_once "load.php";
$errors = []; // Initialize the errors array
$errors = $objInsert->signup($conn); // Call the signup method and capture errors
$objLayout->header();
$objNavigation->nav();
$objForms->signupform($errors); // Pass errors to the form display
$objLayout->footer();
