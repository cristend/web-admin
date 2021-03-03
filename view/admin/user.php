<?php
include_once "$_SERVER[DOCUMENT_ROOT]/model/user_model.php";
if (isset($_GET)) {
    $user_id = $_GET["id"];
    $user = get_user($user_id, $user_model);
    if ($user) {
?>
        <div class="col-md-3 admin-profile">
            <div class="portlet light profile-sidebar-portlet bordered">
                <div class="profile-userpic">
                    <img src="/static/images/user-profile.png" class="img-responsive" alt="">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> <?php echo $user["name"]; ?> </div>
                    <div><a href="?route=user_edit&&id=<?php echo $user_id; ?>">Edit</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 admin-profile">
            <div class="portlet light bordered">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <h1 class="bold uppercase">User profile</h1>
                    </div>
                </div>
                <div class="portlet-body">
                    <div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="profile-detail">
                                    <p>Name: <span><?php echo $user["name"]; ?></span></p>
                                </div>
                                <div class="profile-detail">
                                    <p>Email: <span><?php echo $user["email"]; ?></span></p>
                                </div>
                                <div class="profile-detail">
                                    <p>Bio: <span><?php echo $user["bio"]; ?></span></p>
                                </div>
                                <div class="profile-detail">
                                    <p>Sex: <span><?php echo $user["sex"]; ?></span></p>
                                </div>
                                <div class="profile-detail">
                                    <p>Phone: <span><?php echo $user["phone"]; ?></span></p>
                                </div>
                                <div class="profile-detail">
                                    <p>Birth: <span><?php echo $user["birth"]; ?></span></p>
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