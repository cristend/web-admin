<?php
include_once "$_SERVER[DOCUMENT_ROOT]/model/user_model.php";
if (isset($_POST)) {
    $user_id = $_POST["user_id"];
    $delete_success = remove_user($user_model, $user_id);
    if ($delete_success) {
        echo json_encode([
            "error" => ""
        ]);
    } else {
        echo json_encode([
            "error" => "Delete failed!"
        ]);
    }
}
