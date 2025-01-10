<?php

$empp_id = $_POST["id"];

$conn = mysqli_connect("localhost", "root", "", "test") or die("connection failed");

$sql = "SELECT * FROM empp WHERE id = {$empp_id}";
$result = mysqli_query($conn, $sql) or die("query failed");
$output = '';
if (mysqli_num_rows($result) > 0) {


    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
                        <td>Name</td>
                        <td><input type='text' id='editName' value='{$row["Name"]}'>
                        <input type='text' id='editid' hidden value='{$row["ID"]}'><br></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type='email' id='editEmail' value='{$row["Email"]}'><br></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><input type='tel' id='editPhone' value='{$row["PhoneNo"]}'><br></td>
                    </tr>


                            <tr>
                            <td>Dob</td>
                            <td><input type='date' id='editDob' value='{$row["DOB"]}'><br></td>
                            </tr>
                    
                    <tr>
                        <td>Gender</td>
                        <td>
                            <select id='editGender'>
                                <option value='male' " . ($row["Gender"] == "male" ? "selected" : "") . ">Male</option>
                                <option value='female' " . ($row["Gender"] == "female" ? "selected" : "") . ">Female</option>
                                <option value='other' " . ($row["Gender"] == "other" ? "selected" : "") . ">Other</option>
                            </select><br>
                        </td>
                    </tr>
                    <tr>
                        <td>Language</td>
                        <td><input type='text' id='editLanguage' value='{$row["Language"]}'><br></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><textarea id='editAddress'>{$row["Address"]}</textarea><br></td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td><input type='text' id='editState' value='{$row["State"]}'><br></td>
                    </tr>
                    <tr>
                        <td>District</td>
                        <td><input type='text' id='editDistrict' value='{$row["District"]}'><br></td>
                    </tr>
                    <tr>
                        <td>Pincode</td>
                        <td><input type='text' id='editPincode' value='{$row["Pincode"]}'><br></td>
                    </tr>
                    <tr>
                        <td>Experience</td>
                        <td><input type='number' id='editExperience' value='{$row["Experience"]}'><br></td>
                    </tr>
                    <tr>
                        <td>Salary</td>
                        <td><input type='number' id='editSalary' value='{$row["Salary"]}'><br></td>
                    </tr>
                    <tr>
                        <td>Bio</td>
                        <td><textarea id='editBio'>{$row["Bio"]}</textarea><br></td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><input type='file' name='file' id='editImage'><br></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type='submit' id='edit-submit' value='Save'></td>
                    </tr>";
    }

    mysqli_close($conn);
    echo $output;
} else {
    echo "<h2>No record found</h2>";
}
?>