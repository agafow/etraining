<script src="https://code.jquery.com/jquery-3.5.0.min.js"
    integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
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
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
</script>
<!-- Momentjs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

</script>


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

    $("#dob").datepicker({
        "dateFormat": "yy-mm-dd",
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        yearRange: "1930:2020"
    });
});
</script>

<script>
$(function() {
    $("#start_date").datepicker({
        "dateFormat": "yy-mm-dd",

    });
    $("#end_date").datepicker({
        "dateFormat": "yy-mm-dd",

    });
});
</script>
<footer class="pt-2  
     bg-primary text-white text-center position-relative">
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