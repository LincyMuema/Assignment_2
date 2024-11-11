<?php
require_once "load.php";
$email = $_POST['email'] ?? null;
$verificationCode = $_POST['verificationcode'] ?? null;
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    if (isset($_POST['verify'])) {
        $errors = $objInsert->verifyCode($conn, $email, $verificationCode);
    }
} else {
    header("Location: signup.php");
    exit();
}
$errors = []; 
$errors = $objInsert->verifyCode($conn, $email, $verificationCode); 
$objLayout->header();
$objNavigation->nav();
$objForms->verifyform($errors); 
$objLayout->footer();
