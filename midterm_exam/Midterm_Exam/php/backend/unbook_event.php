<?php
include('db_conn.php');


if (isset($_GET['deleteId']) && is_numeric($_GET['deleteId']))
{
$id = $_GET['deleteId'];

$query = "DELETE FROM bookings WHERE booking_id = '$id'";
$data = mysqli_query($mysqli,$query);

if($data){
    echo "<SCRIPT> 
    alert('Delete Event Successfully')
    window.location.replace('../user_page.php');
    </SCRIPT>";
}else{
    echo "<SCRIPT> 
    alert('Delete Event Unsuccessfull')
    window.location.replace('../admin_event.php');
    </SCRIPT>";
}

}
?>