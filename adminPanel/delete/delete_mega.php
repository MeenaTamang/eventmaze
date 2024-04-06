<!-- ----------delete logic---------- -->

<!-- -------php code-------- -->
<?php
include '../connect.php';
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($conn, "Delete from `mega` where id=$delete_id") or
    die("Query failed");

    if($delete_query){
        echo "Mega-Event Package deleted";
        header('location:../view_mega.php');
    }else{
        echo "Mega-Event Package not deleted";
        header('location:../view_mega.php');
    }


}

?>