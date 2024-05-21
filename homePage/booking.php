<!-- sideBar -->
<?php include 'sideBar.php'?>

<?php
include '../loginPage/db.php';
$userID = $_SESSION['userId'];
$sql = "SELECT b.id, b.name, b.email, b.date, b.booking_date, e.name eventname, e.type, e.price FROM bookings b LEFT JOIN events e ON b.event_id=e.id WHERE b.user_id='$userID'";
$result = $conn->query($sql);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Happening</title>

    <link rel="stylesheet" href="booking.css">

    <!-- css -->
    <link rel="stylesheet" href="style.css">

    <!-- icon -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



</head>
<body>
    
    <section class="section-container">
        <div class="section_content">
            <div class="text">
                <h3>Booking Details</h3>
                <p>Here is your booking details.</p>
            </div>

            <!-- // $sql = "SELECT b.id, b.name, b.email, b.date, e.name eventname, e.type, e.price FROM bookings b LEFT JOIN events e ON b.event_id=e.id"; -->
            <!-- // $result = $conn->query($sql); -->

            <!--------------------- container------------------ -->

            
            <div class="booking-box-container">

            <!-- unit boxes -->
                <?php if($result->num_rows>0){
                    while($data=$result->fetch_assoc()){
                    ?>
            <div class="box"> 
                        <div class="event_type">

                        <strong>I N V O I C E</strong></br>

                        <hr style="border: none; border-top: 1px solid black;"></br>
                        <div class="left"><?php echo $data['name']."<br>".$data['email']?></div>
                        <div class="right"><?php echo "Invoice Num: ".$data['id']."<br>"."Invoice Date: ".$data['booking_date']?></div>
                        <hr style="border: none; border-top: 1px solid black;">

                        <h2><?php echo $data['eventname']?></h2>
                        <p><?php echo "Rs.".$data['price']." per package"?></p></br>
                        <h4><?php echo "Booked Date: ".$data['date']?></h4>
                        <h4><?php echo "Amount: ".$data['price']?></h4></br>
                        <i>booked</i>
                        </div>
            </div>
            <?php
            }
                }else{
                    echo "<div class='empty_text'>No Any Booking Details Available!!</div>";
                    }
                    ?>

        </div>

        
        <!-- footer -->
        <?php include 'footer.php'?>
    </section>
    

</body>
</html>