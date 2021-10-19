<?php
include "db_conn.php";

$statusMsg = '';


$fileName = basename($_FILES["file"]["name"]);
$dirpath = dirname(getcwd());
$targetFilePath = "C:/xampp/htdocs/midterm_exam/Midterm_Exam/php/uploads/". $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
echo $fileType;
if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    $name = $_POST['name'];
    echo $eventName;
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $mysqli->query("INSERT into events (event_name, event_image, timemodified) VALUES ('$name','".$fileName."', NOW())");
            if($insert){
                echo "<SCRIPT> 
                alert('File Uploaded Successfully')
                window.location.replace('../admin_event.php');
                </SCRIPT>";
            }else{
                echo "<SCRIPT> 
                alert('File Upload Unsuccessful')
                window.location.replace('../admin_event.php');
               </SCRIPT>";
            } 
        }else{
            echo "<SCRIPT> 
            alert('Sorry, there was an error uploading your file.')
            window.location.replace('../admin_event.php');
            </SCRIPT>";
        }
    }else{
        echo "<SCRIPT> 
        alert('Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.')
        window.location.replace('../admin_event.php');
        </SCRIPT>";
    }
}else{
    echo "<SCRIPT> 
    alert('Please select a file to upload.')
    window.location.replace('../admin_event.php');
    </SCRIPT>";
        }

// Display status message
echo $statusMsg;
?>