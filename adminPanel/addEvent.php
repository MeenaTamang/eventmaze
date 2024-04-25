<!-- nav_Bar -->
<?php include 'nav_bar.php'?>

<?php include '../loginPage/db.php';
    if(isset($_POST['add_eventhappen'])){
        $event_name=$_POST['event_name'];
        $event_image=$_FILES['event_image']['name'];
        $event_image_temp_name=$_FILES['event_image']['tmp_name'];
        $event_image_folder='images/'.$event_image;
        
        $insert_query=mysqli_query($conn,"insert into `eventhappen` (name, image) values
        ('$event_name','$event_image')") or die("Insert query failed");
        if($insert_query){
            move_uploaded_file($event_image_temp_name,$event_image_folder);
            $display_message= "Event inserted Successfully";
        }else{
            $display_message= "There is some error inserting the event";
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="event-form.css">

    <!-- css for nav_bar -->
    <link rel="stylesheet" href="style.css">

    <!-- icon -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



</head>
<body>
    
    <section class="section-container">
        <div class="section_content">
        <div class="text">
            <h1>Event Maze Planner</h1>
        </div>

<!-- form section where admin add the wedding package -->
    <div class="container">

    <!-- message display-->
    <?php
    if(isset($display_message)){
    echo "<div class='display_message'>
    <span>$display_message</span>
    <i class='bx bx-x' onclick='this.parentElement.style.display=`none`';></i>
    </div>";
    }
    ?>


    <section>
        <h3 class="heading">Add Event Happening</h3>
        <form action="" class="add_eventhappen" method="post" enctype="multipart/form-data">
            <input type="text" name="event_name"  placeholder="Enter the name" class="input_fields required">
            <br/>
            <input type="file" name="event_image" class="input_fields" required accept="image/png, image/jpg, image/jpeg">
            <br/>
            <input type="submit" name="add_eventhappen" class="submit_btn" value="Add Event"><br/>

        </form>
    </section>

</div>



</body>
</html>


