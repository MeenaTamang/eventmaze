<!-- ----------delete logic---------- -->

<!-- -------php code-------- -->
<?php
include '../connect.php';
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($conn, "Delete from `eventhappen` where id=$delete_id") or
    die("Query failed");

    if($delete_query){
        echo "Event deleted";
        header('location:../updateventhappen.php');
    }else{
        echo "Event not deleted";
        header('location:../updateventhappen.php');
    }


}

?>