<?php
    require 'db_conn.php';
   //  var_dump($_POST);
  

            $username = $_POST['username'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $email = $_POST['email'];
      
            
            $sql = "INSERT INTO users_detail (username,`password`,`name`,email) 
                                VALUES ('$username','$password','$name','$email')";
            // var_dump(mysqli_query($mysqli, $sql));
            if (mysqli_query($mysqli, $sql)) {
                header("location: ../admin_event.php");
            } else {
            echo "Error: " . $sql . ":-" . mysqli_error($mysqli);
            }
            mysqli_close($mysqli);

?>