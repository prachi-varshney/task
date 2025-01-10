<?php

error_reporting(0);
//connection create
$connect = mysqli_connect("localhost", "root", "", "users") or die("Connection failed");

//check connection
   if(!$connect){
    die("connection failed". mysqli_connect_error());
   }



?>





CREATE TABLE Empp (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    PhoneNo INT(10),
    DOB DATE,
    Gender VARCHAR(10),
    Language VARCHAR(25),
    Address TEXT,
    State VARCHAR(50),
    District VARCHAR(50),
    Pincode INT,
    Experience INT,
    Salary DECIMAL(10, 2),
    Bio TEXT,
    Image VARCHAR(255)
);



UPDATE empp
SET Name = 'John Doe',
    Email = 'john.doe@example.com',
    PhoneNo = '1234567890',
    DOB = '1990-01-01',
    Gender = 'Male',
    Language = 'English',
    Address = '123 Main St',
    State = 'New York',
    District = 'New York',
    Pincode = '10001',
    Experience = '5 ',
    Salary = '50000',
    Bio = 'Software Engineer',
    Image = 'image.jpg'
WHERE ID = 2;


INSERT INTO empp (
    Name, Email, PhoneNo, DOB, Gender, Language, Address, State, District, Pincode, Experience, Salary, Bio, Image
) VALUES (
    'Prachi', '1234', 4353, '1990-01-01', 'gg', 'gg', 'gg', 'gg', 'gg', 123, 123, 123.45, 'gg', 'gg'
);

UPDATE empp SET 
    Name = 'John ddddd', 
    Email = 'john.doe@example.com', 
    PhoneNo = 1234567890,
    DOB = 1990-01-01,
    Gender = 'male', 
    Language = 'English', 
    Address = '123 Main St', 
    State = 'New York', 
    District = 'New York', 
    Pincode = 10001, 
    Experience = 5, 
    Salary = 50000.00, 
    Bio = 'Software Engineer' ,
    Image = ''  
WHERE ID = 2
