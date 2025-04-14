<?php
// Get the submitted form data

// Define the file path where the data will be stored
$filePath = $_SERVER['DOCUMENT_ROOT'] . '/data/skills/' . time() . '.json';

// Check if the directory exists, if not create it
$directory = dirname($filePath);
if (!is_dir($directory)) {
    mkdir($directory, 0755, true);
}
// Save the updated data back to the file
$result = file_put_contents($filePath, json_encode($_POST, JSON_PRETTY_PRINT));
if ($result === false) {
    echo "Error saving data.";
} else {
    header('Location: /facts/skills');
}

