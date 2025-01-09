<div id="table-data">
    <?php
    include_once('db.php');

    function updateList() {
        $obj = new Database();

        // Validate and sanitize the ID
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            echo "Invalid ID.";
            return;
        }

        $id = intval($_GET['id']); // Sanitize the ID

        // Fetch the record using a prepared statement
        $query = "SELECT * FROM empp WHERE ID = ?";
        $data = $obj->getData($query, [$id]);

        if ($data['success'] == true && !empty($data['data'])) {
            foreach ($data['data'] as $val) {
                ?>
                <form action="updatedata.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $val['ID']; ?>">
                    <table width="100%" border="1">
                        <tr>
                            <th>ID</th>
                            <td><?php echo $val['ID']; ?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><input type="text" name="Name" value="<?php echo $val['Name']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><input type="email" name="Email" value="<?php echo $val['Email']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Phone No.</th>
                            <td><input type="text" name="PhoneNo" value="<?php echo $val['PhoneNo']; ?>"></td>
                        </tr>
                        <tr>
                            <th>DOB</th>
                            <td><input type="date" name="DOB" value="<?php echo $val['DOB']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>
                                <select name="Gender">
                                    <option value="Male" <?php if ($val['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                    <option value="Female" <?php if ($val['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                    <option value="Other" <?php if ($val['Gender'] == 'Other') echo 'selected'; ?>>Other</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Language</th>
                            <td><input type="text" name="Language" value="<?php echo $val['Language']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><input type="text" name="Address" value="<?php echo $val['Address']; ?>"></td>
                        </tr>
                        <tr>
                            <th>State</th>
                            <td><input type="text" name="State" value="<?php echo $val['State']; ?>"></td>
                        </tr>
                        <tr>
                            <th>District</th>
                            <td><input type="text" name="District" value="<?php echo $val['District']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Pincode</th>
                            <td><input type="text" name="Pincode" value="<?php echo $val['Pincode']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Experience</th>
                            <td><input type="text" name="Experience" value="<?php echo $val['Experience']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Salary</th>
                            <td><input type="text" name="Salary" value="<?php echo $val['Salary']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td><textarea name="Bio"><?php echo $val['Bio']; ?></textarea></td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>
                                <?php if (!empty($val['Image'])): ?>
                                    <img src="<?php echo $val['Image']; ?>" alt="Current Image" width="100"><br>
                                <?php endif; ?>
                                <input type="file" name="Image">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Update"></td>
                        </tr>
                    </table>
                </form>
                <?php
            }
        } else {
            echo "No record found for the given ID.";
        }
    }

    updateList();
    ?>
</div>