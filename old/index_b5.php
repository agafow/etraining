<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Data tables -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/date-1.1.1/r-2.2.9/datatables.min.css" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <title>Training </title>
</head>

<body>
    <!-- Navbar header-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
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


    <h1 class="text-center"> Data table CRUD</h1>

    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless display nowrap" id="datatable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Standard</th>
                                        <th>Percentage</th>
                                        <th>Result</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>518</td>
                                    <td>Itas training</td>
                                    <td>Standard</td>
                                    <td>60%</td>
                                    <td>Not known</td>
                                    <td>2021-20-10</td>
                                </tbody>
                            </table>

                        </div>

                        <div class="container p-4">
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="floatingInputGrid"
                                            placeholder="Enater name" id="sname">
                                        <label for="floatingInputGrid">Full name</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="floatingInputGrid" placeholder=""
                                            id="mobile">
                                        <label for="floatingInputGrid">Mobile number</label>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="floatingInputGrid"
                                                placeholder="" id="email">
                                            <label for="floatingInputGrid">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <div class="input-group mb-3">

                                                <div class="input-group date" id="datepicker">
                                                    <input type="text" class="form-control">
                                                    <div class="input-group-addon">
                                                        <span class="input-group-text bg-info text-white"
                                                            id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <select class="form-select" id="depid"
                                                    aria-label="Floating label select example">
                                                    <option value="1">Inland revenue</option>
                                                    <option value="2">Customs</option>
                                                </select>
                                                <label for="floatingSelectGrid">Deaprtment belong </label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-floating">
                                                <select class="form-select" id="gender"
                                                    aria-label="Floating label select example">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                                <label for="floatingSelectGrid">Select Gender </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <input type="hidden" name="id" id="user_id">
                                        <button class="btn btn-primary" type="submit" id="submit"> Submit
                                            form</button>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Optional JavaScript; choose one of the two! -->
            <!-- Jquery 3-->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
            </script>

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous">
            </script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js">
            </script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js">
            </script>
            <script type="text/javascript"
                src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/date-1.1.1/r-2.2.9/datatables.min.js">
            </script>

            <!-- Font Awesome -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
            <!-- Datepicker -->
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

            <script type="text/javascript">
            $('#datatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],


            });

            $(function() {
                $('#datepicker').datepicker();
            });

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
                    <p class="lead">Copyright &copy; 2021 Training By Duo</p>

                    <a href="#" class="position-absolute bottom-0 end-0 p-5">
                        <i class="bi bi-arrow-up-circle h1"></i>
                    </a>
                </div>
            </footer>
</body>

</html>