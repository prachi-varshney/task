<?php
// $id = $_POST["Id"];
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$language = $_POST["language"];
$address = $_POST["address"];
$state = $_POST["state"];
$district = $_POST["district"];
$pincode = $_POST["pincode"];
$experience = $_POST["experience"];
$salary = $_POST["salary"];
$bio = $_POST["bio"];

// For file input, use $_FILES instead of $_POST
$image = $_FILES["image"]["name"];
$image_tmp = $_FILES["image"]["tmp_name"];
$target_dir = "uploads/";
$target_file = $target_dir . basename($image);
move_uploaded_file($image_tmp, $target_file);

$conn = mysqli_connect("localhost", "root", "", "test") or die("connection failed");

$sql = "INSERT INTO empp (
    Name, Email, PhoneNo, DOB, Gender, Language, Address, State, District, Pincode, Experience, Salary, Bio, Image
) VALUES (
    '{$name}', '{$email}', {$phone}, '{$dob}', '{$gender}', '{$language}', '{$address}', '{$state}', '{$district}', {$pincode}, {$experience}, {$salary}, '{$bio}', '{$image}'
)";

if(mysqli_query($conn, $sql)) {
echo 1;
}


?>