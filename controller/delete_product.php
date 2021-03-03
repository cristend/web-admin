<?php
include_once "$_SERVER[DOCUMENT_ROOT]/model/product_model.php";
if (isset($_POST)) {
    $product_id = $_POST["product_id"];
    $delete_success = remove_product($product_model, $product_id);
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
