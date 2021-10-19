<?php 
    session_start();
    include './backend/db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<script src="../js/admin.js"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midterm Exam</title>
    <link rel="stylesheet" href="../css/admin.css">

</head>
<body>

<section>

<div class="modal-event-edit" id="modal-event-edit">
    <form action="./backend/edit.php" method="POST">
        <center>
        <label>New Event Name:</label>
        <input type="text" name="editEventName" id="editEventName" required/>
        <input hidden type= "text" name="editEventId" id= "editEventId" >
        <input type="submit" name="submit" value="Submit"/>
        </center>
    </form>
</div>

<div class="admin_1stSection">
    <?php
$username = $_SESSION['username'];
$sql = "SELECT * FROM users_detail WHERE username ='$username'";
$check = mysqli_query($mysqli, $sql) or die ("err $id " . mysqli_error ($mysqli));
$check2 = mysqli_num_rows($check);
if ($check2 != 0) {
    while ($row = mysqli_fetch_assoc($check)) {
        $name = $row['name']; // repeat for all db columns you want
    }
}
?>
        <h1><?php echo $name ?></h1>
        <button><a href="./backend/logout.php">Logout</button></a>
            <br><hr>
        <div class="section1Buttons">
        <button type="button" value="Create User" onclick="showEventC()">Create Event</button>
        <button type="button" value="Create User" onclick="showUserC()">Create User</button>
        </div>
</div>
</section>

<section>
    <div class="admin_2ndSection" id="admin_2ndSection">
        <h1>Create Event</h1>
            <form action="./backend/create_event.php" method="post"   enctype="multipart/form-data">
                <label for="event_name" style="padding-right: 5%;">Event Name</label>
                <input type="text" id="name" name="name"><br><br>
                <label for="file" style="padding-right: 5%;">Event Image</label>
                <input type="file" name="file"><br><br>
                <hr>
                <input type="submit" name= "submit" value="Submit"/>
            </form>

    </div>
</section>

<section>
    <div class="admin_3rdSection" id="admin_3rdSection">
        <h1>Create User</h1>
        <form action="./backend/create_user.php" method="POST">
            <table>
                <tr>
                <td>Username:</td>
                <td><input type="text" name="username" required /></td>
                </tr>
                <tr>
                <td>Password:</td>
                <td><input type="password" name="password" required /></td>
                </tr>
                <tr>
                <td>Name:</td>
                <td><input type="text" name="name" required /></td>
                </tr>
                <tr>
                <td>Email:</td>
                <td><input type="email" name="email" required /></td>
                </tr>
            </table>
            <hr>
            <input type="submit"></input>
        </form>

    </div>
</section>
<hr>
    <div class="displayButton">
        <input type="button" onclick="showEventDA()" value="Display Events">
    </div>

    
    <div class="admin-event-container" id="admin-event-container">

    <?php 
     $query = "SELECT * FROM events";
     $res = mysqli_query($mysqli, $query);
     $row = mysqli_num_rows($res);
     if($row > 0){
        while($data = mysqli_fetch_array($res)){ 
        $imageURL = 'uploads/'.$data["event_image"];?>
        <div class="border_img">
        <img src="<?php echo $imageURL; ?>"width=500>
        <h1>Event Name: <?php echo $data["event_name"] ?> </h1>
        <?php $id = $data["event_id"]; 
              $name = $data["event_name"];
        ?> 
        <button onclick="showEdit(<?php echo $id?>)">Update</button><br><br>
        <button><a href="./backend/delete.php?id=<?php echo $id ?>">Delete</a></button><br><br>
        
        </div><br><br>

    <?php } ?>
    
<?php }else{ ?>
    <center><p>No image(s) found...</p></center>
<?php } ?>
    </div>


</body>
</html> 