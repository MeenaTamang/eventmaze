<!-- sideBar -->
<?php
    // session_start();
    include 'sideBar.php'?>


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
                <h3>Plan a wedding</h3>
                <h2>Event Maze Wedding Planner</h2>
                <p class="paragraph1">Your big wedding day is near and you are worried about guests, food, decorations and so many big and 
                    small details that will eventually make your day perfect. We will keep your worries at bay by managing 
                    everything that goes into your event and lets you do what is more important - be with your friends and family on your big day.
                    </br></br>Hire Us as your wedding planner and outsource your worries to us; because we care about your happiness.</p>
            </div>

            <div class="row">
                <div class="imgwrapper">
                    <img src="images/wed1.jpeg" alt="wedding">
                </div>
                <div class="contentWrapper">
                    <div class="content">
                        <span class="textWrapper">
                            <span>Our Proposal</span>
                        </span>
                        <p class="paragraph2">Ceremony (NPR. 5 lakhs to NPR 10 Lakh)</p>
                        <p class="paragraph3">
                            </br>Engagement
                            </br>Haldi
                            </br>Mehendi
                            <p class="paragraph3">The packages shall include decoration (inclusive of floral decor and light), Mehandi (Henna) artist, dancers and team of musician with female singers, sounds and lights, anchor with creative concept & live bangle garden.</p>
                            <p class="paragraph2">Party (NPR. 8 Lakh to NPR 15 Lakh)</p>
                            <p class="paragraph3">Cocktail & Bachelor's Party : The packages shall include a lounge for 100 people within house DJ, games, live music etc. The costing varies depending upon venue while the drinks and the entire party is customizable based upon your needs.</p>
                            <p class="paragraph2">Full Wedding (NPR. 50 Lakh to 10M)</p>
                            <p class="paragraph3"> In today’s scenario full wedding includes events and rituals, Mehendi, Sangeet, Haldi and Wedding. Some packages includes everything starting from pick up from the airport to the hotel and post wedding drop to the airport with complete endurance of the grand wedding.</p>
                            <p class="paragraph3">The pricing varies depending on the requirements and budget.</p>
                            <a href="#wedpackage"><button class="view-btn">view package</i></button></a>
                    </div>
                </div>
            </div>

            <!-- -------Heading of package-container------ -->
            <div id="wedpackage" class="package-heading">
                <div class="package-text">
                <h2>Wedding</h2>
                <h3>Planning Package</h3>
                </div>
            </div>


<!------- -----------------connecting------------------ -->
    <?php include '../adminPanel/connect.php';?>

            <!-- -------Package-container------ -->
            <div class="package-container">
                <?php
                $select_wed=mysqli_query($conn,"Select *from `wed`");
                if(mysqli_num_rows($select_wed)>0){
                while($fetch_wed=mysqli_fetch_assoc($select_wed)){

                ?>

                <div class="package">
                    <div class="package-header">
                        <img src="../adminPanel/images/<?php echo $fetch_wed['image']?>" alt="image">
                    </div>
                    <div class="package-body">
                        <h3><?php echo $fetch_wed['name']?></h1>
                        <p class="paragraph2">SUMMARY</p>
                        <p class="paragraph3"><?php echo $fetch_wed['summary']?></p>
                        <p class="paragraph2">TERMS & FACILITIES</p>
                        <p class="paragraph3">
                        Food:
                        </br>Veg: <?php echo $fetch_wed['veg']?>
                        </br>Non-Veg:<?php echo $fetch_wed['nonveg']?>
                        </p>
                        <p class="paragraph2">Additional Features</p>
                        <p class="paragraph3"><?php echo $fetch_wed['features']?></p>
                        <p class="paragraph2">Starting From</p>
                        <p class="paragraph3">Rs.<?php echo $fetch_wed['price']?></p>
                        <p class="paragraph2">Population Range</p>
                        <p class="paragraph3"><?php echo $fetch_wed['population']?></p>
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
                    echo "<div class='empty_text'>No Wedding Package Available</div>";
                    }
                    ?>
            </div>

        <!-- footer -->
        <?php include 'footer.php'?>

        </div>
    </section>

</body>
</html>