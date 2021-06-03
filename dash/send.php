<?php
    require '../vendor/autoload.php';
    use AfricasTalking\SDK\AfricasTalking;

    require_once '../functions.php';
    $db = new DataSource();

    $response_message = '';

    if (isset($_POST["send"])) {

        $tag = $db->cleanInput($_POST['tag']);
        $country = $db->cleanInput($_POST['country']);
        $amount = $db->cleanInput($_POST['amount']);

        $conn = $db->getConnection();

        // Set your app credentials
        $username = $db->getAFSetting()->af_username;
        $apikey   = $db->getAFSetting()->af_apikey;

        // Initialize the SDK
        $AT = new AfricasTalking($username, $apikey);

        // Get the airtime service
        $airtime  = $AT->airtime();

        $basic  = new \Vonage\Client\Credentials\Basic($db->getNXSetting()->nx_apikey, $db->getNXSetting()->nx_apisec);
        $client = new \Vonage\Client($basic);

        $currency_code_object = $db->getCurrencyCode($country);
        $phone_number = $db->getEventAirtimeList($tag, $country);
        $currency_code = $currency_code_object->currencyCode;

        $recipients = [];
        $sent_counter = 0;
        $failed_counter = 0;
        $sms_message = $db->getMessage()->msg;
        $event_tag = $db->getEventById($tag);

        for ($i = 0; $i < count($phone_number); $i++) {

            /*array_push($recipients,[
                            "phoneNumber"  => $phone_number[$i]['phone_number'],
                            "currencyCode" => $currency_code,
                            "amount"       => $amount
                        ]);*/
            $recipients = [[
                            "phoneNumber"  => $phone_number[$i]['phone_number'],
                            "currencyCode" => $currency_code,
                            "amount"       => $amount
                        ]];

            try {
                // That's it, hit send and we'll take care of the rest
                $results = $airtime->send([
                    "recipients" => $recipients

                ]);

            $sms_message = str_replace('&&name', $phone_number[$i]['first_name'] , $sms_message);
            $sms_message = str_replace('&&amount', $amount, $sms_message);
            $sms_message = str_replace('&&event', $event_tag, $sms_message);

            
                if($results['status'] == 'success'){
                    $sms_sent = 0;
                    $attempt = 1;
                    $last_attempt = 1;
                    $success = 1;

                    $sms_response = $client->sms()->send(
                        new \Vonage\SMS\Message\SMS($phone_number[$i]['phone_number'], $event_tag, $sms_message)
                    );

                    $sms_status = $sms_response->current();

                    if ($sms_status->getStatus() == 0) {
                        $sms_sent = 1;
                    }

                    $save_response = $db->saveAirtimeHistory($phone_number[$i]['tag_id'], $phone_number[$i]['sn'], $amount, $success, $attempt, $last_attempt, $sms_sent);  
                    $sent_counter++;                  
                }else{
                    $sms_sent = 0;
                    $attempt = 1;
                    $last_attempt = 1;
                    $success = 0;
                    $save_response = $db->saveAirtimeHistory($phone_number[$i]['tag_id'], $phone_number[$i]['sn'], $amount, $success, $attempt, $last_attempt, $sms_sent);
                    $failed_counter++;
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }

            sleep(1);
        }

        $response_message = '<div class="alert alert-info">'.$sent_counter.' Airtime Sent Successfully. '.$failed_counter.' Failed</div>';


        /*try {
            // That's it, hit send and we'll take care of the rest
            $results = $airtime->send([
                "recipients" => $recipients

            ]);

            print_r($results);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }*/
        
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
    <link href="css/send.css" rel="stylesheet">


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
            <li class="active"><a href="send.php"><em class="fa fa-paper-plane-o">&nbsp;</em> Send Airtime</a></li>

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
                <h1 class="page-header">Send Airtime</h1>
            </div>
        </div>
        <!--/.row-->
        <?php
            echo $response_message;
        ?>
        <form action="" method="post">
        
            <div class="col-lg-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
                <div class="col-lg-12 grid">
                    <div class="position-relative form-group">
                        <select name="tag" class="form-control" id="tag">
                            <?php echo $db->loadTagsIntoCombo(); ?>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <select name="country" class="form-control" id="country">
                            <?php echo $db->loadCountryIntoCombo(); ?>
                        </select>
                    </div>
                    <div class="position-relative form-group">

                    </div><br>
                </div>
                <!--/.row-->
                <div class="col-md-6 col-md-6">
                    <div class="panel panel-container" id="panel">

                        <div class="row-mt-4">
                            <div class="col-lg-12">
                                Amount<br>
                                <input id="input" type="text" placeholder="" name="amount">
                            </div>
                        </div>
                        <!--/.row-->
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="row-mt-4">
                        <div class="col-lg-12"><br>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="send" type="submit">Send<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>




    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

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
                    alert('please select an event');
                    return false;
                }

                $.ajax({
                    url: './process/ajaxGetEventCountries.php',
                    type: 'POST',
                    dataType: 'json',
                    data: '&event=' + selected_event,
                    success: function(msg) {
                        if (msg.type == 'success') {
                            $('#country').html(msg.message);
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