<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<link rel="stylesheet" href="/static/css/validate.css">
<script>
    $(function() {
        $("form[name=add-admin-form]").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    minlength: 6
                },
                re_password: {
                    minlength: 6,
                    equalTo: "#password"
                },
                phone: {
                    maxlength: 10,
                    digits: true
                }
            },
            messages: {
                email: "Please enter a valid email address"
            },
            submitHandler: function(form) {
                console.log("etc");
                $.ajax({
                    type: 'post',
                    url: '/controller/add_user.php',
                    data: $('form').serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.error) {
                            alert(response.error);
                        } else {
                            alert("Add user successfully!");
                            window.location.href = response.location;
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError);
                    }
                });
            }
        })
    })
</script>
<div class="col-md-1"></div>
<div id="add-admin" class="col-md-5">
    <form id="add-admin-form" name="add-admin-form" class="add-admin-form" action="" method="post">
        <h3 class="text-center text-info">Add User</h3>
        <div class="form-group">
            <label for="username" class="text-info">Email:*</label><br>
            <input type="text" required name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="text-info">Password:*</label><br>
            <input type="password" required name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="text-info">Repeat Password:*</label><br>
            <input type="password" required name="re_password" id="re_password" class="form-control">

        </div>
        <div class="form-group">
            <label for="password" class="text-info">Name:*</label><br>
            <input type="text" required name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="text-info">Bio</label><br>
            <input type="text" name="bio" id="bio" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="text-info">Phone</label><br>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="sex" class="text-info">Sex*</label><br>
            <select class="form-select" name="sex" aria-label="Default select example">
                <option selected value="male">male</option>
                <option value="female">female</option>
                <option value="other">other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="role" class="text-info">Role*</label><br>
            <select required class="form-select" name="role" aria-label="Default select example">
                <option selected value="1">admin</option>
                <option value="0">user</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password" class="text-info">Birth Day</label><br>
            <input type="date" id="birthday" required name="birthday">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-info btn-md" value="Add">
        </div>
    </form>
</div>