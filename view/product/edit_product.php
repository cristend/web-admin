<?php
include_once "$_SERVER[DOCUMENT_ROOT]/model/product_model.php";
$product_id = $_GET["id"];
$product = get_product($product_id, $product_model);
$colors = $product['variable']['color'];
$color_str = join(",", $colors);
$sizes = $product['variable']['size'];
$size_str = join(",", $sizes);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<link rel="stylesheet" href="/static/css/validate.css">
<script>
    $(function() {
        $("form[name=edit-product-form]").validate({
            rules: {
                price: {
                    number: true
                },
                quantity: {
                    digits: true
                }
            },
        });
        $("#product-color").on("click", function() {
            var value = $("#color").val();
            var color = document.getElementById(value);
            if (color === null) {
                if (value) {
                    var main = $("#add-color");
                    var div = $('<div><input type="checkbox" id="' + value + '" name="color" value="' + value + '"><label for="' + value + '">' + value + '</label><br></div>');
                    main.append(div);
                }
            }
        });
        $("#product-size").on("click", function() {
            var value = $("#size").val();
            var size = document.getElementById(value);
            if (size === null) {
                if (value) {
                    var main = $("#add-size");
                    var div = $('<div><input type="checkbox" id="' + value + '" name="size" value="' + value + '"><label for="' + value + '">' + value + '</label><br></div>');
                    main.append(div);
                }
            }
        });
        $("form[name=edit-product-form]").on("submit", function(e) {
            var color_array = [];
            var size_array = [];
            $("input:checkbox[name=color]:checked").each(function() {
                color_array.push($(this).val());
            });
            $("input:checkbox[name=size]:checked").each(function() {
                size_array.push($(this).val());
            });
            var array = {
                color: JSON.stringify({
                    ...color_array
                }),
                size: JSON.stringify({
                    ...size_array
                })
            };
            if (array.color != "{}") {
                $("#color")[0].value = array.color;
            }
            if (array.size != "{}") {
                $("#size")[0].value = array.size;
            }
            // e.preventDefault();
            var formData = new FormData(this);

            formData.append('colors', array.color);
            formData.append('sizes', array.size);
            var id = $("#edit-product")[0].getAttribute("name");
            console.log(id);

            $.ajax({
                type: 'post',
                url: "/controller/edit_product.php?id=" + id,
                dataType: 'json',
                data: formData,
                success(response) {
                    // alert(response.location);
                    alert("Update product successfully!");
                    if (response.location) {
                        window.location.href = response.location;
                    }

                },
                cache: false,
                contentType: false,
                processData: false,
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError);
                }
            });
        })
    })
</script>
<div class="col-md-1"></div>
<div id="edit-product" class="col-md-5 admin-list-title" name="<?php echo $product_id; ?>">
    <form id="edit-product-form" name="edit-product-form" class="edit-product-form" action="" method="post" enctype="multipart/form-data">
        <h3 class="text-center text-info">Edit Product</h3>
        <div class="form-group">
            <label for="title" class="text-info">Name:</label><br>
            <input type="text" name="title" id="title" class="form-control" placeholder="<?php echo $product['title']; ?>">
        </div>
        <div class="form-group">
            <label for="price" class="text-info">Price:</label><br>
            <input type="text" name="price" id="price" class="form-control" placeholder="<?php echo $product['price']; ?>">
        </div>
        <div class=" form-group">
            <div style="display: flex;">
                <div>
                    <label for="color" class="text-info">Color:</label><br>
                    <input type="text" name="color" id="color" class="form-control" placeholder="<?php echo $color_str; ?>">
                </div>
                <div style=" padding-top: 32px;">
                    <input id="product-color" class="btn btn-warning" type="button" value="Add color">
                </div>
            </div>

            <div id="add-color" style="display: flex; justify-content:flex-start; flex-wrap: wrap;">
                <?php
                foreach ($colors as $color) {
                    echo '<div><input type="checkbox" checked id="' . $color . '" name="color" value="' . $color . '"><label for="' . $color . '">' . $color . '</label><br></div>';
                }
                ?>
            </div>
        </div>
        <div class="form-group">
            <div style="display: flex;">
                <div>
                    <label for="size" class="text-info">Size:</label><br>
                    <input type="text" name="size" id="size" class="form-control" placeholder="<?php echo $size_str; ?>">
                </div>
                <div style=" padding-top: 32px;">
                    <input id="product-size" class="btn btn-warning" type="button" value="Add size">
                </div>
            </div>

            <div id="add-size" style="display: flex; justify-content:flex-start; flex-wrap: wrap;">
                <?php
                foreach ($sizes as $size) {
                    echo '<div><input type="checkbox" checked id="' . $size . '" name="size" value="' . $size . '"><label for="' . $size . '">' . $size . '</label><br></div>';
                }
                ?>
            </div>
        </div>
        <div class="form-group">
            <label for="quantity" class="text-info">Quantity:</label><br>
            <input type="text" name="quantity" id="quantity" class="form-control" placeholder="<?php echo $product["quantity"]; ?>">
        </div>
        <div class="form-group">
            <label for="detail" class="text-info">Detail</label><br>
            <textarea type="text-area" name="detail" id="detail" class="form-control" placeholder="<?php echo $product["detail"]; ?>" style="height: 150px;"></textarea>
        </div>
        <div class="form-group">
            <div class="imgUp">
                <div class="imagePreview"></div>
                <label class="btn btn-primary">
                    Upload<input name="image" type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                </label>
            </div><!-- col-2 -->
            <i class="fa fa-plus imgAdd"></i>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-info btn-md" value="Add">
        </div>
    </form>
</div>