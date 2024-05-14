<!-- nav_Bar -->
<?php include 'nav_bar.php'?>

<?php
include '../loginPage/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Details</title>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

      <!-- css -->
      <link rel="stylesheet" href="style.css">

      <link rel="stylesheet" href="plannerCSS/booking.css">

      <!-- view_wed css file -->
    <link rel="stylesheet" href="plannerCSS/view-event.css">

</head>

<body>

<section class="section-container">
<div class="section_content">
            <div class="text">
                <h3>Booking Details</h3>
            </div>

  

        <section class="display_booking">


  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Package</th>
        <th>Event</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date</th>
        <th>Amount</th>
        <th>Booking Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    <?php
      $sql = "SELECT b.id, b.name, b.email, b.date, b.booking_date, e.name eventname, e.type, e.price FROM bookings b LEFT JOIN events e ON b.event_id=e.id";
      $result = $conn->query($sql);

      $i = 1;
        while($data=mysqli_fetch_array($result)){
    ?>
      <tr>
        <td><?php echo $i;?> </td>
        <td><?php echo $data['type'];?></td>
        <td><?php echo $data['eventname'];?></td>
        <td><?php echo $data['name'];?></td>
        <td><?php echo $data['email'];?></td>
        <td><?php echo $data['date'];?></td>
        <td><?php echo $data['price'];?></td>
        <td><?php echo $data['booking_date'];?></td>
        <td>
        <a href="delete/delete_booking.php?delete=<?php echo $data['id']?>"
        class="delete_booking_btn" onclick="return confirm('Are you sure you want to delete this booking details?');">
        <i class='bx bxs-trash-alt'></i></a>
      </td>
      </tr>
    <?php $i++;} ?>

    </tbody>
  </table>
  </div>
</section>
</body>
</html>