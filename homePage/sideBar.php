    <?php
    session_start();
    ?>
    
    <link rel="icon" type="image/png" href="cemlogo.png">
    
    <div class="main">
        <div class="menu">
            <!-- <h2 id="logo">LOGO</h2> -->
            <img src="logo.png" class="logo"/>
            <a href="eventPlanner.php">Event Planner</a>
            <a href="eventHappen.php">Event Happening</a>
            <?php
            if(isset($_SESSION["userId"])){
                echo '<a href="booking.php">Booking Details</a>';
                
            }else{
                echo '<a href="../loginPage/login.html" target="_blank">Booking Details</a>';

            }
            ?>
            <a href="review.php">Review</a>

            <div class="bottom_container">
                <a href="logout.php">
                <i class='bx bx-log-out icon'></i>
                <span class="logout">Logout</span>
                </a>
            </div>

            <div class="media-icon">
                <ul>
                    <a href="#"><i class="bx bxl-facebook"></i></a>
                    <a href="#"><i class="bx bxl-twitter"></i></a>
                    <a href="#"><i class="bx bxl-instagram"></i></a>
                </ul>
            </div>
        </div>
    </div>
