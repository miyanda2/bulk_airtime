<?php

class DataSource
{
    const HOST = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DATABASENAME = 'airtime-dis';

    private $conn;

    function __construct()
    {
        $this->conn = $this->getConnection();
    }

    
    public function getConnection()
    {
        $conn = new \mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASENAME);

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

    public function getCuurencyCode($countrycode)
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

    public function isUserLoggedIn($path)
    {
        global $sessionHandler;

        if($sessionHandler->sessionExist('isLoggedIn')){
            return true;
        }else{
            redirectTo($path);
        }
    }

    public function isLoginValid($username, $password)
    {
        $con = $this->getPDOConnection();

        try {
            $query = "SELECT COUNT(*) AS count FROM user WHERE username = '".$username."' AND password = '".$password."'";
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

    
}



