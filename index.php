<?php
session_start();
if (isset($_SESSION["user"])) {
    include_once "$_SERVER[DOCUMENT_ROOT]/view/home/header.php";
    include_once "$_SERVER[DOCUMENT_ROOT]/view/home/nav_logined.php";
    include_once "$_SERVER[DOCUMENT_ROOT]/view/home/side_bar.php";
    $user_id = $_SESSION['user'];
    // main content

    if (isset($_GET['route'])) {
        $route = $_GET['route'];
        if ($route == 'add_user') {
            include_once "$_SERVER[DOCUMENT_ROOT]/view/admin/add_user.php";
        } elseif ($route == 'user_profile') {
            include_once "$_SERVER[DOCUMENT_ROOT]/view/admin/user.php";
        } elseif ($route == 'user_edit') {
            include_once "$_SERVER[DOCUMENT_ROOT]/view/admin/edit_profile.php";
        } else {
            // include_once "$_SERVER[DOCUMENT_ROOT]/view/product/product.php";
        }
    } else {
        include_once "$_SERVER[DOCUMENT_ROOT]/view/admin/admin.php";
    }
} else {
    header("Location: /user/login.php");
}
