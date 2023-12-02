<?php
// Establish MongoDB connection
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// Select the database and collection
$database = $mongoClient->userProfileDB;
$collection = $database->profiles;

// Fetch data 
$age = $_POST['age'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];

// Create a document to insert into the collection
$userDocument = [
    "user_id" => "your_user_id_here", 
    "age" => $age,
    "dob" => $dob,
    "contact" => $contact
];

$insertResult = $collection->insertOne($userDocument);


if ($insertResult->getInsertedCount() > 0) {
    echo "User profile data inserted successfully!";
} else {
    echo "Failed to insert user profile data.";
}
?>
