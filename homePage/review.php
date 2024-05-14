

<!-- sideBar -->
<?php include 'sidebar.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>

    <link rel="stylesheet" href="review.css">

    <!-- css -->
    <link rel="stylesheet" href="style.css">

    <!-- icon -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    
    <section class="section-container">
        <div class="section_content">
            <div class="text">
                <h3>Reviews</h3>
                <p>Share your experience and let others know about your it.
                    <br/><span><button>
                    <?php
                            if(isset($_SESSION["userId"])){
                            echo '<a href="review-form.php" class="post-button">POST</a>';

                            }else{
                            echo '<a href="../loginPage/login.html" target="_blank" class="post-button">POST</a>';

                            }
                            ?>
                </button></span></p>
            </div>

            
        <!-- including php logic-connecting to database -->
        <?php include '../loginPage/db.php'?>

                <?php
                    $select_review=mysqli_query($conn,"SELECT r.id, r.message, r.image, u.firstname, u.lastname FROM review r LEFT JOIN users u ON r.user_id=u.id;");
                    if(mysqli_num_rows($select_review)>0){
                    while($fetch_review=mysqli_fetch_assoc($select_review)){

                ?>
<!--------------------- container------------------ -->
            <div class="review-box-container">

            <?php include '../loginPage/db.php';?>

                    <!-- unit boxes -->
                    <div class="box">
                        <div class="box-top">

                            <div class="profile">
                                <i class='bx bxs-user-circle' ></i>
                                <div class="user-name">
                                    <strong><?php echo $fetch_review['firstname']." ".$fetch_review['lastname'] ?></strong>
                                </div>
                            </div>

                            <div class="edit-btn">
                            <a href="delete.php?delete=<?php echo $fetch_review['id']?>"
                                class="delete_btn" onclick="return confirm('Are you sure you want to delete this review?');">
                            <i class='bx bxs-trash-alt'></i></a>
                                <!-- <i class='bx bx-dots-vertical-rounded'></i> -->
                            </div>

                        </div>
                        
                        <div class="images-container">
                            <div class="images">
                            <img src="reimages/<?php echo $fetch_review['image']?>" alt="image">
                            </div>
                        </div>

                        <div class="reviews">
                            <p><?php echo $fetch_review['message']?></p>
                        </div>

            </div>
                <?php
                }
                }else{
                echo "<div class='empty_text'>No Review</div>";
                }
                ?>

    </section>

</body>
</html>