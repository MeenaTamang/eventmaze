<!-- nav_Bar -->
<?php include 'nav_bar.php'?>

<?php include 'connect.php';
    if(isset($_POST['add_corporate'])){
        $corporate_name=$_POST['corporate_name'];
        $corporate_summary=$_POST['corporate_summary'];
        $corporate_veg=$_POST['corporate_veg'];
        $corporate_nonveg=$_POST['corporate_nonveg'];
        $corporate_feature=$_POST['corporate_feature'];
        $corporate_price=$_POST['corporate_price'];
        $corporate_population=$_POST['corporate_population'];
        $corporate_image=$_FILES['corporate_image']['name'];
        $corporate_image_temp_name=$_FILES['corporate_image']['tmp_name'];
        $corporate_image_folder='images/'.$corporate_image;
        
        $insert_query=mysqli_query($conn,"insert into `corporate` (name, summary, veg, nonveg, features, price, population, image) values
        ('$corporate_name','$corporate_summary','$corporate_veg','$corporate_nonveg','$corporate_feature','$corporate_price','$corporate_population','$corporate_image')") or die("Insert query failed");
        if($insert_query){
            move_uploaded_file($corporate_image_temp_name,$corporate_image_folder);
            $display_message= "corporate event package inserted Successfully";
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
        <h3 class="heading">Add Corporate-Event Package</h3>
        <form action="" class="add_corporate" method="post" enctype="multipart/form-data">
            <input type="text" name="corporate_name"  placeholder="Enter the name" class="input_fields required"><br/>
            <input type="text" name="corporate_summary"  placeholder="Summary" class="input_fields required"><br/>
            <label>Facilities:</label>
            <input type="text" name="corporate_veg"  placeholder="Veg" class="input_fields required"><br/>
            <input type="text" name="corporate_nonveg"  placeholder="Non-Veg" class="input_fields required"><br/>
            <label >Additional Wedding Features:</label>
            <input type="text" name="corporate_feature"  placeholder="Additional Feature" class="input_fields required"><br/>
            <input type="number" name="corporate_price" min="0" placeholder="Price" class="input_fields required"><br/>
            <input type="number" name="corporate_population" min="0" placeholder="Population" class="input_fields required"><br/>
            <input type="file" name="corporate_image" class="input_fields" required accept="image/png, image/jpg, image/jpeg"><br/>
            <input type="submit" name="add_corporate" class="submit_btn" value="Add corporate event"><br/>
            <a class="cancel_btn" href="eventPackage.php">Cancel</a>

        </form>
    </section>

</div>



</body>
</html>


