<?php

include '../loginPage/db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
</head>
<body>

<div class="container mt-3">
  <h2>Booking Details</h2>   

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>

    <?php
      $sql = "SELECT * FROM bookings";
      $result = $conn->query($sql);
 
      $i = 1;
        while($data=mysqli_fetch_array($result)){ 
    ?>
      <tr>
        <td><?php echo $i;?> </td>
        <td><?php echo $data['name'];?></td>
        <td><?php echo $data['email'];?></td>
        <td><?php echo $data['date'];?></td>
        <td><a href="edit_booking.php?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-sm"><i class='bx bxs-edit'></i></a></td>
        <td><a href="#" class="btn btn-danger btn-sm delete-booking" data-id="<?php echo $data['id']; ?>"><i class='bx bxs-trash-alt'></i></a></td>
      </tr>
    <?php $i++;} ?>

    </tbody>
  </table>
  </div>
     
</body>
</html>