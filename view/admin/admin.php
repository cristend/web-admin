<?php
include_once "$_SERVER[DOCUMENT_ROOT]/model/user_model.php";
$user_id = $_SESSION["user"];
$users = get_users($user_model);
?>
<script>
    $(function() {
        $(".user-remove").on("click", function() {
            if (confirm("Are you sure!")) {
                var user_id = event.target.name;
                var user = $("#user" + user_id);
                $.ajax({
                    type: 'post',
                    url: '/controller/delete_user.php',
                    data: {
                        'user_id': user_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.error) {
                            alert(response.error);
                        } else {
                            user.remove();
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
<div class="col-lg-9">
    <div class="">
        <div class="">
            <div class="admin-list-title">
                <div class="flex-box-1">
                    <h1 class="">User</h1>
                </div>
                <div class="flex-box-2">
                    <a href="?route=add_user"><button id="add-user" class="btn btn-success">Add User</button></a>
                </div>
            </div>
        </div>
        <div class="portlet-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Birth</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($users as $user) {
                    ?>
                        <tr id="user<?php echo $user["id"]; ?>">
                            <th scope="col"><?php echo $count; ?></th>
                            <th scope="col"><a href="?route=user_profile&&id=<?php echo $user["id"] ?>"><?php echo $user["id"]; ?></a></th>
                            <th scope="col"><a href="?route=user_profile&&id=<?php echo $user["id"] ?>"><?php echo $user["email"]; ?></a></th>
                            <th scope="col"><?php echo $user["name"]; ?></th>
                            <th scope="col"><?php
                                            if ($user["permission"] == "0") {
                                                echo 'user';
                                            } else {
                                                echo 'admin';
                                            }
                                            ?></th>
                            <th scope="col"><?php echo $user["sex"]; ?></th>
                            <th scope="col"><?php echo $user["phone"]; ?></th>
                            <th scope="col"><?php echo $user["birth"]; ?></th>
                            <td><input class="user-remove btn btn-danger .btn-sm" type="button" name="<?php echo $user["id"]; ?>" value="X"> </td>
                        </tr>
                    <?php
                        $count = $count + 1;
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>