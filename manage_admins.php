<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php confirm_logged_in(); ?>


<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Manage Admins <a href="admin.php">&laquo; Main menu</a></h3>
        </div>
        <div class="panel-body">
            <?php

echo message();

  $admin_set = find_all_admins();
  $admins_group =  find_admins_group(); 
  // while($p = mysqli_fetch_assoc($admin_set)){
  //   echo "<pre>"; 
  //   print_r($p);
  //   echo "</pre>";
  // }
  
?>


            <?php echo message(); ?>


            <table class="table table-hover">
                <tr>
                    <th>Name</th>
                    <th>UserName</th>
                    <th>Group name</th>
                    <th>Acctions</th>
                </tr>
                <?php while($admin = mysqli_fetch_assoc($admin_set)) { ?>
                <tr>
                    <td><?php echo htmlentities($admin["name"]); ?></td>
                    <td><?php echo htmlentities($admin["username"]); ?></td>
                    <td><?php echo htmlentities($admin["group_name"]); ?></td>
                    <td><a href="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>">Edit</a>
                        <a href="delete_admin.php?id=<?php echo urlencode($admin["id"]); ?>"
                            onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <br />
            <div class="col-md-4">
                <div class="list-group">
                    <a href="new_admin.php" class="list-group-item">Add new admin</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<?php include("includes/footer.php"); ?>