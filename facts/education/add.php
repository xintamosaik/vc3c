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
$timestamp = time();
$filePath = $_SERVER['DOCUMENT_ROOT'] . "/data/education/education_$timestamp.json";

// Ensure the directory exists
$dir = $_SERVER['DOCUMENT_ROOT'] . '/data/education/';
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

// Save the education data to the file
$result = file_put_contents($filePath, json_encode($educationData, JSON_PRETTY_PRINT));
if ($result === false) {
    echo "Error saving education entry.";
} else {
    // Redirect back to the education index page
    header('Location: /facts/education/');
    exit;
}