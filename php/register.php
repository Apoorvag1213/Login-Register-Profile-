<?php
require_once __DIR__ . '/../assets/db_connect.php';



try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = $_POST["fullname"];
        $user = $_POST["username"];
        $email = $_POST["email"];
        $pass = $_POST["password"]; 

        
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        
        $stmt = $conn->prepare("INSERT INTO users (fullname, username, email, password) VALUES (:fullname, :username, :email, :password)");
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':username', $user);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        $stmt->execute();

        echo "Registration successful!";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null; // Close the database connection
?>
