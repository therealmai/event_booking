<?php
    require 'db_conn.php';
   //  var_dump($_POST);
  
   $event_id = $_GET['event_id'];
   $user_id = $_GET['user_id'];

   $sql = "INSERT INTO bookings (event_id, user_id) VALUES ('$event_id', '$user_id')";
      
            if (mysqli_query($mysqli, $sql)) {
             header("location: ../user_page.php");
             } else {
             echo "Error: " . $sql . ":-" . mysqli_error($mysqli);
            }
            mysqli_close($mysqli);

?>