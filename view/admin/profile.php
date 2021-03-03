<div class="col-lg-9">

    <div class="portlet light bordered">
        <div class="portlet-title tabbable-line">
            <div class="caption caption-md">
                <h1 class="bold uppercase">User profile</h1>
            </div>
        </div>
        <div class="portlet-body">
            <div>
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
<!-- /.col-lg-9 -->

</div>
<!-- /.row -->