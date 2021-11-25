<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php confirm_logged_in(); ?>

<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Edit Admins</h3>
        </div>
        <div class="panel-body">

            <?php $admin = find_admin_by_id($_GET["id"]);
  
$admins_group =  find_admins_group(); 

  if (!$admin) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    redirect_to("manage_admins.php");
  }
?>

            <?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("name","group_id","username");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    
    $id = $admin["id"];
    $group_id = mysql_prep($_POST["group_id"]);
    $name= mysql_prep($_POST["name"]);
    $username = mysql_prep($_POST["username"]);
    
    print_r($_POST)."<BR><BR>";

    $query  = "UPDATE admins SET ";
    $query .= "group_id = {$group_id}, ";
    $query .= "name = '{$name}', ";
    $query .= "username = '{$username}' ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1 ";
    echo "<br><br>";
    print_r($query);

    $result = mysqli_query($con, $query);
    if ($result){
      if(mysqli_affected_rows($con) == 1){

      }
      // Success
      $_SESSION["message"] = "Admin updated.";
      redirect_to("manage_admins.php");
    } else {
      // Failure
      $_SESSION["message"] = "Admin update failed.";
    }
  
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>
            <?php echo message(); ?>
            <?php echo form_errors($errors); ?>

            <!--  -->
            <form action="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>" method="post"
                class="form-horizontal" id="new admin">

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="id">ID <span class="require-field"> * </span></label>
                    <div class="col-sm-4">
                        <input id="id" class="form-control" type="text" name="id"
                            value="<?php echo htmlentities($admin["id"]); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="group_id">Group ID <span class="require-field"> *
                        </span></label>
                    <div class="col-sm-4">
                        <input id="group_id" class="form-control" type="text" name="group_id"
                            value="<?php echo htmlentities($admin["group_id"]); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">Full Name <span class="require-field"> *
                        </span></label>
                    <div class="col-sm-4">
                        <input id="name" class="form-control" type="text" name="name"
                            value="<?php echo htmlentities($admin["name"]); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="username">User Name <span class="require-field"> *
                        </span></label>
                    <div class="col-sm-4">
                        <input id="username" class="form-control" type="text" name="username"
                            value="<?php echo htmlentities($admin["username"]); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="group_name">Group Name <span class="require-field"> *
                        </span></label>
                    <div class="col-sm-4">
                        <input id="group_name" class="form-control" type="text" name="group_name"
                            value="<?php echo htmlentities($admins_group["group_name"]); ?>">
                    </div>
                </div>
                <!--  -->

                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-2 ">
                        <input type="submit" name="submit" value="Update Admin" class="btn btn-success" />


                    </div>
                </div>
        </div>
    </div>
    </section>
    <?php include("includes/footer.php"); ?>