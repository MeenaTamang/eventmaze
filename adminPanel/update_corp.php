<!-- nav_Bar -->
<?php include 'nav_bar.php'?>

<!-- !-- including php logic-connecting to database -->
<?php include '../loginPage/db.php';


// update logic
if(isset($_POST['update_corporate'])){
    $update_corporate_id=$_POST['update_corporate_id'];
    // echo $update_wed_id;
    $update_corporate_name=$_POST['update_corporate_name'];
    // echo $update_wed_name;
    $update_corporate_summary=$_POST['update_corporate_summary'];
    $update_corporate_veg=$_POST['update_corporate_veg'];
    $update_corporate_nonveg=$_POST['update_corporate_nonveg'];
    $update_corporate_price=$_POST['update_corporate_price'];
    $update_corporate_population=$_POST['update_corporate_population'];
    $update_corporate_image=$_FILES['update_corporate_image']['name'];
    $update_corporate_image_tmp_name=$_FILES['update_corporate_image']['tmp_name'];
    $update_corporate_image_folder='images/'.$update_corporate_image;

    // update query
    $update_corporate=mysqli_query($conn, "Update `events` set
    name='$update_corporate_name',summary='$update_corporate_summary',veg='$update_corporate_veg',nonveg='$update_corporate_nonveg',price='$update_corporate_price',population='$update_corporate_population',
    image='$update_corporate_image' where id=$update_corporate_id");
    if($update_corporate){
        move_uploaded_file($update_corporate_image_tmp_name,
        $update_corporate_image_folder);
        header('location:view_corp.php');
    }else{
        $display_message= "There is some error updating the Corporate Event package";
    }


}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Package</title>

    <!-- css file -->
    <link rel="stylesheet" href="style.css">

    <!-- css file -->
    <link rel="stylesheet" href="plannerCSS/update-event.css">

    <!-- view_wed css file -->
    <link rel="stylesheet" href="plannerCSS/view-event.css">



    <!-- icon -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

    <!-- message display-->
    <?php
    if(isset($display_message)){
    echo "<div class='display_message'>
    <span>$display_message</span>
    <i class='bx bx-x' onclick='this.parentElement.style.display=`none`';></i>
    </div>";
    }
    ?>

<section class="section-container">
    <div class="section_content">


        <section class="edit_container">
            <!-- ------php code------- -->
            <?php
            
            if(isset($_GET['edit'])){
                $edit_id=$_GET['edit'];
                // echo $edit_id;
                $edit_query=mysqli_query($conn, "Select * from `events` where id=$edit_id");
                if(mysqli_num_rows($edit_query)>0){
                    $fetch_data=mysqli_fetch_assoc($edit_query);
                        // $row=$fetch_data['price'];
                        // echo $row;
                    ?>
        <!---------- form -------->
        <form action="" method="post" enctype="multipart/form-data" class="update_corporate corporate_container_box">
                <img src="images/<?php echo $fetch_data['image']?>" alt="">
                <input type="hidden" value="<?php echo $fetch_data['id']?>" name="update_corporate_id">
                <input type="text" class="input_fields required" value="<?php echo $fetch_data['name']?>" name="update_corporate_name">
                <br/><br/>
                <input type="text" class="input_fields required" value="<?php echo $fetch_data['summary']?>" name="update_corporate_summary">
                <br/><br/>
                <input type="text" class="input_fields required" value="<?php echo $fetch_data['veg']?>" name="update_corporate_veg">
                <br/><br/>
                <input type="text" class="input_fields required" value="<?php echo $fetch_data['nonveg']?>" name="update_corporate_nonveg">
                <br/><br/>
                <input type="text" class="input_fields required" value="<?php echo $fetch_data['features']?>" name="update_corporate_feature">
                <br/><br/>
                <input type="number" class="input_fields required" value="<?php echo $fetch_data['price']?>" name="update_corporate_price">
                <br/><br/>
                <input type="number" class="input_fields required" value="<?php echo $fetch_data['population']?>" name="update_corporate_population">
                <br/><br/>
                <input type="file" class="input_fields" required accept="image/png, image/jpg, image/jpeg" name="update_corporate_image">
                <br/><br/>
                <div class="btns">
                    <input type="submit" class="edit_btn" value="Update corporate" name="update_corporate">
                    <a class="cancel_btn" href="view_corp.php">Cancel</a>
                </div>
        </form>
            <?php
                }
            }
            
            ?>
        </section>
    </div>
</section>
    
</body>
</html>