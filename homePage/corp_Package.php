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
                <h3>Plan a event</h3>
                <h2>Event Maze Corporate Event Planner</h2>
                <p class="paragraph1">We think & explore creative ideas in order to make your events more happening. 
                    The events can be organized in both residential or non-residential fashion for corporate houses,
                    organizations or private groups.
                    </br></br>Hire Us as your event planner and outsource your worries to us; because we care about your happiness.</p>
            </div>

            <div class="row">
                <div class="imgwrapper">
                    <img src="images/corp1.jpeg" alt="corporate event">
                </div>
                <div class="contentWrapper">
                    <div class="content">
                        <span class="textWrapper">
                            <span>CORPORATE EVENT MANAGEMENT</span>
                        </span>
                        <!-- <p class="paragraph2">Ceremony (NPR. 5 lakhs to NPR 10 Lakh)</p> -->
                        <p class="paragraph3">
                            Corporate Events are flexible and best suited for Big, Medium or Small Scale 
                            Companies and can be organized in residential or non-residential fashion.
                            <!-- <p class="paragraph3">The packages shall include decoration (inclusive of floral decor and light), Mehandi (Henna) artist, dancers and team of musician with female singers, sounds and lights, anchor with creative concept & live bangle garden.</p> -->
                            <p class="paragraph2">Event Types</p>
                            <p class="paragraph3">
                                    1.Cocktail Party
                                <br/>2.Business Get Together
                                <br/>3.Seminar
                                <br/>4.Exhibition
                                <br/>5.Conference</p>
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
                <h2>Corporate-Event</h2>
                <h3>Corporate Event Package</h3>
                </div>
            </div>


<!------- -----------------connecting------------------ -->
    <?php include '../loginPage/db.php';?>


            <!-- -------Package-container------ -->
            <div class="package-container">
            <?php
                $select_corporate=mysqli_query($conn,"Select *from `events` where type='corporate'");
                if(mysqli_num_rows($select_corporate)>0){
                while($fetch_corporate=mysqli_fetch_assoc($select_corporate)){
                    $eventID=$fetch_corporate["id"];
                ?>

            <div class="package">
                    <div class="package-header">
                        <img src="../adminPanel/images/<?php echo $fetch_corporate['image']?>" alt="image">
                    </div>
                    <div class="package-body">
                    <h3><?php echo $fetch_corporate['name']?></h1>
                        <p class="paragraph2">SUMMARY</p>
                        <p class="paragraph3"><?php echo $fetch_corporate['summary']?></p>
                        <p class="paragraph2">TERMS & FACILITIES</p>
                        <p class="paragraph3">
                        Food:
                        </br>Veg: <?php echo $fetch_corporate['veg']?>
                        </br>Non-Veg:<?php echo $fetch_corporate['nonveg']?>
                        </p>
                        <p class="paragraph2">Additional Features</p>
                        <p class="paragraph3"><?php echo $fetch_corporate['features']?></p>
                        <p class="paragraph2">Starting From</p>
                        <p class="paragraph3">Rs.<?php echo $fetch_corporate['price']?></p>
                        <p class="paragraph2">Population Range</p>
                        <p class="paragraph3"><?php echo $fetch_corporate['population']?></p>
                    </div>
                    <div class="package-footer">
                    <button>
                            <?php
                            if(isset($_SESSION["userId"])){
                            echo '<a href="selectEvent.php?id='.$eventID.'" class="package-button">Book Now</a>';

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
                    echo "<div class='empty_text'>No Corporate Event Package Available</div>";
                    }
                    ?>
            </div>

        <!-- footer -->
        <?php include 'footer.php'?>

        </div>
    </section>

</body>
</html>