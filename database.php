<?php
namespace Dba;
//include the connection file
//code
include("connection.php");

//create an instance of Connection class
//code
$dbName="ecomerce";
$ecomerce = new Connection($dbName);

//call the createDatabase methods to create database "chap5Db"
//code
/*made manually*/
$query = "
CREATE TABLE Clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) UNIQUE,
password VARCHAR(80),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
";
//call the selectDatabase method to select the chap5Db
//code
$ecomerce->selectDatabase($dbName);
//call the createTable method to create table with the $query
//code
$ecomerce->createTable($query);
?>