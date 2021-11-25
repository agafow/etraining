<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/header.php"); ?>

<?php confirm_logged_in(); ?>



<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Admin Menu</h3>
        </div>
        <div class="panel-body">

            <div class="col-md-5">
                <div class="list-group">
                    <a href="manage_admins.php" class="list-group-item">Manage Admin Users</a>
                    <a href="logout.php" class="list-group-item">Logout</a>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</section>
<?php include("includes/footer.php"); ?>