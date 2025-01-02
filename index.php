<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TASK REPORT</title>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- calendar aa rha h start date and end date -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




    <script>
        $(function () {
            $("#start_date").datepicker();
            $("#end_date").datepicker();
        });
    </script>




    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #edf2f5;
        }

        body {
            padding: 30px;
        }

        .dropdown {
            list-style-type: none;
        }

        .dropdown a b {
            color: #fff;
        }

        .dropdown-menu {
            border-radius: 0;
            padding: 10px;
            width: 145%;
        }

        .headItem {
            margin-top: 17px;
            margin-left: 42px;
        }

        .panel-heading {
            background: #ffffff;
            padding-bottom: 19px;
        }

        .btn {
            float: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="panel panel-default">

                <div class="panel-heading" style="background:#ffffff;padding: bottom 19px;">
                    <strong>Search for employee</strong>

                    <a href="" class="btn btn-primary btn-sm" data-toggle="modal fade" data-target="addModal"
                        style="float:right;">

                        <i class="fa fa-plus" style="font-size:10px;"> </i>Add Task
                    </a>


                    <div class="modal fade" id="addTask">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Add Task</h3>
                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->

                                </div>
                                <div class="modal-body">
                                    <form id="postData">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="control-label">Employee Name</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="emp_name"
                                                        id="employee_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="control-label">task Details</label>

                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="task_details"
                                                        id="task_details">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="control-label">start date</label>

                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="start_date"
                                                        id="start_date">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="control-label">End date</label>

                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="end_date"
                                                        id="end_date">
                                                </div>

                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="control-label">status</label>

                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="status" id="status">
                                                        <option>select</option>
                                                        <option value="1">completed</option>
                                                        <option value="2">not completed</option>
                                                        <option value="3">hold</option>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="model-footer">
                                            <input type="submit" value="add Task" class="btn btn-primary" />

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                onclick="location.reload(true);">close</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>





                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <input type="text" name="emp_name" id="emp_name" class="form-control"
                                    placeholder="Search employee" style="width: 99%;">

                            </div>
                        </form>
                    </div>
                </div>

                <table class="table" style="background:#fff;">
                    <caption>list of employee</caption>
                    <thead>
                        <tr style="background: #4683de; color: #fff;">
                            <th style="width: 15%;">Employee name</th>
                            <th style="width: 30%;">task details
                                <ul class="headItem">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <b class="caret"></b>
                                        </a>

                                    </li>
                            </th>
                            <th style="width: 15%;"> start date</th>
                            <th style="width: 15%;"> end date</th>
                            <th style="width: 15%;">

                            </th>
                            <th style="width:10%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="post_list">

                    </tbody>
                </table>


            </div>
        </div>
</body>

</html>



<script type="text/javascript">
    $(document).ready(function () {
        fetchData();

    })

    function fetchData() {
        var Action = 'fetchData';
        $.ajax({
            url: "action.php",
            data: {
                'action': Action
            },
            type: "POST",
            success: function (data) {
                $("#post_list").html(data);
                // alert(data);
            }
        });
    }

    // $(document).ready(function () {

    //     $('#postData').submit(function (event) {
    //         event.preventDefault();

    //         var emp_name = $('#employee_name').val();
    //         var task_details = $('#task_name').val();
    //         var start_date = $('#start_date').val();
    //         var end_date = $('#end_date').val();
    //         var status = $('#status').val();

    //         if (emp_name != "" || task_details != "" || start_date != "" || status != "") {
    //             $ajax({
    //                 url: "upload.php",
    //                 type: "POST",
    //                 data: new FormData(this),
    //                 processData: false,
    //                 contentType: false,
    //                 success: function (data) {
    //                     alert(data);
    //                 }

    //             });
    //         }
    //         else {
    //             alert("Please fill all fields.");
    //         }

    //     });


    // });


    $(document).ready(function () {
    $('#postData').submit(function (event) {
        event.preventDefault();

        var emp_name = $('#employee_name').val();
        var task_details = $('#task_name').val();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        var status = $('#status').val();

        // Use && (AND) instead of || (OR) for validation
        if (emp_name != "" && task_details != "" && start_date != "" && status != "") {
            $.ajax({
                url: "upload.php",
                type: "POST",
                data: new FormData(this), // Use 'this' directly
                processData: false,
                contentType: false,
                success: function (data) {
                    alert(data); // Display the response from the server
                },
                // error: function (xhr, status, error) {
                //     console.error("AJAX Error: " + status + error); // Log errors
                }
            });
        } else {
            alert("Please fill all fields.");
        }
    
    });
});


</script>