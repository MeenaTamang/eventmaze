<!-- nav_Bar -->
<?php include 'nav_bar.php'?>

<?php include '../loginPage/db.php';
    if(isset($_POST['add_regular'])){
        $regular_name=$_POST['regular_name'];
        $regular_summary=$_POST['regular_summary'];
        $regular_veg=$_POST['regular_veg'];
        $regular_nonveg=$_POST['regular_nonveg'];
        $regular_feature=$_POST['regular_feature'];
        $regular_price=$_POST['regular_price'];
        $regular_population=$_POST['regular_population'];
        $regular_image=$_FILES['regular_image']['name'];
        $regular_image_temp_name=$_FILES['regular_image']['tmp_name'];
        $regular_image_folder='images/'.$regular_image;
        
        $insert_query=mysqli_query($conn,"insert into `events` (name, summary, veg, nonveg, features, price, population, image, type) values
        ('$regular_name','$regular_summary','$regular_veg','$regular_nonveg','$regular_feature','$regular_price','$regular_population','$regular_image', 'regular')") or die("Insert query failed");
        if($insert_query){
            move_uploaded_file($regular_image_temp_name,$regular_image_folder);
            $display_message= "Regular package inserted Successfully";
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

<!-- form section where admin add the regular package -->
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
        <h3 class="heading">Add Regular Event Package</h3>
        <form action="" class="add_regular" method="post" enctype="multipart/form-data">
            <input type="text" name="regular_name"  placeholder="Enter the name" class="input_fields required"><br/>
            <input type="text" name="regular_summary"  placeholder="Summary" class="input_fields required"><br/>
            <label>Facilities:</label>
            <input type="text" name="regular_veg"  placeholder="Veg" class="input_fields required"><br/>
            <input type="text" name="regular_nonveg"  placeholder="Non-Veg" class="input_fields required"><br/>
            <label >Additional Wedding Features:</label>
            <input type="text" name="regular_feature"  placeholder="Additional Feature" class="input_fields required"><br/>
            <input type="number" name="regular_price" min="0" placeholder="Price" class="input_fields required"><br/>
            <input type="number" name="regular_population" min="0" placeholder="Population" class="input_fields required"><br/>
            <input type="file" name="regular_image" class="input_fields" required accept="image/png, image/jpg, image/jpeg"><br/>
            <input type="submit" name="add_regular" class="submit_btn" value="Add Regular Event"><br/>
            <a class="cancel_btn" href="eventPackage.php">Cancel</a>

        </form>
    </section>

</div>



</body>
</html>


