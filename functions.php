<?php

function check_login($con){

    if (isset($_SESSION['sn'])) {
        $id = $_SESSION['sn'];
        $query = "select * from user where name = '$sn' limit 1";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location: ./index2.php");
    die;
}



require_once 'HmsSessionHandler.php';

class DataSource
{
    const HOST = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DATABASENAME = 'airtime-dis';
    
    private $conn;
    public $sessionHandler;

    public function __construct()
    {
        $this->conn = $this->getConnection();
        $this->sessionHandler = new HmsSessionHandler;
    }

    
    public function getConnection()
    {
        $conn = new mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASENAME);

        if (mysqli_connect_errno()) {
            trigger_error("Problem with connecting to database.");
        }
        
        $conn->set_charset("utf8");
        return $conn;
    }

    public function getPDOConnection()
    {
        // specify your own database credentials
         
        $host = 'localhost';
        $db_name = 'airtime-dis';
        $username = 'root';
        $password = "";

        /*$host = "127.0.0.1";
        $db_name = "dbamigwfyejsdq";
        $username = "uly7ksebwl9tu ";
        $password = "p2rgw8wfeznh";*/

        try{
            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $exception){
            die("Connection error: " . $exception->getMessage());
            die("<h2> Server Error. Contact Administrator</h2>");
        }
    }

    
    public function select($query, $paramType = "", $paramArray = array())
    {
        $stmt = $this->conn->prepare($query);

        if (! empty($paramType) && ! empty($paramArray)) {

            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }

        if (! empty($resultset)) {
            return $resultset;
        }
    }

    
    public function insert($query, $paramType, $paramArray)
    {
        $stmt = $this->conn->prepare($query);
        $this->bindQueryParams($stmt, $paramType, $paramArray);

        $stmt->execute();
        $insertId = $stmt->insert_id;
        return $insertId;
    }

    public function execute($query, $paramType = "", $paramArray = array())
    {
        $stmt = $this->conn->prepare($query);

        if (! empty($paramType) && ! empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        $stmt->execute();
    }

    
    public function bindQueryParams($stmt, $paramType, $paramArray = array())
    {
        $paramValueReference[] = & $paramType;
        for ($i = 0; $i < count($paramArray); $i ++) {
            $paramValueReference[] = & $paramArray[$i];
        }
        call_user_func_array(array(
            $stmt,
            'bind_param'
        ), $paramValueReference);
    }


    
    public function getRecordCount($query, $paramType = "", $paramArray = array())
    {
        $stmt = $this->conn->prepare($query);
        if (! empty($paramType) && ! empty($paramArray)) {

            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        $stmt->execute();
        $stmt->store_result();
        $recordCount = $stmt->num_rows;

        return $recordCount;
    }


    //get currency codes

    public function getCurrencyCode($countrycode)
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT * FROM countries WHERE countryCode = '".$countrycode."'";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();
            if($count > 0){
                $stmt = $prepared_query ->fetchObject();
                return $stmt;
            }else{
                return false;
                //return $count;
            }
        } catch (Exception $e) {
            return false;
            //return $e->getMessage();
        }
    }


        
    public function cleanInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = addslashes($data);

        return $data;
    }


    // Check if current use us Valid
    public function isUserLoggedIn($path)
    {
        global $sessionHandler;

        if($sessionHandler->sessionExist('isLoggedIn')){
            return true;
        }else{
            redirectTo($path);
        }
    }

    // check if login is Valid
    public function isLoginValid($username, $password)
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."'";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();

            if($count > 0){
                return 'success';
            }else{
                return false;
                //return $count;
            }
        } catch (Exception $e) {
            //return false;
            return $e->getMessage();
        }
    }


    //Count Total Amount of number 
    public function countTotalNumbers()
	{
		$con = $this->getPDOConnection();

        try {
            $query = "SELECT COUNT(*) AS total FROM phone_number";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();
            if($count > 0){
            	$stmt = $prepared_query ->fetchObject();
                return $stmt->total;
            }else{
                return 0;
                //return $count;
            }
        } catch (Exception $e) {
            return false;
            //return $e->getMessage();
        }
	}


    // count amount of created Events
    public function countEventNumbers()
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT COUNT(*) AS total FROM tag";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();
            if ($count > 0) {
                $stmt = $prepared_query->fetchObject();
                return $stmt->total;
            } else {
                return 0;
                //return $count;
            }
        } catch (Exception $e) {
            return false;
            //return $e->getMessage();
        }
    }


    //sort and count countries
    public function countCountryNumbers()
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT COUNT(DISTINCT(country)) AS total FROM phone_number";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();
            if ($count > 0) {
                $stmt = $prepared_query->fetchObject();
                return $stmt->total;
            } else {
                return 0;
                //return $count;
            }
        } catch (Exception $e) {
            return false;
            //return $e->getMessage();
        }
    }

    
    // Save imported Phone number into DB  
    public function saveNumber($tag_id, $first_name, $last_name, $phone_number, $country_code, $country, $carrier, $currency_code)
    {
        $con = $this->getPDOConnection();

        date_default_timezone_set('Africa/Lagos'); // Set the Default Time Zone:
        $date = '';
        $d = new DateTime($date);
        $cdate = $d->format('Y-m-d h:i:s');

        $con->beginTransaction();


        try{

            $query1 = "INSERT INTO phone_number (tag_id, first_name, last_name, phone_number, country_code, country, carrier, currency_code, date_created) 
                    VALUES (:tag_id, :first_name, :last_name, :phone_number, :country_code, :country, :carrier, :currency_code, :date_created)";
            $stmt1 = $con->prepare($query1);
            // prepare sql and bind parameters
            $stmt1->bindParam(':tag_id', $tag_id);
            $stmt1->bindParam(':first_name', $first_name);
            $stmt1->bindParam(':last_name', $last_name);
            $stmt1->bindParam(':phone_number', $phone_number);
            $stmt1->bindParam(':country_code', $country_code);
            $stmt1->bindParam(':country', $country);
            $stmt1->bindParam(':carrier', $carrier);
            $stmt1->bindParam(':currency_code', $currency_code);
            $stmt1->bindParam(':date_created', $cdate);
            
            $stmt1->execute();                 
            $stmt1->closeCursor();

            $con->commit();

            return 'success';

        } catch (Exception $e) {
            $con->rollBack();
            return false;
            //return $e->getMessage();
        }       
    }

    // Save airtime history record  
    public function saveAirtimeHistory($tag_id, $phone_id, $amount, $success, $attempt, $last_attempt, $sms_sent)
    {
        $con = $this->getPDOConnection();

        date_default_timezone_set('Africa/Lagos'); // Set the Default Time Zone:
        $date = '';
        $d = new DateTime($date);
        $cdate = $d->format('Y-m-d h:i:s');

        $con->beginTransaction();


        try{

            $query1 = "INSERT INTO airtime_history (tag_id, phone_id, amount, success, attempt, last_attempt, sms_sent) 
                    VALUES (:tag_id, :phone_id, :amount, :success, :attempt, :last_attempt, :sms_sent)";
            $stmt1 = $con->prepare($query1);
            // prepare sql and bind parameters
            $stmt1->bindParam(':tag_id', $tag_id);
            $stmt1->bindParam(':phone_id', $phone_id);
            $stmt1->bindParam(':amount', $amount);
            $stmt1->bindParam(':success', $success);
            $stmt1->bindParam(':attempt', $attempt);
            $stmt1->bindParam(':last_attempt', $last_attempt);
            $stmt1->bindParam(':sms_sent', $sms_sent);
            
            $stmt1->execute();                 
            $stmt1->closeCursor();

            $con->commit();

            return 'success';

        } catch (Exception $e) {
            $con->rollBack();
            return false;
            //return $e->getMessage();
        }       
    }


    //load Event into dropdown

    public function loadTagsIntoCombo($param_cat = '')
    {
        $r = '';

        $con = $this->getPDOConnection();

        try {
            $query = "SELECT * FROM tag ORDER BY event ASC";
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();

          if($count > 0){

            $stmt = $prepared_query ->fetchAll();

            $r .= "<option value = '-1'>Select Event</option>";

            foreach ($stmt as $tags => $tag) {

              if($tag['sn'] == $param_cat){
                $r .= "<option value='" . $tag['sn'] . "' selected='selected'>" . $tag['event'] . "</option>";
                $cat_found = true;
              }else{
                $r .= "<option value='" . $tag['sn'] . "'>" . $tag['event'] . "</option>";
              }
            }

          }else{
            $r .= "<option value = '-1'>No Record Found</option>";
          }
        } catch (Exception $e) {
          return '-1';
            //return $e->getMessage();
        }

        return $r;
    }



    //load country into dropdown

    public function loadCountryIntoCombo($param_cat = '')
    {
        $r = '';

        $con = $this->getPDOConnection();

        try {
            $query = "SELECT * FROM countries ORDER BY countryName ASC";
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();

          if($count > 0){

            $stmt = $prepared_query ->fetchAll();

            $r .= "<option value = '-1'>Select Country</option>";

            foreach ($stmt as $countries => $country) {

              if($country['countryCode'] == $param_cat){
                $r .= "<option value='" . $country['countryCode'] . "' selected='selected'>" . $country['countryName'] . "</option>";
                $cat_found = true;
              }else{
                $r .= "<option value='" . $country['countryCode'] . "'>" . $country['countryName'] . "</option>";
              }
            }

          }else{
            $r .= "<option value = '-1'>No Record Found</option>";
          }
        } catch (Exception $e) {
          return '-1';
            //return $e->getMessage();
        }

        return $r;
    }

    //add new events
    public function addNewEvent($events)
    {
        $con = $this->getPDOConnection();

        date_default_timezone_set('Africa/Lagos'); // Set the Default Time Zone:
        $date = '';
        $d = new DateTime($date);
        $cdate = $d->format('Y-m-d h:i:s');

        $con->beginTransaction();

        try {

            // prepare sql and bind parameters      
            $query = "INSERT INTO tag (event) 
                    VALUES (:events)";
            $stmt = $con->prepare($query);
            // prepare sql and bind parameters
            $stmt->bindParam(':events', $events);
            

            $stmt->execute();
            $con->commit();
            $stmt->closeCursor();
            return true;
        } catch (Exception $e) {
            $con->rollBack();
            return false;
            //return $e->getMessage();
        }
    }

    public function getEventCountryList($event_id)
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT * FROM phone_number WHERE tag_id = '" . $event_id . "' GROUP BY country_code";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();
            if ($count > 0) {
                $stmt = $prepared_query->fetchAll();
                return $stmt;
            } else {
                return false;
                //return $count;
            }
        } catch (Exception $e) {
            return false;
            //return $e->getMessage();
        }
    }


    //get Africastalking credentials
    public function getAFSetting()
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT af_username, af_apikey FROM setting WHERE sn = 1";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();
            if ($count > 0) {
                $stmt = $prepared_query->fetchObject();
                return $stmt;
            } else {
                return false;
                //return $count;
            }
        } catch (Exception $e) {
            return false;
            //return $e->getMessage();
        }
    }

    public function getNVSetting()
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT nv_accesskey FROM setting WHERE sn = 1";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();
            if ($count > 0) {
                $stmt = $prepared_query->fetchObject();
                return $stmt;
            } else {
                return false;
                //return $count;
            }
        } catch (Exception $e) {
            return false;
            //return $e->getMessage();
        }
    }

    public function getNXSetting()
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT nx_apikey, nx_apisec FROM setting WHERE sn = 1";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();
            if ($count > 0) {
                $stmt = $prepared_query->fetchObject();
                return $stmt;
            } else {
                return false;
                //return $count;
            }
        } catch (Exception $e) {
            return false;
            //return $e->getMessage();
        }
    }

    //return msg
    public function getMessage()
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT msg FROM message WHERE sn = 1";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();
            if ($count > 0) {
                $stmt = $prepared_query->fetchObject();
                return $stmt;
            } else {
                return false;
                //return $count;
            }
        } catch (Exception $e) {
            return false;
            //return $e->getMessage();
        }
    }

  

    public function getEventAirtimeList($event_id, $country_code)
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT * FROM phone_number WHERE tag_id = '" . $event_id . "' AND country_code = '" . $country_code . "'";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();
            if ($count > 0) {
                $stmt = $prepared_query->fetchAll();
                return $stmt;
            } else {
                return false;
                //return $count;
            }
        } catch (Exception $e) {
            return false;
            //return $e->getMessage();
        }
    }

    public function getEventCountrycount($event_id)
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT country, COUNT(sn) AS total FROM phone_number WHERE tag_id = '" . $event_id . "'  GROUP BY country ORDER BY COUNT(sn) DESC";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();
            if ($count > 0) {
                $stmt = $prepared_query->fetchAll();
                return $stmt;
            } else {
                // return false;
                return $count;
            }
        } catch (Exception $e) {
            // return false;
            return $e->getMessage();
        }
    }

    public function getEventAirtimeHistory($event_id)
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT * FROM airtime_history AS ah INNER JOIN phone_number AS p ON ah.phone_id = p.sn WHERE ah.tag_id = '" . $event_id . "'  ORDER BY attempt DESC";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();
            if ($count > 0) {
                $stmt = $prepared_query->fetchAll();
                return $stmt;
            } else {
                // return false;
                return $count;
            }
        } catch (Exception $e) {
            // return false;
            return $e->getMessage();
        }
    }

    public function getEventById($event_id)
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT event FROM tag WHERE sn = '".$event_id."'";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();
            if ($count > 0) {
                $stmt = $prepared_query->fetchObject();
                return $stmt->event;
            } else {
                return false;
                //return $count;
            }
        } catch (Exception $e) {
            return false;
            //return $e->getMessage();
        }
    }

    public function isPhoneNumberExist($event_id, $phone_number)
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT * FROM phone_number WHERE tag_id = '" . $event_id . "' AND phone_number = '" . $phone_number . "'";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();
            if ($count > 0) {                
                return 'exist';
            } else {
                return 'success';
                //return $count;
            }
        } catch (Exception $e) {
            return false;
            //return $e->getMessage();
        }
    }

    public function saveErrorLog($phone_number, $message, $source, $tag_id)
    {
        $con = $this->getPDOConnection();

        date_default_timezone_set('Africa/Lagos'); // Set the Default Time Zone:
        $date = '';
        $d = new DateTime($date);
        $cdate = $d->format('Y-m-d h:i:s');

        $con->beginTransaction();

        try {

            // prepare sql and bind parameters      
            $query = "INSERT INTO error_log (phone_number, message, source, tag_id) VALUES (:phone_number, :message, :source, :tag_id)";
            $stmt = $con->prepare($query);
            // prepare sql and bind parameters
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':message', $message);  
            $stmt->bindParam(':source', $source);
            $stmt->bindParam(':tag_id', $tag_id);           

            $stmt->execute();
            $con->commit();
            $stmt->closeCursor();
            return true;
        } catch (Exception $e) {
            $con->rollBack();
            return false;
            //return $e->getMessage();
        }
    }

    
    public function getEventErrorLog($event_id)
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT * FROM error_log WHERE tag_id = '" . $event_id . "' ";
            //return $query;
            $prepared_query = $con->prepare($query);
            $prepared_query->execute();
            $count = $prepared_query->rowCount();
            if ($count > 0) {
                $stmt = $prepared_query->fetchAll();
                return $stmt;
            } else {
                return false;
                //return $count;
            }
        } catch (Exception $e) {
            return false;
            //return $e->getMessage();
        }
    }

    public function deleteEvent($event_id)
    {
        $con = $this->getPDOConnection();

        try {
            // prepare sql and bind parameters
            $wArray = array('sn' => $event_id);
            $rs = $con->delete('tag', $wArray)->affectedRows();

            if ($rs > 0) {
                return 'success';
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
            //return $e->getMessage();
        }
    }


}





//SELECT country, COUNT(sn) AS total FROM phone_number WHERE tag_id = '" . $event_id . "'  GROUP BY country ORDER BY COUNT(sn) DESC