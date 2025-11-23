<?php
class Client{
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $reg_date;
    public static $errorMsg = "";
    public static $successMsg= "";
    public function __construct($firstname,$lastname,$email,$password){
        //initialize the attributs of the class with the parameters, and hash the password
        //code
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    public function insertClient($tableName,$conn){
        //insert a client in the database, and give a message to $successMsg and $errorMsg
        //code
        $Query = "INSERT INTO $tableName(firstname, lastname, email, password)
                  VALUES  ('$this->firstname', '$this->lastname', '$this->email', '$this->password')";
        static::$errorMsg ="this input is unvalid";
        static::$successMsg ="this input is valid";

        if(mysqli_query($conn, $Query)){
            echo static::$successMsg;
        }else{
            echo static::$errorMsg;
        }

    }
    public static function selectAllClients($tableName,$conn){
        //select all the client from database, and inset the rows results in an array $data[]
        //code
        $data = [];
        $Query = "SELECT *FROM $tableName";
        $results = mysqli_query($conn, $Query);
        if(mysqli_num_rows($results) > 0){
            while($rows = mysqli_fetch_assoc($results)){
                $data[] = $rows;
            }
        }
        return $data;
    }
    static function selectClientById($tableName,$conn,$id){
        //select a client by id, and return the row result
        //code
        $Query= "SELECT *FROM $tableName WHERE id='$id'";
        $results=mysqli_query($conn, $Query);
        if(mysqli_num_rows($results) > 0){
            $rows = mysqli_fetch_assoc($results);
        }
        return $rows;
    }
    static function updateClient($client,$tableName,$conn,$id){
        //update a client of $id, with the values of $client in parameter
        //and send the user to read.php
        //code
        $Query = "UPDATE $tableName SET firstname = $client->firstname,lastname = $client->lastname,email = $client->email,password = $client>password 
                  WHERE id = '$id'";
        if(mysqli_query($conn, $Query)){
            echo "parameter updated";
            header("Location: read.php");
        }else{
            echo"not updated";
        }
    }
    static function deleteClient($tableName,$conn,$id){
        //delet a client by his id, and send the user to read.php
        //code
        $Query = "DELETE $tableName WHERE id = '$id'";
        if(mysqli_query($conn, $Query)){
            echo "client deleted";
            header("Location: read.php");
        }else{
            echo"not deleted";
        }       
    }
    }
?>