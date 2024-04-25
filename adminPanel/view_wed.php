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

    <!-- view_wed css file -->
    <link rel="stylesheet" href="plannerCSS/view-event.css">



    <!-- icon -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    

</head>
<body>

    <section class="section-container">
        <div class="section_content">

            <section class="display_wed">
            
<!------- php code to get the inserted wed from database ------------>
                <?php
                $display_wed=mysqli_query($conn,"Select *from `events` where type='wedding'");
                $num=1;
                if(mysqli_num_rows($display_wed)>0){
                    echo "<table>
                            <thead>
                            <th>S.No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Summary</th>
                            <th>Food: Veg</th>
                            <th>Food: Non-veg</th>
                            <th>Features</th>
                            <th>Price</th>
                            <th>Population</th>
                            <th>Action</th>
                            </thead>
                            <tbody>";
                            
                    // logics to fetch data from database to the wed table
                    while($row=mysqli_fetch_assoc($display_wed)){
                    
                ?>

                <!-- ----------display table--------- -->
                <tr>
                        <td><?php echo $num?></td>
                        <td><img src="images/<?php echo $row['image'] ?>" alt="<?php echo $row['name']?>"></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['summary']?></td>
                        <td><?php echo $row['veg']?></td>
                        <td><?php echo $row['nonveg']?></td>
                        <td><?php echo $row['features']?></td>
                        <td><?php echo $row['price']?></td>
                        <td><?php echo $row['population']?></td>
                        <td>
                            <a href="delete/delete_package.php?delete=<?php echo $row['id']?>"
                            class="delete_wed_btn" onclick="return confirm('Are you sure you want to delete this Wedding Package');">
                            <i class='bx bxs-trash-alt'></i></a>
                            <a href="update_wed.php?edit=<?php echo $row['id']?>"
                            class="update_wed_btn">
                            <i class='bx bxs-edit'></i></a>
                        </td>
                    </tr>

                    <?php
                    $num++;
                        }
                    }else{
                        echo "<div class='empty_text'>No Wedding Package Available</div>";
                    }
                    ?>
                    
                </tbody>
            </table>
            </section>

        </div>
    </section>

</body>
</html>