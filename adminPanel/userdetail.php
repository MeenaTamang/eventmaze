<!-- nav_Bar -->
<?php include 'nav_bar.php'?>

<?php
  include("../loginPage/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- css -->
  <link rel="stylesheet" href="style.css">

  <link rel="stylesheet" href="plannerCSS/userdetail.css">


  <link rel="stylesheet" href="plannerCSS/view-event.css">

</head>
<body>


<section class="section-container">
    <div class="section_content">
        <div class="text">
          <h3>Users List</h3>
        </div>


        <section class="display_userdetail">

  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    <?php
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn,$sql);

        $i = 1;
        while($data=mysqli_fetch_array($result)){ 
    ?>
      <tr>
        <td><?php echo $i;?> </td>
        <td><?php echo $data['firstname'];?></td>
        <td><?php echo $data['lastname'];?></td>
        <td><?php echo $data['email'];?></td>
        <td><?php echo $data['password'];?></td>
        <td>
        <a href="delete/delete_user.php?delete=<?php echo $data['id']?>"
        class="delete_user_btn" onclick="return confirm('Are you sure you want to delete this user?');">
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