<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>

    <head>
        <link rel="stylesheet" href="style.css">


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
                    Image: <input type="file" id="image"name="image" accept="image/*"><br>
                    <input type="submit" id="save-button" value="Save">
                </form>
            </td>
        </tr>
        <tr>
            <td id="table-data"></td>
        </tr>
    </table>




    <!-- Modal -->
    <div id="modal">
        <div id="modal-form">
            <h2>Edit Form</h2>
            <div id="close-btn">X</div>
            <table cellpadding="0" width="100%">
            </table>
        </div>
    </div>



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


            //show modal box
            $(document).ready(function () {
                // Show modal when the "Edit" button is clicked
                $(document).on("click", ".edit-btn", function () {
                    $("#modal").show();
                    var emppId = $(this).data("eid");

                    $.ajax({
                        url: "load-update-form.php",
                        type: "POST",
                        data: { id: emppId },
                        success: function (data) {
                            $("#modal-form table").html(data);
                        }
                    })
                });
                //hide modal box
                $("#close-btn").on("click", function () {

                    $("#modal").hide();

                });



                $(document).on("click", "#edit-submit", function () {
                    var emppId = $("#editid").val(); // Ensure this matches the ID in your HTML
                    var name = $("#editName").val();
                    var email = $("#editEmail").val();
                    var phone = $("#editPhone").val();
                    var dob = $("#editDob").val();
                    var gender = $("#editGender").val();
                    var language = $("#editLanguage").val();
                    var address = $("#editAddress").val();
                    var state = $("#editState").val();
                    var district = $("#editDistrict").val();
                    var pincode = $("#editPincode").val();
                    var experience = $("#editExperience").val();
                    var salary = $("#editSalary").val();
                    var bio = $("#editBio").val();
                    // var image = $("input[type='file']"); // Ensure this matches the file input ID

                    var formData = new FormData();
                    formData.append("id", emppId);
                    formData.append("name", name);
                    formData.append("email", email);
                    formData.append("phone", phone);
                    formData.append("dob", dob);
                    formData.append("gender", gender);
                    formData.append("language", language);
                    formData.append("address", address);
                    formData.append("state", state);
                    formData.append("district", district);
                    formData.append("pincode", pincode);
                    formData.append("experience", experience);
                    formData.append("salary", salary);
                    formData.append("bio", bio);
                   
                    formData.append("image", image); 

                    $.ajax({
                        url: "ajax-update-form.php",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data == 1) {
                                $("#modal").hide();
                            } else {
                                console.log("Update failed. Server response:", data);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.log("AJAX Error:", status, error);
                        }
                    });
                });


            });

        });
    </script>

    <script src="script.js"></script>
</body>

</html>