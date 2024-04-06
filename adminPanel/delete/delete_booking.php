<!-- ----------delete logic---------- -->

<!-- -------php code-------- -->
<?php
    include '../../loginPage/db.php';
    if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($conn, "Delete from `bookings` where id=$delete_id") or
    die("Query failed");

    if($delete_query){
        echo "Booking Detail deleted";
        header('location:../booking.php');
    }else{
        echo "Booking Detail not deleted";
        header('location:../booking.php');
    }


}

?>