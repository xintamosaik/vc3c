<?php
// Ensure the file parameter is provided
if (!isset($_POST['file'])) {
    echo "No file specified.";
    exit;
}

$filePath = $_SERVER['DOCUMENT_ROOT'] . $_POST['file'];

// Check if the file exists
if (!file_exists($filePath)) {
    echo "File not found.";
    exit;
}

// Get the updated job data from the form submission
$updatedData = [
    'company' => $_POST['company'],
    'position' => $_POST['position'],
    'start' => $_POST['start'],
    'end' => $_POST['end'],
    'location' => $_POST['location'],
    'description' => $_POST['description']
];

// Save the updated data back to the file
$result = file_put_contents($filePath, json_encode($updatedData, JSON_PRETTY_PRINT));
if ($result === false) {
    echo "Error saving data.";
} else {
    // Redirect back to the jobs page
    header('Location: /facts/jobs');
    exit;
}