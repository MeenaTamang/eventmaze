<!-- ----------delete logic---------- -->

<!-- -------php code-------- -->
<?php
include '../../loginPage/db.php';
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_query=mysqli_query($conn, "Delete from `users` where id=$delete_id") or
    die("Query failed");

    if($delete_query){
        echo "User detail is deleted";
        header('location:../userdetail.php');
    }else{
        echo "User detail not deleted";
        header('location:../userdetail.php');
    }


}

?>