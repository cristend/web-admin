<?php
include_once "$_SERVER[DOCUMENT_ROOT]/model/product_model.php";
if (isset($_GET)) {
    $product_id = $_GET["id"];
    $product = get_product($product_id, $product_model);
    $color = $product['variable']['color'];
    $size = $product['variable']['size'];

    if ($user) {
?>
        <div class="col-md-6 admin-profile">
            <div class="portlet light bordered">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <h1 class="bold uppercase">Product detail</h1>
                    </div>
                    <div>
                        <a href="?route=edit_product&&id=<?php echo $product_id; ?>">Edit</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="product-detail">
                                    <p>Title: <span><?php echo $product["title"]; ?></span></p>
                                </div>
                                <div class="product-detail">
                                    <p>Price: <span><?php echo $product["price"]; ?></span></p>
                                </div>
                                <div class="product-detail">
                                    <p>Color: <span><?php echo join(",", $color); ?></span></p>
                                </div>
                                <div class="product-detail">
                                    <p>Size: <span><?php echo join(",", $size); ?></span></p>
                                </div>
                                <div class="product-detail">
                                    <p>Quantity: <span><?php echo $product["quantity"]; ?></span></p>
                                </div>
                                <div class="product-detail">
                                    <p>Detail: <span><?php echo $product["detail"]; ?></span></p>
                                </div>
                                <div class="product-detail">
                                    <p><span><img src="<?php echo $product["image"]; ?>" alt=""></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>