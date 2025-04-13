<?php
// Ensure the form data is submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method.";
    exit;
}

// Define the file path where personal information will be stored
$filePath = $_SERVER['DOCUMENT_ROOT'] . '/data/personal.json';

// Get the updated personal information from the form submission
$updatedData = [
    'name' => $_POST['name'],
    'dob' => $_POST['dob'],
    'location' => $_POST['location']
];

// Save the updated data to the file
$result = file_put_contents($filePath, json_encode($updatedData, JSON_PRETTY_PRINT));
if ($result === false) {
    echo "Error saving personal information.";
} else {
    // Redirect back to the personal information page
    header('Location: /facts/?update=success');
    exit;
}