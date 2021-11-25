<?php require_once("includes/session.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>



<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Login</h3>
        </div>
        <div class="panel-body">

            <?php
$username = "";
$password = "";

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Attempt Login

		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$found_admin = attempt_login($username, $password);

    if ($found_admin) {
      // Success
			// Mark user as logged in
			$_SESSION["admin_id"] = $found_admin["id"];
			$_SESSION["username"] = $found_admin["username"];
      redirect_to("admin.php");
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

            <?php $layout_context = "admin"; ?>

            <div id="main">
                <div id="navigation">
                    &nbsp;
                </div>
                <div id="page">
                    <?php echo message(); ?>
                    <?php echo form_errors($errors); ?>



                    <form name="login" action="login.php" method="post" class="form-horizontal" id="log in">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="pemail">User Name</label>
                            <div class="col-sm-4">
                                <input id="username" class="form-control" type="text" name="username"
                                    value="<?php echo htmlentities($username); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="password">Password</label>
                            <div class="col-sm-4">
                                <input id="password" class="form-control" type="password" name="password"
                                    value="<?php echo htmlentities($password); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-2 ">
                                <input type="submit" name="submit" value="Login" class="btn btn-success" />

                                <!--   <a href="manage_admins.php" class="btn btn-success" role="button" />Cancel</a> -->
                            </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
<?php include("includes/footer.php"); ?>