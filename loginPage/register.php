<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Form validation
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
        echo "Please fill out all required fields.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } else if (!preg_match("/^[A-Z][a-z]{2,}$/", $firstname)) {
        echo "First name must start with an uppercase letter and be at least 3 characters long.";
    } else if (!preg_match("/^[A-Z][a-z]{2,}$/", $lastname)) {
        echo "Last name must start with an uppercase letter and be at least 3 characters long.";
    } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        echo "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.";
    } else {
        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $hashed_password);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo '<script type="text/javascript">alert("Registered"); window.location.href="login.html";</script>';
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }

    // Close connection
    $conn->close();
}
?>
