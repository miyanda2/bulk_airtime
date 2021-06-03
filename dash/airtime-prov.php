<?php

require_once '../functions.php';
//instance of DB connection
$data_source = new DataSource;
$conn = $data_source->getConnection();
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
    <link href="css/airtime.css" rel="stylesheet">
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
            <li class="active"><a href="airtime-prov.php"><em class="fa fa-bar-chart">&nbsp;</em>APIs</a></li>
            <li><a href="config-msg.php"><em class="fa fa-cogs">&nbsp;</em> Configure Message</a></li>
            <li><a href="send.php"><em class="fa fa-paper-plane-o">&nbsp;</em> Send Airtime</a></li>

            <li><a href="../login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div>


    <div class="col-lg-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                        <em class="fa fa-home"></em>
                    </a>
                </li>
                <li class="active">Config</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">API Keys</h1>
            </div>
        </div><br><br>
        <!--Africastalking section-->
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <form method="post" action="process/process-set.php">
                <div class="col-lg-12 col-lg-12">
                    <h2>Africastalking</h2>
                    <div class="panel panel-container">
                        <div class="col-lg-12">
                            <label>Username<br>
                                <input type="text" name="username" value=<?php echo $data_source->getAFSetting()->af_username; ?>></label>
                        </div>
                        <div class="col-lg-12">
                            <label>Api Key<br>
                                <input id="api" type="text" name="apikey" value=<?php echo $data_source->getAFSetting()->af_apikey; ?>>
                            </label>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="row-mt-4">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="save" type="submit">Save<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <!--NumVerify section-->
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <form method="post" action="./process/process-NVset.php">
                <div class="col-lg-12 col-lg-12">
                    <h2>Numverify</h2>
                    <div class="panel panel-container">
                        <div class="col-lg-8">
                            <label>Access Key<br>
                                <input id="accesskey" type="text" name="accesskey" value=<?php echo $data_source->getNVSetting()->nv_accesskey; ?>>
                            </label>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="row-mt-4">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="save" type="submit">Save<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!--nexmo section-->
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <form method="post" action="./process/process-NXset.php">
                <div class="col-lg-12 col-lg-12">
                    <h2>Nexmo</h2>
                    <div class="panel panel-container">
                        <div class="col-lg-12">
                            <label>API Key<br>
                                <input type="text" name="apikey" value=<?php echo $data_source->getNXSetting()->nx_apikey; ?>></label>
                        </div>
                        <div class="col-lg-12">
                            <label>API Secret<br>
                                <input id="api" type="text" name="apisec" value=<?php echo $data_source->getNXSetting()->nx_apisec; ?>>
                            </label>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="row-mt-4">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="save" type="submit">Save<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>