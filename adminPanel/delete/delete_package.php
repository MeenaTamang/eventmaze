<!-- ----------delete logic---------- -->

<!-- -------php code-------- -->
<?php
include '../../loginPage/db.php';
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($conn, "Delete from `events` where id=$delete_id") or
    die("Query failed");

    echo "<script>history.go(-1);</script>";

}

?>