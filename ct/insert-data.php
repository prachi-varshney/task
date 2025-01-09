

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .delete-btn {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>Add Records</h1>
            </td>
        </tr>
        <tr>
            <td id="table-form">
                <form id="formData" enctype="multipart/form-data">
                    Name: <input type="text" id="name"><br>
                    Email: <input type="email" id="email"><br>
                    Phone: <input type="tel" id="phone"><br>
                    Date of Birth: <input type="date" id="dob"><br>
                    Gender:
                    <select id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select><br>
                    Language: <input type="text" id="language"><br>
                    Address: <textarea id="address"></textarea><br>
                    State: <input type="text" id="state"><br>
                    District: <input type="text" id="district"><br>
                    Pincode: <input type="text" id="pincode"><br>
                    Experience: <input type="number" id="experience"><br>
                    Salary: <input type="number" id="salary"><br>
                    Bio: <textarea id="bio"></textarea><br>
                    Image: <input type="file" id="image"><br>
                    <input type="submit" id="save-button" value="Save">
                </form>
            </td>
        </tr>
        <tr>
            <td id="table-data"></td>
        </tr>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            function loadTable() {
                $.ajax({
                    url: "ajax-load.php",
                    type: "POST",
                    success: function (data) {
                        $("#table-data").html(data);
                    }
                });
            }
            loadTable(); // Load Table records on page load

            // Insert new record
            $("#save-button").on("click", function (e) {
                e.preventDefault();

                var formData = new FormData();
                formData.append("name", $("#name").val());
                formData.append("email", $("#email").val());
                formData.append("phone", $("#phone").val());
                formData.append("dob", $("#dob").val());
                formData.append("gender", $("#gender").val());
                formData.append("language", $("#language").val());
                formData.append("address", $("#address").val());
                formData.append("state", $("#state").val());
                formData.append("district", $("#district").val());
                formData.append("pincode", $("#pincode").val());
                formData.append("experience", $("#experience").val());
                formData.append("salary", $("#salary").val());
                formData.append("bio", $("#bio").val());
                formData.append("image", $("#image")[0].files[0]);

                $.ajax({
                    url: "ajax-insert.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
    if (data == 1) {
        loadTable(); // Reload the table to show the new record
        $("#formData")[0].reset(); // Clear the form fields
    
} else {
                            alert("Failed to save the record. Please try again.");
                        }
                    },
                    error: function () {
                        alert("An error occurred while saving the record. Please try again.");
                    }
                });
            });

            // Delete record
            $(document).on("click", ".delete-btn", function () {
                var emppId = $(this).data("id"); // Corrected syntax
                if (confirm("Are you sure you want to delete this record?")) {
                    $.ajax({
                        url: "ajax-delete.php",
                        type: "POST",
                        data: { id: emppId }, // Send the ID to the server
                        success: function (data) {
                            if (data == 1) {
                                loadTable(); // Reload the table after deletion
                            } else {
                                alert("Failed to delete the record. Please try again.");
                            }
                        },
                        error: function () {
                            alert("An error occurred while deleting the record. Please try again.");
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>


