<?php

include('db_conn.php');
if(isset($_POST['delete']))
 {
    $id = $_POST['id'];

    $query = "DELETE FROM booked WHERE id='$id' ";

    // execute the query
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: booked.php'); 
    }
    else {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: booked.php'); 
    }    
}
?>
