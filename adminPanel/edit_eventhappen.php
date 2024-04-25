<!-- nav_Bar -->
<?php include 'nav_bar.php'?>

<!-- !-- including php logic-connecting to database -->
<?php include '../loginPage/db.php';


// update logic
if(isset($_POST['update_event'])){
    $update_event_id=$_POST['update_event_id'];
    // echo $update_wed_id;
    $update_event_name=$_POST['update_event_name'];
    $update_event_image=$_FILES['update_event_image']['name'];
    $update_event_image_tmp_name=$_FILES['update_event_image']['tmp_name'];
    $update_event_image_folder='images/'.$update_event_image;

    // update query
    $update_event=mysqli_query($conn, "Update `eventhappen` set
    name='$update_event_name',
    image='$update_event_image' where id=$update_event_id");
    if($update_event){
        move_uploaded_file($update_event_image_tmp_name,
        $update_event_image_folder);
        header('location:updateventhappen.php');
    }else{
        $display_message= "There is some error updating the Event";
    }


}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>

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
                $edit_query=mysqli_query($conn, "Select * from `eventhappen` where id=$edit_id");
                if(mysqli_num_rows($edit_query)>0){
                    $fetch_data=mysqli_fetch_assoc($edit_query);
                        // $row=$fetch_data['price'];
                        // echo $row;
                    ?>
        <!---------- form -------->
        <form action="" method="post" enctype="multipart/form-data" class="update_event event_container_box">
                <img src="images/<?php echo $fetch_data['image']?>" alt="">
                <input type="hidden" value="<?php echo $fetch_data['id']?>" name="update_event_id">
                <input type="text" class="input_fields required" value="<?php echo $fetch_data['name']?>" name="update_event_name">
                <br/><br/>
                <input type="file" class="input_fields" required accept="image/png, image/jpg, image/jpeg" name="update_event_image">
                <br/><br/>
                <div class="btns">
                    <input type="submit" class="edit_btn" value="Update event" name="update_event">
                    <a class="cancel_btn" href="updateventhappen.php">Cancel</a>
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