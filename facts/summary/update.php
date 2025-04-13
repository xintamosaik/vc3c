<?php
// Ensure the form data is submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method.";
    exit;
}

// Define the file path where the summary information will be stored
$filePath = $_SERVER['DOCUMENT_ROOT'] . '/data/summary.json';

// Get the updated summary information from the form submission
$updatedData = [
    'summary' => $_POST['summary']
];

// Save the updated data to the file
$result = file_put_contents($filePath, json_encode($updatedData, JSON_PRETTY_PRINT));
if ($result === false) {
    echo "Error saving summary information.";
} else {
    // Redirect back to the summary page with a success message
    header('Location: /facts/?update=success');
    exit;
}