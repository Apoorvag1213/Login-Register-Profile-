<?php
require_once __DIR__ . '/../assets/db_connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $servername = "localhost";
    $db_username = "root";
    $db_password = "Mohan1312@A";
    $dbname = "register";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare a SQL statement to retrieve hashed password for the given username
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if ($hashed_password && password_verify($password, $hashed_password)) {
        //  User exists in the database and password matches
        $response = array('success' => true);
        http_response_code(200); // Set HTTP status
        echo json_encode($response);
        exit();
    } else {
        // Invalid credentials - User not found in the database or password doesn't match
        $response = array('success' => false);
        http_response_code(401); 
        echo json_encode($response);
        exit();
    }

    // Close the database connection
    $conn->close();
} else {
    
    http_response_code(405); 
    echo 'Method Not Allowed';
    exit();
}
?>
