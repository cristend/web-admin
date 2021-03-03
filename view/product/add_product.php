<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<link rel="stylesheet" href="/static/css/validate.css">
<script>
    $(function() {
        $("form[name=add-product-form]").validate({
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
        $("form[name=add-product-form]").on("submit", function(e) {
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
            var formData = new FormData(this);
            formData.append('colors', array.color);
            formData.append('sizes', array.size);
            $.ajax({
                type: 'post',
                url: "/controller/add_product.php",
                data: formData,
                success(response) {
                    alert("Add product successfully!");
                    window.location.href = response.location;
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
<div id="add-product" class="col-md-5 admin-list-title">
    <form id="add-product-form" name="add-product-form" class="add-product-form" action="" method="post" enctype="multipart/form-data">
        <h3 class="text-center text-info">Add Product</h3>
        <div class="form-group">
            <label for="title" class="text-info">Name:*</label><br>
            <input type="text" required name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="price" class="text-info">Price:*</label><br>
            <input type="text" required name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
            <div style="display: flex;">
                <div>
                    <label for="color" class="text-info">Color:*</label><br>
                    <input type="text" required name="color" id="color" class="form-control">
                </div>
                <div style="padding-top: 32px;">
                    <input id="product-color" class="btn btn-warning" type="button" value="Add color">
                </div>
            </div>

            <div id="add-color" style="display: flex; justify-content:flex-start; flex-wrap: wrap;">

            </div>
        </div>
        <div class="form-group">
            <div style="display: flex;">
                <div>
                    <label for="size" class="text-info">Size:*</label><br>
                    <input type="text" required name="size" id="size" class="form-control">
                </div>
                <div style="padding-top: 32px;">
                    <input id="product-size" class="btn btn-warning" type="button" value="Add color">
                </div>
            </div>

            <div id="add-size" style="display: flex; justify-content:flex-start; flex-wrap: wrap;">

            </div>
        </div>
        <div class="form-group">
            <label for="quantity" class="text-info">Quantity:*</label><br>
            <input type="text" required name="quantity" id="quantity" class="form-control">
        </div>
        <div class="form-group">
            <label for="detail" class="text-info">Detail</label><br>
            <input type="text" name="detail" id="detail" class="form-control">
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