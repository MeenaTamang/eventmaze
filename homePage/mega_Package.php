<!-- sideBar -->
<?php include 'sideBar.php'?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Package</title>

    <!-- css for section container  -->
    <link rel="stylesheet" href="css/section-container.css">

    <!-- css for nav_bar -->
    <link rel="stylesheet" href="style.css">

    <!-- css for wedding design inside container-->
    <link rel="stylesheet" href="css/wed_Package.css">

    <!-- css for wedding design inside container, responsive-->
    <link rel="stylesheet" href="css/wed_responsive.css">


    <!-- icon -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



</head>
<body>
    
    <section class="section-container">
        <div class="section_content">
            <div class="text">
                <h3>Plan a Mega Event</h3>
                <h2>Event Maze Mega Event Planner</h2>
                <p class="paragraph1">We think & explore creative ideas in order to make your events more happening. 
                    The events can be organized in both residential or non-residential fashion for corporate houses,
                    organizations or private groups.
                    </br></br>Hire Us as your event planner and outsource your worries to us; because we care about your happiness.</p>
            </div>

            <div class="row">
                <div class="imgwrapper">
                    <img src="images/mega1.jpeg" alt="Mega-Event">
                </div>
                <div class="contentWrapper">
                    <div class="content">
                        <span class="textWrapper">
                            <span>MEGA EVENT MANAGEMENT</span>
                        </span>
                        <!-- <p class="paragraph2">Ceremony (NPR. 5 lakhs to NPR 10 Lakh)</p> -->
                        <p class="paragraph3">
                        Mega Events are a very large scale events with huge crowd & can be organized during any occasions with flexible pricing, 
                        venue and guests. These events are eligible for sponsorships and features Master of Ceremony.
                            <p class="paragraph2">Event Types</p>
                            <p class="paragraph3">
                                    1.New Year Party
                                    <br/>2.Trade Shows
                                    <br/>3.Concerts
                                    <br/>4.Dance Party
                                    <br/>5.Huge Parties
                            <p class="paragraph2">Venue Setup Techniques</p>
                            <p class="paragraph3">
                                    1.Round Table
                                    <br/>2.U-Setup
                                    <br/>3.Theatre Style Setup
                                    <br/>4.Custom Setups</p>
                            <p class="paragraph2">Event Features</p>
                            <p class="paragraph3">
                                    1.Audio/Video
                                <br/>2.Photography
                                <br/>3.Decorations & Designs
                                <br/>4.Customizable Food & Drinks
                                <br/>5.Residential Hote</p>
                            <p class="paragraph3">The pricing varies depending on the requirements and budget.</p>
                            <a href="#corpackage"><button class="view-btn">view package</i></button></a>
                    </div>
                </div>
            </div>

            <!-- -------Heading of package-container------ -->
            <div id="corpackage" class="package-heading">
                <div class="package-text">
                <h2>Regular-Event</h2>
                <h3>Regular Event Package</h3>
                </div>
            </div>


<!------- -----------------connecting------------------ -->
    <?php include '../adminPanel/connect.php';?>


            <!-- -------Package-container------ -->
            <div class="package-container">
                <?php
                $select_mega=mysqli_query($conn,"Select *from `mega`");
                if(mysqli_num_rows($select_mega)>0){
                while($fetch_mega=mysqli_fetch_assoc($select_mega)){

                ?>

            <div class="package">
                    <div class="package-header">
                    <img src="../adminPanel/images/<?php echo $fetch_mega['image']?>" alt="image">
                    </div>
                    <div class="package-body">
                    <h3><?php echo $fetch_mega['name']?></h1>
                    <p class="paragraph2">SUMMARY</p>
                        <p class="paragraph3"><?php echo $fetch_mega['summary']?></p>
                        <p class="paragraph2">TERMS & FACILITIES</p>
                        <p class="paragraph3">
                        Food:
                        </br>Veg: <?php echo $fetch_mega['veg']?>
                        </br>Non-Veg:<?php echo $fetch_mega['nonveg']?>
                        </p>
                        <p class="paragraph2">Additional Features</p>
                        <p class="paragraph3"><?php echo $fetch_mega['features']?></p>
                        <p class="paragraph2">Starting From</p>
                        <p class="paragraph3">Rs.<?php echo $fetch_mega['price']?></p>
                        <p class="paragraph2">Population Range</p>
                        <p class="paragraph3"><?php echo $fetch_mega['population']?></p>
                    </div>
                    <div class="package-footer">
                    <button>
                            <?php
                            if(isset($_SESSION["userId"])){
                            echo '<a href="calender.php" class="package-button">Book Now</a>';

                            }else{
                            echo '<a href="../loginPage/login.html" target="_blank" class="package-button">Book Now</a>';

                            }
                            ?>
                        </button>
                    </div>
                </div>
                <?php
                    }
                    }else{
                    echo "<div class='empty_text'>No Mega-Event Package Available</div>";
                    }
                    ?>
            </div>

            
            <!-- footer -->
            <?php include 'footer.php'?>
        </div>
    </section>

</body>
</html>