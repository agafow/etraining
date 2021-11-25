<?php require_once("includes/session.php"); ?>

<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php confirm_logged_in(); ?>



<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Create Users</h3>
        </div>
        <div class="panel-body">
            <?php
if (isset($_POST['submit'])) {
  // if()
  // validations

  $username = mysql_prep($_POST["username"]);

  $userexist = check_this_user($username);

if($userexist){
  $_SESSION["message"] = "User is exist please choose another user";
  
}

echo "<pre>";
print_r($_POST);
echo "</pre>";

  $required_fields = array("name","group_id", "username", "password");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    // Perform Create
    $group_id = mysql_prep($_POST["group_id"]);
    $name = mysql_prep($_POST["name"]);
    $username = mysql_prep($_POST["username"]);
    $hashed_password = password_encrypt($_POST["password"]);


  if($group_id == 1){
  $group_name = "admin";
  }elseif ($group_id == 2){
   $group_name = "user";
  }
   
   $query  = "INSERT INTO admins (";
    $query .= " id, group_id, name,  username,  hashed_password";
    $query .= ") VALUES (";
    $query .= " NULL,  {$group_id}, '{$name}', '{$username}', '{$hashed_password}'";
    $query .= ")";
    $result = mysqli_query($con, $query);
 
    if ($result) {
      $_SESSION["message"] = "Admin created.<br>";
      redirect_to("manage_admins.php");
    } else {
      $_SESSION["message"] = "Admin creation failed <br>.";

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
                    <form name="new admin" action="new_admin.php" method="post" class="form-horizontal" id="new admin">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Full Name <span class="require-field"> *
                                </span></label>
                            <div class="col-sm-4">
                                <input id="name" class="form-control" type="text" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="username">User Name <span class="require-field">
                                    * </span></label>
                            <div class="col-sm-4">
                                <input id="username" class="form-control" type="text" name="username">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="password">Password <span class="require-field"> *
                                </span></label>
                            <div class="col-sm-4">
                                <input id="password" class="form-control" type="password" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="group_id">Group <span class="require-field"> *
                                </span></label>
                            <div class="col-sm-4">
                                <select id="group_id" class="form-control " name="group_id" required="required">
                                    <?php  
        $p_set = find_all_admins_group();
          echo "<option> Group Name</option>"; 
        while($p = mysqli_fetch_assoc($p_set)){
           echo "<option value=".$p['group_id'].">".$p['group_name']."</option>"; 
        }    ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-2 ">
                                <input type="submit" name="submit" value="Save Admin" class="btn btn-success" />

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