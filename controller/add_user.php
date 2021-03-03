<?php
include_once "$_SERVER[DOCUMENT_ROOT]/model/user_model.php";
if (isset($_POST)) {
    $data = [
        "email" => $_POST["email"],
        "pass" => $_POST["password"],
        "name" => $_POST["name"],
        "bio" => $_POST["bio"],
        "phone" => $_POST["phone"],
        "sex" => $_POST["sex"],
        "birth" => $_POST["birthday"],
        "permission" => $_POST["role"]
    ];
    $add_success = add_user($data, $user_model);
    if ($add_success['msg'] == 'success') {
        echo json_encode([
            "error" => "",
            "location" => "?route=add_user"
        ]);
    } elseif ($add_success['error']) {
        echo json_encode([
            "error" => $add_success['error']
        ]);
    }
}
