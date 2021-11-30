<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"
        integrity="sha512-U3hGSfg6tQWADDQL2TUZwdVSVDxUt2HZ6IMEIskuBizSDzoe65K3ZwEybo0JOcEjZWtWY3OJzouhmlGop+/dBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Training Management </title>
</head>

<body>
    <!-- Navbar header-->
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark fixed-top  mb-5">
        <div class="container">
            <a href="index.php" class="navbar-brand">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="training.php" class="nav-link ">Training </a>
                    </li>
                    <li class="nav-item">
                        <a href="addTraining.php" class="nav-link">Add a new Training </a>
                    </li>
                    <li class="nav-item">
                        <a href="addStaff.php                                                                                                                                                                                                                                                                                                                                                                                   "
                            class="nav-link">Add Staff </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">View training schedule </a>
                    </li>

                    <?php 
                            if(isset($_SESSION['username'])) {
                                echo "<li class='nav-item'><a href='#' class='nav-link in'>";
                                 echo "Welcome Mr : ".htmlentities($_SESSION["username"]); 
                                 echo "</a></li>"; 
                                 echo "<li class='nav-item'><a href='logout.php' class='nav-link'>";
                                 echo "Logout";
                                 echo "</a></li>"; 
                            }else {
                                echo "<li class='nav-item'><a href='login.php' class='nav-link'>";
                                 echo "Login";
                                 echo "</a></li>"; 
                            }
                    ?>
                    <li class="nav-item">
                        <a href="dash.php" class="nav-link">Dashboard</a>
                    </li>
                </ul>


            </div>
        </div>
    </nav>
    <hr>