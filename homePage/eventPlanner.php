<!-- sideBar -->
<?php 
include 'sideBar.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planner</title>

    <link rel="stylesheet" href="eventplanner.css">
    
    <!-- css -->
    <link rel="stylesheet" href="style.css">

    
    <!-- icon -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>
<body>
    
    <section class="section-container">
        <div class="section_content">
            <!-- --header--- -->
            <div class="text">
                <h3>Event Planner</h3>
                <p>Personalized selection of Event Planner.</p>
            </div>

            <!-- images -->
            <div class="card-container">
                <div class="card">
                    <img src="wedding.jpeg" class="card-img" alt="wedding">
                    <div class="card-body">
                        <h1 class="card-title">Wedding</h1>
                        <p class="card-sub-title">Wedding Package</p>
                        <p class="card-info">.Personalized selection of event packages.</p>

                        <a href="wed_Package.php"><button class="card-btn"><i class='bx bx-right-arrow-alt'></i></button></a>
                    </div>
                </div>

                <div class="card">
                    <img src="Corporate.jpeg" class="card-img" alt="wedding">
                    <div class="card-body">
                        <h1 class="card-title">Corporate Event</h1>
                        <p class="card-sub-title">Corporate Event & Exhibition Package</p>
                        <p class="card-info">Lorem ipsum dolor sit amet consectetu
                            r adipisicing elit. Ut.</p>

                        <a href="corp_Package.php"><button class="card-btn"><i class='bx bx-right-arrow-alt'></i></button></a>
                    </div>
                </div>


                <div class="card">
                    <img src="regular1.jpeg" class="card-img" alt="wedding">
                    <div class="card-body">
                        <h1 class="card-title">Regular Event</h1>
                        <p class="card-sub-title">Regular Event Package</p>
                        <p class="card-info">Lorem ipsum dolor sit amet consectetu
                            r adipisicing elit. Ut.</p>

                        <a href="reg_Package.php"><button class="card-btn"><i class='bx bx-right-arrow-alt'></i></button></a>
                    </div>
                </div>

                <div class="card">
                    <img src="concert.jpeg" class="card-img" alt="wedding">
                    <div class="card-body">
                        <h1 class="card-title">Mega Event </h1>
                        <p class="card-sub-title">Concert & Live Music</p>
                        <p class="card-info">Lorem ipsum dolor sit amet consectetu
                            r adipisicing elit. Ut.</p>

                        <a href="mega_Package.php"><button class="card-btn"><i class='bx bx-right-arrow-alt'></i></button></a>
                    </div>
                </div>

            </div>

        <!-- footer -->
<?php include 'footer.php'?>

        </div>
    </section>

</body>
</html>

