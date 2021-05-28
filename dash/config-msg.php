<?php

require_once '../functions.php';

$db = new DataSource();
$conn = $db->getConnection();

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
        <!-- /.container-fluid -->
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
            <li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li><a href="numbers.php"><em class="fa fa-phone-square">&nbsp;</em> Numbers</a></li>
            <li><a href="airtime-prov.php"><em class="fa fa-bar-chart">&nbsp;</em>Airtime Provider</a></li>
            <li class="active"><a href="config-msg.php"><em class="fa fa-cogs">&nbsp;</em> Configure Message</a></li>
            <li><a href="send.php"><em class="fa fa-paper-plane-o">&nbsp;</em> Send Airtime</a></li>

            <li><a href="../login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div>
    <!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
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
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Configuration</h1>
            </div>
        </div>
        <!--/.row-->

        <div class="col-md-8 col-sm-offset-3 col-md-10 col-lg-offset-2 main">
            <label class="control-label">Message</label><br>
            <div class="col-lg-12 col-lg-12">
                <div class="panel panel-container" id="panel">


                    <div class="row">
                        <div class="col-lg-12">
                             
                            <form method="post" action="process_msg.php">

                               
                                <textarea class="form-control white_bg" name="msg" cols="20" rows="15" required><?php echo $db->getMessage()->msg?></textarea>
                                <br><br>


                                <button class="btn btn-primary" type="submit" name="save" type="submit">Save</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>