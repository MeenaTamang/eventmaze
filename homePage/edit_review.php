
<!-- sideBar -->
<?php include 'sidebar.php'?>

<!-- !-- including php logic-connecting to database -->
<?php include '../loginPage/db.php';


// update logic
if(isset($_POST['update_review'])){
    $update_review_id=$_POST['update_review_id'];
    // echo $update_wed_id;
    $update_review_message=$_POST['update_review_message'];
    $update_review_image=$_FILES['update_review_image']['name'];
    $update_review_image_tmp_name=$_FILES['update_review_image']['tmp_name'];
    $update_review_image_folder='images/'.$update_review_image;

    // update query
    $update_review=mysqli_query($conn, "Update `review` set
    message='$update_review_message',
    image='$update_review_image' where id=$update_review_id");
    if($update_review){
        move_uploaded_file($update_review_image_tmp_name,
        $update_review_image_folder);
        header('location:review.php');
    }else{
        $display_message= "There is some error updating the Review";
    }


}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Review</title>

    <!-- css file -->
    <link rel="stylesheet" href="style.css">

    <!-- css file -->
    <link rel="stylesheet" href="edit_review.css">




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
                $edit_query=mysqli_query($conn, "Select * from `review` where id=$edit_id");
                if(mysqli_num_rows($edit_query)>0){
                    $fetch_review=mysqli_fetch_assoc($edit_query);
                        // $row=$fetch_data['price'];
                        // echo $row;
                    ?>
        <!---------- form -------->
        <form action="" method="post" enctype="multipart/form-data" class="update_event event_container_box">
                <img src="images/<?php echo $fetch_review['image']?>" alt="">
                <input type="hidden" value="<?php echo $fetch_review['id']?>" name="update_review_id">
                <input type="text" class="input_fields required" value="<?php echo $fetch_review['message']?>" name="update_review_message">
                <br/><br/>
                <input type="file" class="input_fields" required accept="image/png, image/jpg, image/jpeg" name="update_review_image">
                <br/><br/>
                <div class="btns">
                    <input type="submit" class="edit_btn" value="Update review" name="update_review">
                    <a class="cancel_btn" href="review.php">Cancel</a>
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