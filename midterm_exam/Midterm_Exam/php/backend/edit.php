<?php     
include 'db_conn.php'; 
  
if(isset($_POST['submit'])){
    $id = $_POST['editEventId'];
    $name = $_POST['editEventName'];
    echo "hello";
    $sql = "UPDATE events SET event_name = '".$name."' WHERE event_id = $id;";
    if (mysqli_query($mysqli, $sql)) {
      
        header("location: ../admin_event.php");
    } else {
    echo "Error: " . $sql . ":-" . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);
}
?>