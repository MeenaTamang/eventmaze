<!-- ----------delete logic---------- -->

<!-- -------php code-------- -->
<?php
include '../connect.php';
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($conn, "Delete from `regular` where id=$delete_id") or
    die("Query failed");

    if($delete_query){
        echo "Corporate Event Package deleted";
        header('location:../view_regu.php');
    }else{
        echo "Corporate-Event Package not deleted";
        header('location:../view_regu.php');
    }


}

?>