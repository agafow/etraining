<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('connection.php');
/***
 * This part is login and admin management
 */

function find_admin_by_id($admin_id)
{
  global $con;
  $safe_admin_id = mysqli_real_escape_string($con, $admin_id);
  $query  = "SELECT * ";
  $query .= "FROM admins  ";
  $query .= "WHERE id = {$safe_admin_id} ";
  $query .= "LIMIT 1";
  $admin_set = mysqli_query($con, $query);
  confirm_query($admin_set);
  if ($admin = mysqli_fetch_assoc($admin_set)) {
    return $admin;
  } else {
    return null;
  }
}
function mysql_prep($string)
{
  global $con;
  $escaped_string = mysqli_real_escape_string($con, $string);
  return $escaped_string;
}

function find_admins_group()
{
  global $con;

  //$safe_admin_id = mysqli_real_escape_string($db_con, $admin_id);

  $query  = "SELECT * ";
  $query .= "FROM admins_group  ";
  $admin_set = mysqli_query($con, $query);
  confirm_query($admin_set);
  if ($admin = mysqli_fetch_assoc($admin_set)) {
    return $admin;
  } else {
    return null;
  }
}
function confirm_query($result_set)
{
  if (!$result_set) {
    die("Database query failed.");
  }
}
function form_errors($errors = array())
{
  $output = "";
  if (!empty($errors)) {
    $output .= "<div class=\"error\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach ($errors as $key => $error) {
      $output .= "<li>";
      $output .= htmlentities($error);
      $output .= "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

function redirect_to($new_location)
{
  ob_start();
  header("Location: " . $new_location);
  exit;
}
function logged_in()
{
  return isset($_SESSION['admin_id']);
}
function confirm_logged_in()
{
  if (!logged_in()) {
    redirect_to("login.php");
  }
}

function find_all_admins()
{
  global $con;
  $query  = "SELECT * ";
  $query .= "FROM admins, admins_group ";
  $query .= "WHERE admins.group_id = admins_group.group_id ";
  $query .= "ORDER BY admins.id ASC ";
  $admin_set = mysqli_query($con, $query);
  confirm_query($admin_set);
  return $admin_set;
}
function all_admins()
{
  global $con;
  $query  = "SELECT * ";
  $query .= "FROM admins ";
  $admin_set = mysqli_query($con, $query);
  confirm_query($admin_set);
  $num = mysqli_num_rows($admin_set);
  if (!$num) {
    echo "Selecting tell was fail";
    return;
  } else {
    return $num;
  }
}
function find_all_admins_group()
{
  global $con;
  $query  = "SELECT * ";
  $query .= "FROM admins_group ";
  $admin_set = mysqli_query($con, $query);
  confirm_query($admin_set);
  return $admin_set;
}
function check_this_user($user)
{
  global $con;
  $user = mysqli_real_escape_string($con, $user);
  $query  = "SELECT * ";
  $query .= "FROM admins ";
  $query .= "WHERE username = '{$user}' ";
  $admin_set = mysqli_query($con, $query);
  confirm_query($admin_set);
  return $admin_set;
}

function password_encrypt($password)
{
  $hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
  $salt_length = 22;           // Blowfish salts should be 22-characters or more
  $salt = generate_salt($salt_length);
  $format_and_salt = $hash_format . $salt;
  $hash = crypt($password, $format_and_salt);
  return $hash;
}
function generate_salt($length)
{

  // Not 100% unique, not 100% random, but good enough for a salt
  // MD5 returns 32 characters
  $unique_random_string = md5(uniqid(mt_rand(), true));

  // Valid characters for a salt are [a-zA-Z0-9./]
  $base64_string = base64_encode($unique_random_string);

  // But not '+' which is valid in base64 encoding
  $modified_base64_string = str_replace('+', '.', $base64_string);

  // Truncate string to the correct length
  $salt = substr($modified_base64_string, 0, $length);

  return $salt;
}
function password_check($password, $existing_hash)
{
  // existing hash contains format and salt at start
  $hash = crypt($password, $existing_hash);
  if ($hash === $existing_hash) {
    return true;
  } else {
    return false;
  }
}
function find_admin_by_username($username)
{
  global $con;

  $safe_username = mysqli_real_escape_string($con, $username);
  $query  = "SELECT * ";
  $query .= "FROM admins ";
  $query .= "WHERE username = '{$safe_username}' ";
  $query .= "LIMIT 1";
  $admin_set = mysqli_query($con, $query);
  confirm_query($admin_set);
  if ($admin = mysqli_fetch_assoc($admin_set)) {
    return $admin;
  } else {
    return null;
  }
}
function attempt_login($username, $password)
{
  $admin = find_admin_by_username($username);
  if ($admin) {
    // found admin, now check password
    if (password_check($password, $admin["hashed_password"])) {
      // password matches
      return $admin;
    } else {
      // password does not match
      return false;
    }
  } else {
    // admin not found
    return false;
  }
}

/***
 * Normal functions start here
 */

function  getInfoEmployee($id)
{
  global $con;
  $query   = " select s.sname, s.mobile, s.email, s.rdate, d.dname, t.tname,t.start_date, t.end_date, t.location ";
  $query  .= "from staff as s, departments as d, enrollment as e, training as t ";
  $query  .= " where s.depid = d.did AND s.sid = e.sid AND e.tid = t.tid AND s.sid = $id ";
  $result = mysqli_query($con, $query);
  if ($result) {
    //$res = mysqli_fetch_assoc($result);
    return $result;
  } else {
    echo "There is erros";
  }
}
function getTrainers()
{
  global $con;
  $dat = array();
  $query = "SELECT trainer, count(*) FROM training group by trainer ";
  $result = mysqli_query($con, $query);
  if ($result) {
    return $result;
  } else {
    echo "There is erros";
  }
}
function getTrainersBycourses()
{
  global $con;
  $dat = array();
  $query = "SELECT trainer, count(*) FROM training group by trainer ";
  $result = mysqli_query($con, $query);
  if ($result) {
    return $result;
  } else {
    echo "There is erros";
  }
}

function getTrainersByName()
{
  global $con;
  $dat = array();
  $query = "SELECT YEAR(start_date), trainer, count(*) FROM training group by trainer ";
  $result = mysqli_query($con, $query);
  if ($result) {
    return $result;
  } else {
    echo "There is erros";
  }
}
function getDepartment()
{
  global $con;
  $query = "SELECT * FROM departments ";
  $result = mysqli_query($con, $query);
  if ($result) {
    return $result;
  } else {
    echo "There is erros";
  }
}

function getHisDepartment($id)
{
  global $con;
  $query = "SELECT * FROM departments WHERE did = $id ";
  $result = mysqli_query($con, $query);
  if ($result) {
    $res = mysqli_fetch_assoc($result);
    return $res['dname'];
  } else {
    echo "There is erros";
  }
}

function getHisDepartmentProject($pid)
{
  global $con;
  $query = " SELECT d.dname, p.name  ";
  $query .= " FROM training as t, projects as p, departments as d ";
  $query .= " WHERE t.project_id = p.pid AND p.dep_id = d.did AND t.project_id = {$pid} LIMIT 1 ";
  $result = mysqli_query($con, $query);
  //   echo $query;
  if ($result) {
    $res = mysqli_fetch_assoc($result);
    return $res['dname'];
  } else {
    echo "There is erros is";
  }
}

function isEnrolled($tid, $sid)
{
  global $con;
  $query = " SELECT *   ";
  $query .= " FROM enrollment ";
  $query .= " WHERE tid = {$tid} AND sid = {$sid}  ";
  $result = mysqli_query($con, $query);
  $stst = mysqli_num_rows($result);
  return $stst;
  //echo $query;
  //return $result;
  /** 
    if ($result) {
        return "Yes";
    } else {
        return   "No";
    } */
}


function getProject()
{
  global $con;
  $query = "SELECT * FROM projects ";
  $result = mysqli_query($con, $query);
  if ($result) {
    return $result;
  } else {
    echo "There is erros";
  }
}
function getTraining()
{
  global $con;
  $query = "SELECT * FROM training order by YEAR(start_date)";
  $result = mysqli_query($con, $query);
  if ($result) {
    return $result;
  } else {
    echo "There is erros";
  }
}
function getAllTraining()
{
  global $con;
  $query = "SELECT * FROM training ";
  $result = mysqli_query($con, $query);
  if ($result) {
    return $result;
  } else {
    echo "There is erros";
  }
}
function getTinformation($tid)
{
  global $con;
  $query = "SELECT distinct  s.sname, d.dname, s.email ";
  $query .= " FROM enrollment as e, staff as s, departments as d, training as t ";
  $query .= " WHERE t.tid = s.sid AND e.sid = s.sid AND s.depid = d.did AND e.tid = $tid ";
  $result = mysqli_query($con, $query);
  if ($result) {
    return $result;
  } else {
    echo "There is erros";
  }
}

function getTrainingByYear()
{
  global $con;
  $query = "SELECT count(*), YEAR(start_date)  FROM training group by YEAR(start_date)";
  $result = mysqli_query($con, $query);
  if ($result) {
    return $result;
  } else {
    echo "There is erros";
  }
}
function getTrainersThisYear($year)
{
  global $con;
  $query = "select * from training where YEAR(start_date) = '$year' ";
  $result = mysqli_query($con, $query);
  if ($result) {
    return $result;
  } else {
    echo "There is erros";
  }
}

function getTrainingTitle($tid)
{
  global $con;
  $query = "SELECT * FROM training WHERE tid = {$tid} ";
  $result = mysqli_query($con, $query);
  if ($result) {
    return $result;
  } else {
    echo "There is erros";
  }
}

function getStaff()
{
  global $con;
  $query = "SELECT * FROM staff ";
  $result = mysqli_query($con, $query);
  if ($result) {
    return $result;
  } else {
    echo "There is erros";
  }
}
