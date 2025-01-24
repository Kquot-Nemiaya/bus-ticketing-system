
<?php
session_start();
include('db_conn.php');
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $date = $_POST['date'];
    $departure = $_POST['departure'];
    $departuretime = $_POST['departure_time'];
    $arrivaltime = $_POST['arrival_time'];
    $arrival = $_POST['arrival'];
    $seat = $_POST['seats'];
    $fare=$_POST['fare'];

    $query = "UPDATE routes SET date='$date', departure='$departure', departure_time='$departuretime', arrival_time='$arrivaltime', arrival='$arrival', seats='$seat', fare='$fare' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = " Updated Successfully";
        header("Location: Routes.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = " Not Updated";
        header("Location: Routes.php");
        exit(0);
    }

}
?>
