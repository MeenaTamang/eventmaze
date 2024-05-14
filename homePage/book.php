<?php
session_start();
include '../loginPage/db.php';
$eventID = $_SESSION['selectedEvent'];
$userID = $_SESSION['userId'];
$usersql = "select firstname, lastname, email From users where id='$userID'";
$result = $conn->query($usersql);
$userdata = $result->fetch_assoc();

$current_date = date("Y-m-d");

if(isset($_GET['date'])){
    $date = $_GET ['date'];
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mysqli = new mysqli('localhost', 'root','','eventmaze');
    $stmt = $mysqli->prepare("INSERT INTO bookings(name,email,date,event_id,booking_date,user_id) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param('ssssss', $name, $email, $date, $eventID, $current_date, $userID);
    $stmt->execute();
    $msg = "<div class='alert alert-success'>Booking Successfull</div>";
    $stmt->close();
    $mysqli->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384- BVYiiSlFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4VA+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="calendar.css"> -->

</head>
<body>
    
<div class="container">
    </br>
    <h2 class="text-center">Book for date: <?php echo date('Y-m-d',strtotime($date));?></h2></br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php echo isset($msg)?$msg:''; ?>
            <form action="" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $userdata['firstname'].' '.$userdata['lastname']?>">
                </div> 
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $userdata['email']?>">
                </div>  
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                <button><a href="eventPlanner.php"  class="package-button">Back</a></button>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384- Tc5lQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA712mCWNlpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>