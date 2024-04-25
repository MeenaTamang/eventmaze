<!-- nav_Bar -->
<?php include 'nav_bar.php'?>

<?php include '../loginPage/db.php';
    if(isset($_POST['add_mega'])){
        $mega_name=$_POST['mega_name'];
        $mega_summary=$_POST['mega_summary'];
        $mega_veg=$_POST['mega_veg'];
        $mega_nonveg=$_POST['mega_nonveg'];
        $mega_feature=$_POST['mega_feature'];
        $mega_price=$_POST['mega_price'];
        $mega_population=$_POST['mega_population'];
        $mega_image=$_FILES['mega_image']['name'];
        $mega_image_temp_name=$_FILES['mega_image']['tmp_name'];
        $mega_image_folder='images/'.$mega_image;
        
        $insert_query=mysqli_query($conn,"insert into `events` (name, summary, veg, nonveg, features, price, population, image, type) values
        ('$mega_name','$mega_summary','$mega_veg','$mega_nonveg','$mega_feature','$mega_price','$mega_population','$mega_image', 'mega')") or die("Insert query failed");
        if($insert_query){
            move_uploaded_file($mega_image_temp_name,$mega_image_folder);
            $display_message= "Mega-EVent package inserted Successfully";
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

<!-- form section where admin add the mega package -->
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
        <h3 class="heading">Add Mega-Event Package</h3>
        <form action="" class="add_mega" method="post" enctype="multipart/form-data">
            <input type="text" name="mega_name"  placeholder="Enter the name" class="input_fields required"><br/>
            <input type="text" name="mega_summary"  placeholder="Summary" class="input_fields required"><br/>
            <label>Facilities:</label>
            <input type="text" name="mega_veg"  placeholder="Veg" class="input_fields required"><br/>
            <input type="text" name="mega_nonveg"  placeholder="Non-Veg" class="input_fields required"><br/>
            <label >Additional Wedding Features:</label>
            <input type="text" name="mega_feature"  placeholder="Additional Feature" class="input_fields required"><br/>
            <input type="number" name="mega_price" min="0" placeholder="Price" class="input_fields required"><br/>
            <input type="number" name="mega_population" min="0" placeholder="Population" class="input_fields required"><br/>
            <input type="file" name="mega_image" class="input_fields" required accept="image/png, image/jpg, image/jpeg"><br/>
            <input type="submit" name="add_mega" class="submit_btn" value="Add Mega-Event"><br/>
            <a class="cancel_btn" href="eventPackage.php">Cancel</a>

        </form>
    </section>

</div>



</body>
</html>


