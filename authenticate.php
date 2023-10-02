<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle login form submission
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database (replace with your DB details)
    $conn = new mysqli("localhost", "arbaj", "arbaj", "student_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user data from the database
    $sql = "SELECT id, username, password FROM students WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row && password_verify($password, $row['password'])) {
        // User authenticated, you can implement 2FA here
        echo "Login successful! Welcome, " . $row['username'];
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>
