<?php
include 'db_connect.php';

class DB_FUNCTIONS
{

    private $__conn;
    private $__db;

    public $SMS_API;
    public $SMS_API_USERNAME;
    public $SMS_API_PASSWORD;
    public $SMS_API_MASK;
    public $SMS_API_COUNTRYCODE;

    public function __construct()
    {

        $this->db   = new DB_CONNECT();
        $this->conn = $this->db->connect();
        // echo 'connection ';
        if ($this->conn) {
            // echo 'connected';
        } else {
            // echo 'error while connecting';
        }
    }

    public function saveMarks($marks)
    {
        $response = array();
        $maxIdStmt = "SELECT id FROM marks ORDER BY id DESC LIMIT 1";
        $myResult  = $this->conn->query($maxIdStmt);
        $maxId     = 1;


        if ($myResult->num_rows > 0) {
            $row   = $myResult->fetch_assoc();
            $maxId = $row['id'];
            $maxId = $maxId + 1;
        }


        // $scheduled_id = $maxId;
        $stmt = "INSERT INTO marks (`id`, `marks`) VALUES ('$maxId','$marks')";

        if ($this->conn->query($stmt)) 
        {
           
                $response['error']   = false;
                $response['message'] = 'Marks Added Successfully';
        }
        else
        {
            $response['error']   = true;
            $response['message'] = 'Marks Not Added Successfully'.$stmt;
        }

        // echo json_encode($response);
    }

  
}