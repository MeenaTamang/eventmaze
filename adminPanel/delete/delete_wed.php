<!-- ----------delete logic---------- -->

<!-- -------php code-------- -->
<?php
include '../connect.php';
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($conn, "Delete from `wed` where id=$delete_id") or
    die("Query failed");

    if($delete_query){
        echo "Wedding Package deleted";
        header('location:../view_wed.php');
    }else{
        echo "Wedding Package not deleted";
        header('location:../view_wed.php');
    }


}

?>