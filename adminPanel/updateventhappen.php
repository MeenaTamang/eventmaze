<!-- nav_Bar -->
<?php include 'nav_bar.php'?>

<!-- including php logic-connecting to database -->
<?php include '../loginPage/db.php'?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Package</title>

    <!--nav-bar css file -->
    <link rel="stylesheet" href="style.css">

    <!-- view-event css file -->
    <link rel="stylesheet" href="plannerCSS/view-event.css">



    <!-- icon -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    

</head>
<body>

    <section class="section-container">
        <div class="section_content">

            <section class="display_event">
            
<!------- php code to get the inserted mega from database ------------>
                <?php
                $display_event=mysqli_query($conn,"Select *from `eventhappen`");
                $num=1;
                if(mysqli_num_rows($display_event)>0){
                    echo "<table>
                            <thead>
                            <th>S.No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Action</th>
                            </thead>
                            <tbody>";
                            
                    // logics to fetch data from database to the mega table
                    while($row=mysqli_fetch_assoc($display_event)){
                    
                ?>

                <!-- ----------display table--------- -->
                <tr>
                        <td><?php echo $num?></td>
                        <td><img src="images/<?php echo $row['image'] ?>" alt="<?php echo $row['name']?>"></td>
                        <td><?php echo $row['name']?></td>
                        <td>
                            <a href="delete/delete_event.php?delete=<?php echo $row['id']?>"
                            class="delete_event_btn" onclick="return confirm('Are you sure you want to delete this Event?');">
                            <i class='bx bxs-trash-alt'></i></a>
                            <a href="edit_eventhappen.php?edit=<?php echo $row['id']?>"
                            class="update_event_btn">
                            <i class='bx bxs-edit'></i></a>
                        </td>
                    </tr>

                    <?php
                    $num++;
                        }
                    }else{
                        echo "<div class='empty_text'>No Event Happening Post Available</div>";
                    }
                    ?>
                    
                </tbody>
            </table>
            </section>

        </div>
    </section>

</body>
</html>