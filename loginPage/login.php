
<?php
session_start();
include("db.php");
    //Initial state of error
    $error = "false"; //No error initially
    $errorMsg = ""; //No error msg to show
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        //fetch user data
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();

        //check if record exist in DB
        if($data){
            //check if password matches
            if (password_verify($password, $data["password"])){
                $_SESSION["userId"] = $data["id"];
                header("location:../homePage/eventPlanner.php");
                exit();
            } else { //password doesn't match
                $error = "true";
                echo '<script type="text/javascript">alert("Incorrect Password"); window.location.href="login.html";</script>';

                // $errorMsg = "Incorrect Password";
            }
        } else { //no record exist in DB
            $error = "true";
            $errorMsg = "User Not Found";
        }

    }
    $conn->close();
?>
