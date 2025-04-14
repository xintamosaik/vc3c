<?php
// Get the submitted form data

$requested_to_delete = $_POST['id'];
if (!isset($requested_to_delete)) {
    echo "No id specified.";
    exit;
}

if (!is_numeric($requested_to_delete)) {
    echo "Invalid id specified.";
    exit;
}

// Define the file path where the data will be stored
$filePath = $_SERVER['DOCUMENT_ROOT'] . '/data/jobs/' . $requested_to_delete . '.json';

$file_exists = file_exists($filePath);
if ($file_exists) {
    // Delete the file
    if (unlink($filePath)) {
        echo "File deleted successfully.";
        header('Location: /facts/jobs');
        exit;
    } else {
        echo "Error deleting file.";
    }
} else {
    echo "File not found.";
}
