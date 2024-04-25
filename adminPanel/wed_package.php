<!-- nav_Bar -->
<?php include 'nav_bar.php'?>

<?php include '../loginPage/db.php';
    if(isset($_POST['add_wed'])){
        $wed_name=$_POST['wed_name'];
        $wed_summary=$_POST['wed_summary'];
        $wed_veg=$_POST['wed_veg'];
        $wed_nonveg=$_POST['wed_nonveg'];
        $wed_feature=$_POST['wed_feature'];
        $wed_price=$_POST['wed_price'];
        $wed_population=$_POST['wed_population'];
        $wed_image=$_FILES['wed_image']['name'];
        $wed_image_temp_name=$_FILES['wed_image']['tmp_name'];
        $wed_image_folder='images/'.$wed_image;
        
        $insert_query=mysqli_query($conn,"insert into `events` (name, summary, veg, nonveg, features, price, population, image, type) values
        ('$wed_name','$wed_summary','$wed_veg','$wed_nonveg','$wed_feature','$wed_price','$wed_population','$wed_image','wedding')") or die("Insert query failed");
        if($insert_query){
            move_uploaded_file($wed_image_temp_name,$wed_image_folder);
            $display_message= "Wedding package inserted Successfully";
        }else{
            $display_message= "There is some error inserting the packages";
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
        <h3 class="heading">Add Wedding Package</h3>
        <form action="" class="add_wed" method="post" enctype="multipart/form-data">
            <input type="text" name="wed_name"  placeholder="Enter the name" class="input_fields required"><br/>
            <input type="text" name="wed_summary"  placeholder="Summary" class="input_fields required"><br/>
            <label>Facilities:</label>
            <input type="text" name="wed_veg"  placeholder="Veg" class="input_fields required"><br/>
            <input type="text" name="wed_nonveg"  placeholder="Non-Veg" class="input_fields required"><br/>
            <label >Additional Wedding Features:</label>
            <input type="text" name="wed_feature"  placeholder="Additional Feature" class="input_fields required"><br/>
            <input type="number" name="wed_price" min="0" placeholder="Price" class="input_fields required"><br/>
            <input type="number" name="wed_population" min="0" placeholder="Population" class="input_fields required"><br/>
            <input type="file" name="wed_image" class="input_fields" required accept="image/png, image/jpg, image/jpeg"><br/>
            <input type="submit" name="add_wed" class="submit_btn" value="Add wedding"><br/>
            <a class="cancel_btn" href="eventPackage.php">Cancel</a>

        </form>
    </section>

</div>



</body>
</html>


