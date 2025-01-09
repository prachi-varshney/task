<?php
$conn = mysqli_connect("localhost", "root", "", "test") or die("connection failed");

$sql = "SELECT * FROM empp";
$result = mysqli_query($conn, $sql) or die("query failed");

if (mysqli_num_rows($result) > 0) {
    $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">


<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone no.</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>language</th>
            <th>address</th>

            <th>Experience</th>
            <th>Salary</th>
            <th>Bio</th>
            <th>Image</th>
            <th>Action</th>
</tr>';
while ($row = mysqli_fetch_assoc($result)) {

   $output.=" <tr>
                <td>{$row['ID'] }</td>
                <td>{$row['Name']} </td>
                <td>{$row['Email']} </td>
                <td>{$row['PhoneNo']} </td>
                <td>{$row['DOB'] }</td>
                <td>{$row['Gender'] }</td>
                <td>{$row['Language']} </td>
                <td>{$row['Address'] },
                    {$row['State']} ,
                    {$row['District']} ,
                    {$row['Pincode'] }
                </td>


                <td>{$row['Experience'] }</td>
                <td>{$row['Salary'] }</td>
                <td>{$row['Bio'] }</td>
                <td>{$row['Image'] }</td>
                <td><button class='delete-btn' data-id='{$row['ID'] }'>delete</button> <br>
                <button class='update-btn' data-id='{$row['ID'] }'>update</button></td>

                  
                
                </tr>";

}
$output .= "</table>";

mysqli_close($conn);
echo $output;
} else {
echo "<h2>No record found</h2>";
}



?>