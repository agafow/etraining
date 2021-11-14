<?php include('functions.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />

    <title>Training Management </title>
</head>

<body>
    <!-- Navbar header-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <div class="container">
            <a href="" class="navbar-brand">Training Day!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Add a new Training </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">View training schedule </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Manage Training</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container-fluid mt-5">
        <div class="row">

            <div class="container">
                <div class="row">

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h1 class="text-center"> Data table CRUD</h1>
                        <!-- Table -->
                        <!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> -->
                        <form action="fetch.php" method="post">
                            <div class="table-responsive">
                                <table class="table table-borderless display nowrap" id="example" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $res = getStaff();
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            echo "<tr><td>" . $row['sid'] . "</td><td>" . $row['sname'] . "</td><td>" . $row['mobile'] . "</td><td>" . $row['email'] . "</td><td>" . $row['gender'] . "</td><td>" . $row['dob'] . "</td></tr>";
                                        }
                                        ?>
                                    </tbody>

                                </table>

                            </div>

                            <div class="container p-4">


                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Enter name" name="sname" , id="sname">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="mobile" placeholder="Mobile number">
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Email" name="email">
                                    </div>
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="start_date" name="dob" placeholder="Start Date" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Female">
                                            <label class="form-check-label" for="inlineRadio1">Feamle</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Department</label>
                                            </div>
                                            <select class="custom-select" name="depid">
                                                <?php
                                                $res = getDepartment();
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    echo "<option value=" . $row['did'] . ">" . $row['dname'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm" name="submit">Submit</button>
                                <button class="btn btn-primary btn-sm" type="reset">Reset</button>
                        </form>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
            </script>
            <!-- Font Awesome -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
            <!-- Datepicker -->
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <!-- Datatables -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js">
            </script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js">
            </script>
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
            </script>
            <!-- Momentjs -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


            <script>
                $(document).ready(function() {
                    var table = $('#example').DataTable({
                        lengthChange: false,
                        "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        buttons: ['pdf', 'excel', 'csv']

                    });

                    table.buttons().container()
                        .appendTo('#example_wrapper .col-md-6:eq(0)');

                    $("#start_date").datepicker({
                        "dateFormat": "yy-mm-dd",
                        showButtonPanel: true,
                        changeMonth: true,
                        changeYear: true,
                        yearRange: "1930:2010"
                    });
                });
            </script>

            <script>
                $(document).ready(function()) {
                    var action = "select";
                    $.ajax({
                        url: 'fetch_data.php',
                        method: 'POST',
                        data: {
                            action: action
                        },
                        success: function(data) {
                            $('#sname')
                        }

                    });
                }

                $(document).on('click', '.update', function() {
                    var id = $(this).attr("id");
                    $.ajax({
                        url: "fetch_data.php",
                        method: "POST",
                        data: {
                            id: id
                        },
                        dataType: "json",
                        success: function(data) {
                            $('#action').text("Edit");
                            $('user_id').val(id);
                            $('#first_name').val(data.first_name);
                            $('#last_name').val(data.last_name);
                        }
                    })
                })
            </script>

            <footer class="p-3
     bg-dark text-white text-center position-relative">
                <div class="container">
                    <div class="row">
                        <p class="lead">Copyright &copy; 2021 Training By Duo</p>

                        <a href="#" class="position-absolute bottom-0 end-0 p-5">
                            <i class="bi bi-arrow-up-circle h1"></i>
                        </a>
                    </div>
                </div>
            </footer>
</body>

</html>