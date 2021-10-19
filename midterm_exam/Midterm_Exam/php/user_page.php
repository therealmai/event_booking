<?php session_start() ;
    include './backend/db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<script src="../js/admin.js"></script>
<link rel="stylesheet" href="../css/admin.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midterm_Exam</title>
</head>
<body>
    <center>
    <section>
        <div class="admin_1stSection">
        <?php
$username = $_SESSION['username'];
$sql = "SELECT * FROM users_detail WHERE username ='$username'";
$check = mysqli_query($mysqli, $sql) or die ("err $id " . mysqli_error ($mysqli));
$check2 = mysqli_num_rows($check);
if ($check2 != 0) {
    while ($row = mysqli_fetch_assoc($check)) {
        $name = $row['name'];// repeat for all db columns you want
        $user_id = $row['user_id'];
    }
}
?>
        <h1><?php echo $name; ?></h1>
                <button><a style="color: inherit; text-decoration: none;"href="./backend/logout.php">Logout</button></a>
                    <hr><br>
                    <hr>
                <div class="section1Buttons">
                    <input type="button" onclick="showEventD()" value="Display Events"/> 
                    <input type="button" onclick="showBookD()" value="Booked Events"/> 
                </div>
        </div>
    </section>



    
    <div class="event-container" id="event-container"><br><br>
    <h1>Events</h1>
    <?php 
 $query = "SELECT events.event_name, events.event_image, events.event_id, bookings.user_id FROM events LEFT JOIN bookings ON events.event_id = bookings.event_id UNION SELECT events.event_name, events.event_image, events.event_id, bookings.user_id FROM events LEFT JOIN bookings ON events.event_id = bookings.event_id;";
 $res = mysqli_query($mysqli, $query);
 $row = mysqli_num_rows($res);
 if($row > 0){
    while($data = mysqli_fetch_array($res)){
    if(is_null($data["user_id"])){
    $imageURL = 'uploads/'.$data["event_image"];?>
    <div class="border_img">
    <img src="<?php echo $imageURL; ?>"width=500>
    <h1>Event Name: <?php echo $data["event_name"]; $id = $data["event_id"];?> </h1>
    <button><a href="./backend/book_event.php?event_id=<?php echo $id ?>&user_id=<?php echo $user_id ?>">Book</a></button><br><br>
    
    </div><br><br>
    <?php } ?>
<?php } ?>

<?php }else{ ?>
<center><p>No Events Found</p></center>
<?php }?>
    </div>
    


    <div class="eventb-container" id="eventb-container"><br>
    <h1>Booked Events</h1>
    <?php 
 $query = "SELECT events.event_name, events.event_image, events.event_id, bookings.user_id,bookings.booking_id FROM events LEFT JOIN bookings ON events.event_id = bookings.event_id UNION SELECT events.event_name, events.event_image, events.event_id, bookings.user_id,bookings.booking_id FROM events LEFT JOIN bookings ON events.event_id = bookings.event_id;";
 $res = mysqli_query($mysqli, $query);
 $row = mysqli_num_rows($res);
 if($row > 0){
    while($data = mysqli_fetch_array($res)){
    if(!is_null($data["user_id"]) && $data["user_id"] == $user_id){
    $imageURL = 'uploads/'.$data["event_image"];?>
    <div class="border_img">
    <img src="<?php echo $imageURL; ?>"width=500>
    <h1>Event Name: <?php echo $data["event_name"]; $booking_id = $data["booking_id"] ?> </h1>
    <button><a href="./backend/unbook_event.php?deleteId=<?php echo $booking_id ?>">Cancel</a></button><br><br>
    
    </div><br><br>
    <?php } ?>
<?php } ?>

<?php }else{ ?>
<center><p>No Events Found</p></center>
<?php }?>
    </div>

</body>
</html>