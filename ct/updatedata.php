<?php
// updatedata.php
include_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']); // Sanitize the ID
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phoneNo = $_POST['PhoneNo'];
    $dob = $_POST['DOB'];
    $gender = $_POST['Gender'];
    $language = $_POST['Language'];
    $address = $_POST['Address'];
    $state = $_POST['State'];
    $district = $_POST['District'];
    $pincode = $_POST['Pincode'];
    $experience = $_POST['Experience'];
    $salary = $_POST['Salary'];
    $bio = $_POST['Bio'];

    // Handle file upload
    if ($_FILES['Image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['Image']['name'];
        $tempName = $_FILES['Image']['tmp_name'];
        $uploadPath = "uploads/" . basename($image);
        move_uploaded_file($tempName, $uploadPath);
    } else {
        $image = $_POST['existingImage']; // Use the existing image if no new file is uploaded
    }

// Update the record using a prepared statement
$obj = new Database();
$query = "UPDATE empp SET 
          Name = ?, Email = ?, PhoneNo = ?, DOB = ?, Gender = ?, Language = ?, 
          Address = ?, State = ?, District = ?, Pincode = ?, Experience = ?, 
          Salary = ?, Bio = ?, Image = ? 
          WHERE ID = ?";
$data = $obj->updateData($query, [$name, $email, $phoneNo, $dob, $gender, $language, $address, $state, $district, $pincode, $experience, $salary, $bio, $image, $id]);

if ($data['success'] == true) {
    echo "Record updated successfully.";
} else {
    echo "Failed to update record.";
}
}
?>