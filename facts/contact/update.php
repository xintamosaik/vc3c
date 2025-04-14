<?php
// Ensure the form data is submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method.";
    exit;
}

// Define the file path where contact information will be stored
$filePath = $_SERVER['DOCUMENT_ROOT'] . '/data/contact.json';

// Get the updated contact information from the form submission
$updatedData = [
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'address' => $_POST['address'],
    'linkedin' => $_POST['linkedin'] ?? '',
    'github' => $_POST['github'] ?? '',
    'website' => $_POST['website'] ?? ''
];

// Save the updated data to the file
$result = file_put_contents($filePath, json_encode($updatedData, JSON_PRETTY_PRINT));
if ($result === false) {
    echo "Error saving contact information.";
} else {
    // Redirect back to the contact information page
    header('Location: /facts/?update=success');
    exit;
}