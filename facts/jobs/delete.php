<?php
// Get the submitted form data

$requested_to_delete = $_POST['file'];
// Define the file path where the data will be stored
$filePath = $_SERVER['DOCUMENT_ROOT'] . $requested_to_delete;
echo "File path: " . $filePath;

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
// Check if the file exists
// if (!file_exists($filePath)) {
//     echo "File not found.";
//     exit;
// }
// Save the updated data back to the file

