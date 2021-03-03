<?php
include_once "$_SERVER[DOCUMENT_ROOT]/model/product_model.php";
// $user_id = $_SESSION["user"];
$products = get_products($product_model);
?>
<link rel="stylesheet" ,="" href="/static/css/cart.css">
<script>
    $(function() {
        $(".remove-product").on("click", function() {
            if (confirm("Are you sure!")) {
                var product_id = event.target.name;
                var product = $("#product" + product_id);
                $.ajax({
                    type: 'post',
                    url: '/controller/delete_product.php',
                    data: {
                        'product_id': product_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.error) {
                            alert(response.error);
                        } else {
                            product.remove();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError);
                    }
                });
            }
        });
    })
</script>
<div class="col-lg-8">
    <div class="table-responsive">
        <div class="admin-list-title">
            <div>
                <h1>Product</h1>
            </div class="flex-box-2">
            <div>
                <a><button class="btn btn-success" id="add-product">Add Product</button></a>
            </div>
        </div>
        <table class="table table-bordered tbl-cart">
            <thead>
                <tr>
                    <td class="hidden-xs">Image</td>
                    <td>Product Name</td>
                    <td>Color</td>
                    <td>Size</td>
                    <td class="td-qty">Quantity</td>
                    <td>Unit Price ($)</td>
                    <td>Remove</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                foreach ($products as $product) {
                ?>
                    <tr id="product<?php echo $product["id"]; ?>" class="product-cart" name="<?php echo $product["id"]; ?>">
                        <td class="hidden-xs">
                            <a href="#">
                                <img src="<?php echo $product['image']; ?>" alt="" title="" width="47" height="47">
                            </a>
                        </td>
                        <td>
                            <a href="/?route=product_detail&&id=<?php echo $product["id"]; ?>"><?php echo $product['title']; ?></a>
                        </td>
                        <td class="product-color"><?php echo join(",", $product['variable']['color'])  ?></td>
                        <td class="product-size"><?php echo join(",", $product['variable']['size'])  ?></td>
                        <td class="item-quantity"><?php echo $product["quantity"]; ?></td>
                        <td class="price"><?php echo $product['price']; ?></td>
                        <td class="text-center">
                            <form name="remove-product" action="" method="get">
                                <button name="<?php echo $product["id"]; ?>" class="remove-product" type="button" value="<?php echo $product["id"]; ?>" class="close" aria-label="Close">
                                    X
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php
                    $count = $count + 1;
                }
                ?>
                <tr class="product-cart">
                    <td class="cart-checkbox"><label><input class="check-all" type="checkbox"></label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td id="total">0.00</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>