<?php
// Get the submitted form data


if (!isset($_POST['id'])) {
    echo "No id specified.";
    exit;
}

if (!is_numeric($_POST['id'])) {
    echo "Invalid id.";
    exit;
}

$requested_to_delete = $_POST['id'];

// Define the file path where the data will be stored
$filePath = $_SERVER['DOCUMENT_ROOT'] . '/data/education/' . $requested_to_delete . '.json';
echo $filePath;
$file_exists = file_exists($filePath);
if (!file_exists($filePath)) {
    echo "File not found.";
    exit;
}

// Delete the file
if (unlink($filePath)) {
    // Redirect back to the education index page
    header('Location: /facts/education');
    exit;
} else {
    echo "Error deleting file.";
}
