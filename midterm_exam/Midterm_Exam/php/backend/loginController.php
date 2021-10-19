<?php
session_start();

include("db_conn.php");
$errors   = array(); 
if(isset($_POST['submit'])){
   
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users_detail WHERE username='$username' AND `password`='$password' LIMIT 1";
    $results = mysqli_query($mysqli, $query);
    $rows = mysqli_num_rows($results);
    if ( $rows > 0){
        $login_user = mysqli_fetch_assoc($results);
        if($login_user["user_type"]=="Admin"){
            $_SESSION["username"] = $username;
            header("location:../admin_event.php");
        }else{
            $_SESSION["username"] = $username;
            header("location:../user_page.php");
        }
    }else{
        echo "<SCRIPT> //not showing me this
        alert('Incorrect Username and Password')
        window.location.replace('../login.php');
        </SCRIPT>";
    }

};
?>