<?php
include('db_conn.php');

if(isset($_POST['delete-btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM routes WHERE id='$id' ";

    // execute the query
    $query_run = mysqli_query($conn, $query);

    if($query_run) {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: Routes.php'); 
    }
    else {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: Routes.php'); 
    }    
}
?>
