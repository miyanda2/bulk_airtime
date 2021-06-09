<?php

require_once '../functions.php';


$data_source = new DataSource;




?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span>Bulk-Airtime </span>Admin</a>
                <ul class="nav navbar-top-links navbar-right">
                </ul>
            </div>
        </div>

    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

        <div class="divider"></div>
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
        <ul class="nav menu">
            <li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li><a href="numbers.php"><em class="fa fa-phone-square">&nbsp;</em> Numbers</a></li>
            <li><a href="airtime-prov.php"><em class="fa fa-bar-chart">&nbsp;</em>APIs</a></li>
            <li><a href="config-msg.php"><em class="fa fa-cogs">&nbsp;</em> Configure Message</a></li>
            <li><a href="send.php"><em class="fa fa-paper-plane-o">&nbsp;</em> Send Airtime</a></li>
            <li class="active"><a href="events.php"><em class="fa fa-calendar-o">&nbsp;</em> Events</a></li>
            <li><a href="error.php"><em class="fa fa-exclamation-triangle">&nbsp;</em> Error Logs</a></li>
            <li><a href="../index.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                        <em class="fa fa-home"></em>
                    </a>
                </li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div>

        <div>
            <h1 class="text-center">Events</h1>
            <?php
            $sqlSelect = "SELECT * FROM tag";
            $result = $data_source->select($sqlSelect);
            if (!empty($result)) {
            ?>
                <br />
                <div>
                    <table class="myDataTable table table-hover table-striped table-bordered" id="tblevent">
                        <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 0;
                            foreach ($result as $row) {
                                $sn++;
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $sn; ?></th>
                                    <td><?php echo $row['event']; ?></td>
                                    <td><a href="process/delete.php?id=<?php echo $row['event']; ?>"><button class="btn btn-danger" type="submit" name="delete" type="submit">Delete</button></a></td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
            }
                ?>
                </div>
        </div>
        <hr />


        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>

        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

        <script type="text/javascript">
            function formatErrorMessage(jqXHR, exception) {
                if (jqXHR.status === 0) {
                    return ('Not connected.\nPlease verify your network connection.');
                } else if (jqXHR.status == 404) {
                    return ('The requested page not found. [404]');
                } else if (jqXHR.status == 500) {
                    return ('Internal Server Error [500].');
                } else if (exception === 'parsererror') {
                    return ('Requested JSON parse failed.');
                } else if (exception === 'timeout') {
                    return ('Time out error.');
                } else if (exception === 'abort') {
                    return ('Ajax request aborted.');
                } else {
                    return ('Uncaught Error.\n' + jqXHR.responseText);
                }
            }

            $(document).ready(function() {

                // $(document).on('change', '#tag', function(e) {
                //     e.preventDefault();

                //     //get user input
                //     var selected_event = $("#tag option:selected").val();

                //     if (selected_event == '-1') {
                //         return false;
                //     }

                $.ajax({
                    url: 'process/ajaxGetEvents.php',
                    type: 'POST',
                    dataType: 'json',
                    data: '&event=' + selected_event,
                    success: function(msg) {
                        if (msg.type == 'success') {
                            $('#disp_body').html(msg.message);
                            $('#tblevent').DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    'excelHtml5',
                                    'csvHtml5',
                                    'pdfHtml5',
                                ]
                            });
                        } else {
                            alert(msg.message);
                        }
                    },
                    error: function(x, e) {
                        alert(formatErrorMessage(x, e));
                    }
                });

            });
        </script>
</body>

</html>