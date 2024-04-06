<!-- sideBar -->
<?php include 'sideBar.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Happening</title>

    <link rel="stylesheet" href="eventhappen.css">

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
                <h3>Event Happening</h3>
                <p>Upcoming events!</p>
            </div>



        <!-- ---------connecting------------- -->
        <?php include '../adminPanel/connect.php';?>
            

            <div class="image-container">
          <?php
          $select_event=mysqli_query($conn,"Select *from `eventhappen`");
          if(mysqli_num_rows($select_event)>0){
          while($fetch_event=mysqli_fetch_assoc($select_event)){

          ?>
            <div class="box">
                <img src="../adminPanel/images/<?php echo $fetch_event['image']?>" alt="event">
                <div class="content">
                    <h3><?php echo $fetch_event['name']?></h3>
                </div>

            </div>
          <?php
          }
          }else{
            echo "<div class='empty_text'>No Event Available</div>";
          }
          ?>
        </div>
    
    <!-- footer -->
    <?php include 'footer.php'?>


        </div>
    </section>

</body>
</html>