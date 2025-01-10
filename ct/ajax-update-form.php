<?php
$empp_id = $_POST['id']; // Sanitize the ID
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$dob = $_POST["dob"];
$gender = $_POST['gender'];
$language = $_POST['language'];
$address = $_POST['address'];
$state = $_POST['state']; // Corrected variable name
$district = $_POST['district'];
$pincode = $_POST['pincode'];
$experience = $_POST['experience'];
$salary = $_POST['salary'];
$bio = $_POST['bio'];
// $image = $_FILES['image']['name']; // Uncomment if image is required


if (isset($_FILES['Image'])) {
    $image = $_FILES['Image']['name'];
} else {
    $image = '';
}


$conn = mysqli_connect("localhost", "root", "", "test") or die("connection failed");

$sql = "UPDATE empp SET 
    Name = '{$name}', 
    Email = '{$email}', 
    PhoneNo = {$phone},
    DOB = {$dob},
    Gender = '{$gender}', 
    Language = '{$language}', 
    Address = '{$address}', 
    State = '{$state}', 
    District = '{$district}', 
    Pincode = {$pincode}, 
    Experience = {$experience}, 
    Salary = {$salary}, 
    Bio = '{$bio}' ,
    Image = '{$image}'  
WHERE ID = {$empp_id}";


$result = mysqli_query($conn, $sql);
// echo $sql;

if ($conn->error) {
    echo 1;
} else {
    echo $conn->error;
}

?>

