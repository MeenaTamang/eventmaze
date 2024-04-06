<!-- sideBar -->
<?php include 'sidebar.php';

    include '../loginPage/db.php';
    $user_id = $_SESSION["userId"];

    if(isset($_POST['add_review'])){
        $uploadBtn=$_FILES['uploadBtn']['name'];
        $uploadBtn_temp_name=$_FILES['uploadBtn']['tmp_name'];
        $uploadBtn_folder='reimages/'.$uploadBtn;
        $review_message=$_POST['review_message'];
        
        $insert_query=mysqli_query($conn,"insert into `review` (image, message, user_id) values
        ('$uploadBtn', '$review_message', '$user_id')") or die("Insert query failed");
        if($insert_query){
            move_uploaded_file($uploadBtn_temp_name,$uploadBtn_folder);
            $display_message= "Your review uploaded";
        }else{
            $display_message= "There is some error uploading your review";
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Form</title>

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="review-form.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    

</head>
<body>
    <section class="section-container">

    <!-- message display-->
    <?php
    if(isset($display_message)){
    echo "<div class='display_message'>
    <span>$display_message</span>
    <i class='bx bx-x' onclick='this.parentElement.style.display=`none`';></i>
    </div>";
    }
    ?>

    <div class="wrapper">



    <form action="" class="add_review" method="post" enctype="multipart/form-data">
        <div class="text">
            <h3>Review</h3>
        </div>

        <input type="file" name="uploadBtn" id="uploadBtn" class="input_fields" required accept="image/png, image/jpg, image/jpeg"><br/>
        <!-- <input type="file" id="uploadBtn"> -->
        <label for="uploadBtn">Upload File
            <i class='bx bx-image-add'></i>
        </label>
        
        <br/>
        <!-- <input type="text" name="review_message"  placeholder="Your review.." class="input_review"><br/> -->

        <textarea name="review_message" cols="30" rows="15" placeholder="Your review..."></textarea>
        <div class="btn-group">
            <button type="submit" name="add_review" class="btn submit">Submit</button>
            <a class="btn cancel" href="review.php">Cancel</a>
        </div>

    </form>
    </div>
    </section>

</body>
</html>