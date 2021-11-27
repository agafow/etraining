<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/header.php"); ?>

<?php confirm_logged_in(); ?>


<span class="border border-secondary">
    <div class="container mt-5 p-3">

        <div class="col-md-9">
            <h2>Admin menu</h2>

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
</span>
</section>
<?php include("includes/footer.php"); ?>