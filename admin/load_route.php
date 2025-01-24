<?php

require 'db_conn.php';

if(isset($_POST['save']))
{
    $date =  $_POST['date'];
    $departure = $_POST['departure'];
    $DepartureTime =  $_POST['departure_time'];
    $ArrivalTime =  $_POST['arrival_time'];
    $Arrival =  $_POST['arrival'];
    $Seat =  $_POST['seats'];
    $fare = $_POST['fare'];


    $query = "INSERT INTO routes(date,departure,departure_time,arrival_time,arrival,seats,fare) VALUES ('$date','$departure','$DepartureTime','$ArrivalTime','$Arrival','$Seat','$fare')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Added Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => ' Not Add'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM routes WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: Routes.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location:Routes.php '); 
    }    
}
?>
