<!DOCTYPE html>
<html lang="en">
<head>
<body>
   <table id="main" border="0" cellspacing="0">
    <tr>
        <td id="header">
            <h1>REGISTRATION FORM</h1>
</td>
        </id>
    </tr>
    <tr>
        <td id ="table-load">
            <input type="button" id="load-button" value="Load Data">
            </td>
        </tr>
        <tr>
            <td id="table-data">
                
                </td>
        </tr>
   </table>

   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function(){
        $("#load-button").on("click",function(e){
            $.ajax({
                url:"ajax-load.php",
                type:"POST",
                success:function(data){
                    $("#table-data").html(data);
                    
                }
            });
        });
    });
</script>



    
</body>
</html>