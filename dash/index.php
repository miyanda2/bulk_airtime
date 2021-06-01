<?php

require_once '../functions.php';
require_once '../downloadpdf.php';

$data_source = new DataSource;
$number_count_object = $data_source->countTotalNumbers();
$event_count_object = $data_source->countEventNumbers();
$country_count_object = $data_source->countCountryNumbers();
//$country_event_count = $data_source->getEventCountrycount($event);

if (isset($_POST) && isset($_POST['downloadList'])) {
    $tag = $data_source->cleanInput($_POST['tag']);

    $connString =  $data_source->getConnection();

    $tag_name = mysqli_query($connString, "SELECT * FROM tag WHERE sn = '" . $tag . "'");

    $display_heading = array('sn' => 'ID', 'first_name' => 'Surname', 'last_name' => 'Othernames', 'phone_number' => 'Phone Number', 'country_code' => 'Country Code', 'country' => 'Country', 'carrier' => 'Carrier', 'currency_code' => 'Currency', 'date_created' => 'Date Created', 'tag_id' => 'Tag',);

    $result = mysqli_query($connString, "SELECT first_name, last_name, phone_number, country, carrier FROM phone_number WHERE tag_id = '" . $tag . "'") or die("database error:" . mysqli_error($connString));
    $header = mysqli_query($connString, "SHOW columns FROM phone_number");
    //$header = array('Field'=>'ID', 'Field'=> 'Surname', 'Field'=> 'Othernames','Field'=> 'Phone Number','Field'=> 'Country Code', 'Field'=> 'Country','Field'=> 'Carrier', 'Field'=> 'Country Currency', 'Field'=> 'Date Created', 'Field'=> 'Tag');

    $pdf = new PDF();
    //header
    $pdf->AddPage('L');
    //foter page
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial', 'B', 10);
    foreach ($header as $heading) {
        if ($heading['Field'] == 'tag_id' || $heading['Field'] == 'currency_code' || $heading['Field'] == 'country_code' || $heading['Field'] == 'sn' || $heading['Field'] == 'date_created') {
            continue;
        }
        $pdf->Cell(50, 12, $display_heading[$heading['Field']], 1);
    }
    foreach ($result as $row) {
        $pdf->Ln();
        foreach ($row as $column)
            $pdf->Cell(50, 12, $column, 0);
    }

    $pdf->Output();
}

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
        <div class="profile-sidebar">
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">Username</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
        <ul class="nav menu">
            <li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li><a href="numbers.php"><em class="fa fa-phone-square">&nbsp;</em> Numbers</a></li>
            <li><a href="airtime-prov.php"><em class="fa fa-bar-chart">&nbsp;</em>Airtime Provider</a></li>
            <li><a href="config-msg.php"><em class="fa fa-cogs">&nbsp;</em> Configure Message</a></li>
            <li><a href="send.php"><em class="fa fa-paper-plane-o">&nbsp;</em> Send Airtime</a></li>

            <li><a href="../login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
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
        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-4 col-md-4 col-lg-4 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-phone color-blue"></em>
                            <div class="large"><?php echo $number_count_object; ?></div>
                            <div class="text-muted">Numbers</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-md-4 col-lg-4 no-padding">
                    <div class="panel panel-blue panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa fa-calendar-o color-orange"></em>
                            <div class="large"><?php echo $event_count_object; ?></div>
                            <div class="text-muted">Events</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-md-4 col-lg-4 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa fa-globe color-teal"></em>
                            <div class="large"><?php echo $country_count_object; ?></div>
                            <div class="text-muted">Countries</div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <div>
            <h1 class="text-center">Event Country Count</h1>
            <form action="" method="post">
                <div class="col-lg-12 grid">
                    <div class="position-relative form-group">
                        <select name="tag" class="form-control" id="tag">
                            <?php echo $data_source->loadTagsIntoCombo(); ?>
                        </select>
                    </div>
                    <!--<div class="position-relative form-group center">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="downloadList">Download <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                        </div>
                    </div>--><br>
                </div>
            </form>
            <br/>
            <div>
                <table class="myDataTable table table-hover table-striped table-bordered" id="tblCountryCount">
                    <thead>
                        <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Country</th>
                            <th scope="col">Count</th>
                           
                        </tr>
                    </thead>
                    <tbody id="disp_body">               
                    </tbody>
                </table>
            </div>
        </div>
        <hr/>
        <div>
            <h1 class="text-center">Event Airtime History</h1>
            <form action="" method="post">
                <div class="col-lg-12 grid">
                    <div class="position-relative form-group">
                        <select name="tag" class="form-control" id="tag_history">
                            <?php echo $data_source->loadTagsIntoCombo(); ?>
                        </select>
                    </div>
                    <!--<div class="position-relative form-group center">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="downloadList">Download <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                        </div>
                    </div>--><br>
                </div>
            </form>
            <br/>
            <div>
                <table class="myDataTable table table-hover table-striped table-bordered" id="tblEventHistory">
                    <thead>
                        <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Is Successful</th>
                            <th scope="col">Total Attempts</th>
                            <th scope="col">Last Attempt</th>
                            <th scope="col">Is SMS Sent</th>
                        </tr>
                    </thead>
                    <tbody id="disp_history_body">               
                    </tbody>
                </table>
            </div>
        </div>
        
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

            $(document).on('change', '#tag', function(e) {
                e.preventDefault();

                //get user input
                var selected_event = $("#tag option:selected").val();

                if (selected_event == '-1') {
                    return false;
                }

                $.ajax({
                    url: 'process/ajaxGetEventContCount.php',
                    type: 'POST',
                    dataType: 'json',
                    data: '&event=' + selected_event,
                    success: function(msg) {          
                        if (msg.type == 'success') {
                            $('#disp_body').html(msg.message);
                            $('#tblCountryCount').DataTable( {
                                dom: 'Bfrtip',
                                buttons: [
                                    'excelHtml5',
                                    'csvHtml5',
                                    'pdfHtml5'
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

             $(document).on('change', '#tag_history', function(e) {
                e.preventDefault();

                //get user input
                var selected_event = $("#tag_history option:selected").val();

                if (selected_event == '-1') {
                    return false;
                }

                $.ajax({
                    url: 'process/ajaxGetEventAirtimeHistory.php',
                    type: 'POST',
                    dataType: 'json',
                    data: '&event=' + selected_event,
                    success: function(msg) {          
                        if (msg.type == 'success') {
                            $('#disp_history_body').html(msg.message);
                            $('#tblEventHistory').DataTable( {
                                dom: 'Bfrtip',
                                buttons: [
                                    'excelHtml5',
                                    'csvHtml5',
                                    'pdfHtml5'
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

        });
    </script>
</body>

</html>