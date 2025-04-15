<?php

// Get the submitted education data
$educationData = [
    'degree' => $_POST['degree'],
    'institution' => $_POST['institution'],
    'location' => $_POST['location'],
    'description' => $_POST['description'],
    'start' => $_POST['start'],
    'end' => $_POST['end']
];

// Generate a unique filename using a timestamp
$filePath = $_SERVER['DOCUMENT_ROOT'] . "/data/education/" . time() . ".json";

// Ensure the directory exists
$dir = $_SERVER['DOCUMENT_ROOT'] . '/data/education/';
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

// Save the education data to the file
$result = file_put_contents($filePath, json_encode($educationData, JSON_PRETTY_PRINT));
if ($result === false) {
    error_log("Failed to write to file: $filePath");
    echo "Error saving education entry.";
    exit;
} else {
    // Redirect back to the education index page
    header('Location: /facts/education/');
    exit;
}