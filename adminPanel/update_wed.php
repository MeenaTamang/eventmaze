<!-- nav_Bar -->
<?php include 'nav_bar.php'?>

<!-- !-- including php logic-connecting to database -->
<?php include '../loginPage/db.php';


// update logic
if(isset($_POST['update_wed'])){
    $update_wed_id=$_POST['update_wed_id'];
    // echo $update_wed_id;
    $update_wed_name=$_POST['update_wed_name'];
    // echo $update_wed_name;
    $update_wed_summary=$_POST['update_wed_summary'];
    $update_wed_veg=$_POST['update_wed_veg'];
    $update_wed_nonveg=$_POST['update_wed_nonveg'];
    $update_wed_price=$_POST['update_wed_price'];
    $update_wed_population=$_POST['update_wed_population'];
    $update_wed_image=$_FILES['update_wed_image']['name'];
    $update_wed_image_tmp_name=$_FILES['update_wed_image']['tmp_name'];
    $update_wed_image_folder='images/'.$update_wed_image;

    // update query
    $update_wed=mysqli_query($conn, "Update `events` set
    name='$update_wed_name',summary='$update_wed_summary',veg='$update_wed_veg',nonveg='$update_wed_nonveg',price='$update_wed_price',population='$update_wed_population',
    image='$update_wed_image' where id=$update_wed_id");
    if($update_wed){
        move_uploaded_file($update_wed_image_tmp_name,
        $update_wed_image_folder);
        header('location:view_wed.php');
    }else{
        $display_message= "There is some error updating the Wedding package";
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
        <form action="" method="post" enctype="multipart/form-data" class="update_wed wed_container_box">
                <img src="images/<?php echo $fetch_data['image']?>" alt="">
                <input type="hidden" value="<?php echo $fetch_data['id']?>" name="update_wed_id">
                <input type="text" class="input_fields required" value="<?php echo $fetch_data['name']?>" name="update_wed_name">
                <br/><br/>
                <input type="text" class="input_fields required" value="<?php echo $fetch_data['summary']?>" name="update_wed_summary">
                <br/><br/>
                <input type="text" class="input_fields required" value="<?php echo $fetch_data['veg']?>" name="update_wed_veg">
                <br/><br/>
                <input type="text" class="input_fields required" value="<?php echo $fetch_data['nonveg']?>" name="update_wed_nonveg">
                <br/><br/>
                <input type="text" class="input_fields required" value="<?php echo $fetch_data['features']?>" name="update_wed_feature">
                <br/><br/>
                <input type="number" class="input_fields required" value="<?php echo $fetch_data['price']?>" name="update_wed_price">
                <br/><br/>
                <input type="number" class="input_fields required" value="<?php echo $fetch_data['population']?>" name="update_wed_population">
                <br/><br/>
                <input type="file" class="input_fields" required accept="image/png, image/jpg, image/jpeg" name="update_wed_image">
                <br/><br/>
                <div class="btns">
                    <input type="submit" class="edit_btn" value="Update wed" name="update_wed">
                    <a class="cancel_btn" href="view_wed.php">Cancel</a>
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