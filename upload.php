<?php

include "db.php";
// echo"here";

$emp_name=$_POST['emp_name'];
$
?>














   USE test;  
 
CREATE TABLE Emp (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    PhoneNo INT(10),
    DOB DATE,
    Gender ENUM('Male', 'Female', 'Other'),
    Language ENUM('Hindi', 'English', 'Other'),
    Address TEXT,
    State VARCHAR(50),
    District VARCHAR(50),
    Pincode INT,
    Experience INT,
    Salary DECIMAL(10, 2),
    Bio TEXT,
    Image VARCHAR(255)
);
