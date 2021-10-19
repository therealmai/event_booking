<?php
include('db_conn.php');

if (isset($_GET['id']) && is_numeric($_GET['id']))
{
$id = $_GET['id'];
$query = "DELETE FROM events WHERE event_id = '$id'";
$data = mysqli_query($mysqli,$query);

if($data){
    echo "<SCRIPT> 
    alert('Delete Event Successfully')
    window.location.replace('../admin_event.php');
    </SCRIPT>";
}else{
    echo "<SCRIPT> 
    alert('Delete Event Unsuccessfull')
    window.location.replace('../admin_event.php');
    </SCRIPT>";
}

}
?>