<?php
include_once "$_SERVER[DOCUMENT_ROOT]/model/product_model.php";

if (isset($_POST)) {
    $path = $_SERVER["DOCUMENT_ROOT"];
    $uri = $_SERVER["REQUEST_URI"];
    $product_id = explode("id=", $uri)[1];
    $data = [
        "title" => $_POST["title"],
        "price" => $_POST["price"],
        "variable" => "",
        "quantity" => $_POST["quantity"],
        "detail" => $_POST["detail"],
        "image" => ""
    ];
    if (isset($_FILES)) {
        if ($_FILES["image"]["name"]) {
            $name = $_FILES["image"]["name"];
            $tmp_name = $_FILES["image"]["tmp_name"];
            $path = $path . "/static/images" . $tmp_name;
            move_uploaded_file($tmp_name, $path);
            $data["image"] = "/static/images" . $tmp_name;
        }
    }
    $color = json_decode($_POST["colors"], true);
    $size = json_decode($_POST["sizes"], true);
    $variable["color"] = $color;
    $variable["size"] = $size;
    $data['variable'] = json_encode($variable);
    edit_product($product_model, $product_id, $data);
    $url = "?route=edit_product&&id=" . $product_id;
    echo json_encode([
        "location" => $url
    ]);
}
