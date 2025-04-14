<?php
// Get the submitted form data
$requested_to_delete = $_POST['file'];
// Define the file path where the data will be stored
$filePath = $_SERVER['DOCUMENT_ROOT'] . "/data/skills/" . $requested_to_delete;

$file_exists = file_exists($filePath);
if ($file_exists) {
    // Delete the file
    if (unlink($filePath)) {
        header('Location: /facts/skills');
        exit;
    } else {
        echo "Error deleting file.";
    }
} else {
    echo "File not found.";
}
