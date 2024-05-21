<?php session_start(); ?>

<link rel="icon" type="image/png" href="cemlogo.png">

<div class="sidebar active">
    <div class="logo_container">
        <div class="logo">
            <img src="logo.png" alt="logo">
        </div>

        <div class="logo_content">
            <span class="name">Event Maze</span>
            <span class="slogan">Empowering Virtual Experience</span>
        </div>
    </div>

    <!---------------- user details section  -------------------------->

    <?php include '../loginPage/db.php';?>

        <div class="profile_container">
            <div class="profile">
                <i class='bx bxs-user-circle icon'></i>
                <div class="profile_details">
                    <ul>
                        <span class="username">Admin</span>
                        <!-- <span class="email">admin@gmail.com</span> -->
                    </ul>
                
                </div>
            </div>
        </div>


    <!-- sidebar details section -->
    <ul class="nav_list">
    
        <li>
            <a href="eventPackage.php">
                <i class='bx bxs-bank icon'></i>
                <span class="venue">Event Package</span>
            </a>
        </li>
        <li>
            <a href="viewPackage.php">
                <i class='bx bx-shopping-bag'></i>
                <span class="reserved">View Event Package</span>
            </a>
        </li>
        <li>
            <a href="addEvent.php">
                <i class='bx bx-party icon'></i>
                <span class="entertainment">Add Event Happening</span>
            </a>
        </li>
        <li>
            <a href="updateventhappen.php">
                <i class='bx bx-shopping-bag'></i>
                <span class="reserved">Update Event Happening</span>
            </a>
        </li>
        <li>
            <a href="booking.php">
            <i class='bx bx-detail' ></i>
            <span class="reserved">Booking Details</span>
            </a>
        </li>
        <li>
            <a href="userdetail.php">
            <i class='bx bx-detail' ></i>
            <span class="reserved">Users Detail</span>
            </a>
        </li>
    </ul>

    <!-- bottom section  -->
    <div class="bottom_container">
        <li class="logout_content">
            <a href="logout.php">
                <i class='bx bx-log-out icon'></i>
                <span class="logout">Logout</span>
            </a>
        </li>

    </div>

</div>
