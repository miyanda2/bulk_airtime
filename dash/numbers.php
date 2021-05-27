<?php
    require_once '../functions.php';
    $db = new DataSource();
    $conn = $db->getConnection();

    if (isset($_POST["import"]))
    {

        $fileName = $_FILES["file"]["tmp_name"];

        if ($_FILES["file"]["size"] > 0)
        {

            $file = fopen($fileName, "r");

            $error = array();

            while (($column = fgetcsv($file, 10000, ",")) !== false)
            {
                $firstname = "";
                $lastname = "";
                $phonenumber = "";
                $country = '';
                $currency_code = '';
                $country_code = '';
                $carrier = '';
                $tag_id = '';

                $tag_id = $db->cleanInput($_POST['tag']);

                if (isset($column[0]))
                {
                    $firstname = $db->cleanInput($column[0]);
                }

                if (isset($column[1]))
                {
                    $lastname = $db->cleanInput($column[1]);
                }

                if (isset($column[2]))
                {
                    $phonenumber = $db->cleanInput($column[2]);
                }

                // set API Access Key
                $access_key = 'bb1eae61a7e24d7f88a2d862851305f7';

                // set phone number
                $phone_number = $phonenumber;

                // Initialize CURL:
                $ch = curl_init('http://apilayer.net/api/validate?access_key=' . $access_key . '&number=' . $phone_number . '');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                // Store the data:
                $json = curl_exec($ch);
                curl_close($ch);

                // Decode JSON response:
                $validationResult = json_decode($json, true);

                // Access and use your preferred validation result objects
                $validationResult['valid'];
                $country_code = $validationResult['country_code'];
                $carrier = $validationResult['carrier'];

                $data_source = new DataSource;

                $currency_code_object = $data_source->getCurrencyCode($country_code);

                if ($currency_code_object != false)
                {
                    $currency_code = $currency_code_object->currencyCode;
                    $country = $currency_code_object->countryName;

                    $response = $db->saveNumber($tag_id, $firstname, $lastname, $phone_number, $country_code, $country, $carrier, $currency_code);

                    if ($response == 'success')
                    {
                        $type = "success";
                        $message = "CSV Data Imported into the Database";
                    }
                    else
                    {
                        array_push($error, $response . ' - error with ' . $phone_number);
                        $type = "error";
                        $message = "Problem in Importing CSV Data";
                    }
                }

                /* $countrycode = "";
                        // if (isset($column[3])) {
                        //     $countrycode = mysqli_real_escape_string($conn, $column[3]);
                        // }
                
                
                       
                        //  $carrier = "";
                        // if (isset($column[5])) {
                        //     $carrier = mysqli_real_escape_string($conn, $column[5]);
                        // }
                        
                        $sqlInsert = "INSERT into phone_number (first_name,last_name,phone_number,country_code,carrier,currency_code,country)
                               values (?,?,?,?,?,?,?)";
                        $paramType = "sssssss";
                        $paramArray = array(
                            $firstname,
                            $lastname,
                            $phonenumber,
                            $contcode,
                            $carrier1,
                            $currency_code,
                            $country,
                        );                
                
                        $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
                */

            }

        }
    }
?>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bulk-Airtime - Widgets</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/number.css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->

        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <script src="js/jquery-3.2.1.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="#"><span>Bulk-Airtime</span>Admin</a>

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
                <li class="active"><a href="numbers.php"><em class="fa fa-phone-square">&nbsp;</em> Numbers</a></li>
                <li><a href="airtime-prov.php"><em class="fa fa-bar-chart">&nbsp;</em>Airtime Provider</a></li>
                <li><a href="config-msg.php"><em class="fa fa-cogs">&nbsp;</em> Configure Message</a></li>
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
                    <li class="active">Numbers</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Numbers</h1>
                </div>
            </div><br>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <select name="tag" class="form-control">
                                    <?php echo $db->loadTagsIntoCombo(); ?>                        
                                </select>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-lg-12"> 
                                <input type="file" name="file" class="form-control" accept=".csv">
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-lg-12"> 
                                <button class="btn btn-primary form-control" name="import" type="submit" id="submit">
                                    Import Numbers
                                </button>
                            </div>
                        </div>         
                    </form>
                </div>
            </div>
            <br/><br/>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default articles">
                        <div class="panel-heading">
                            Upload Numbers
                        </div>

                        <div class="panel-heading">
                            <?php
                                $sqlSelect = "SELECT * FROM phone_number AS p INNER JOIN tag AS t ON p.tag_id = t.sn";
                                $result = $db->select($sqlSelect);
                                if (!empty($result))
                                {
                            ?>
                                <table class="table" id="userTable">
                                    
                                    <thead>
                                        <tr>
                                            <th scope="col">SN</th>
                                            <th scope="col">Tag</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Phone Num</th>
                                            <th scope="col">Country Code</th>
                                            <th scope="col">Currency Code</th>
                                            <th scope="col">Carrier</th>
                                            <th scope="col">Country</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sn = 0;
                                        foreach ($result as $row)
                                        {
                                            $sn++;
                                    ?>                                        
                                            <tr>
                                                <th scope="row"><?php echo $sn; ?></th>
                                                <td><?php echo $row['event']; ?></td> 
                                                <td><?php echo $row['first_name']; ?></td>     
                                                <td><?php echo $row['phone_number']; ?></td>
                                                <td><?php echo $row['country_code']; ?></td>
                                                <td><?php echo $row['currency_code']; ?></td>
                                                <td><?php echo $row['carrier']; ?></td>
                                                <td><?php echo $row['country']; ?></td>
                                            </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            <?php 
                                } 
                            ?>
                            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                        </div>
                    </div>
                </div>
                <!--/.row-->
            </div>
            <!--/.main-->

        </div>
        
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#frmCSVImport").on("submit", function () {

                    $("#response").attr("class", "");
                    $("#response").html("");
                    var fileType = ".csv";
                    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
                    if (!regex.test($("#file").val().toLowerCase())) {
                            $("#response").addClass("error");
                            $("#response").addClass("display-block");
                        $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
                        return false;
                    }
                    return true;
                });
            });
        </script>
    </body>

</html>
