<?php
if (isset($_POST)) {
    include_once "$_SERVER[DOCUMENT_ROOT]/model/user_model.php";
    $uri = $_SERVER["REQUEST_URI"];
    $user_id = explode("id=", $uri)[1];
    edit_user($user_id, $user_model, $_POST);
    echo json_encode([
        "location" => "?route=user_edit&&id=" . $user_id
    ]);
} else {
    echo json_encode(["location" => ""]);
}
