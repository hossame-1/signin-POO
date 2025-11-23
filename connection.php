<?php
namespace Dba;
class Connection{
    private $servername="localhost";
    private $username="root";
    private $password="";
    public $conn;
    public function __construct($db_name){
        // Create connection
        //code
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $db_name);
        // Check connection
        //code
        if(!$this->conn){
            die("connection faileds" . mysqli_connect_error());
        }
        echo"connected succefully <br>";
    }
    public function selectDatabase($dbName){
        //select database with the conn of the class, using mysqli_select..
        //code
        if(mysqli_select_db($this->conn, $dbName)){
            echo "database selected <br>";
        }else{
            die("database not selected" . mysqli_error($this->conn));
        }
    }
    public function createTable($query){
        //creating a table with the query
        //code
        if(mysqli_query($this->conn, $query)){
            echo"table created <br>";
        }else{
            echo"table not created";
        }
    }
}
?>