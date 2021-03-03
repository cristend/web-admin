<div class="row">
    <div class="col-lg-3 admin-home">
        <h1 class="my-4">Admin Panel</h1>
        <div class="list-group admin-side-bar">
            <a href="/" class="list-group-item">User Manage</a>
            <a href="?route=product" class="list-group-item">Product Manage</a>
            <a href="?route=user_profile&&id=<?php echo $_SESSION["user"]; ?>" class="list-group-item">Profile</a>
        </div>
    </div>