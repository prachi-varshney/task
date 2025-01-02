<?php


function getData(){
           
    include "db.php";
    $query="select * from datafilter
    join status on datafilter.status=status.status_id
    order by datafilter.id desc";
    $output="";
    $total_row=mysqli_query($connect,$query) or die('error');

    if(mysqli_num_rows($total_row)>0){ //check record in data filter table like records that have 1 or mpre than 1 record available in table
        
        foreach($total_row as $row){
        
        // while($row=$total_row->fetch_assoc()){

            // get records ech data
         $output .='    
         <tr>   
        <td>'.$row['emp_name'].'</td>
        <td>'.$row['task_details'].'</td>
        <td>'.$row['start_date'].'</td>
        <td>'.$row['end_date'].'</td>
        <td>'.$row['task_status'].'</td>
        <td>

        <a href="" style="margin:5px;"><i class="fa fa-trash" style="font-size:10px;"></i>edit</a>
        <a href="" style="margin:5px;" data-val='.$row['id'].'><i class="fa fa-trash" style="font-size:10px;"></i>delete</a>
        
</a>
        </td>  
        </tr>
        ';
    }
    // echo $output;
}
    else{
        $output= "<h4>post not found!</h4>";
}
echo $output;
}

if (isset($_POST["action"])) {
    $output='';
  
    if ($_POST['action']== 'fetchData') {
    
        getData();
    }
    }






?>