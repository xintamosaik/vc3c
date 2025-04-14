<?php
// Ensure the form data is submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method.";
    exit;
}

// Get the file path from the form submission
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

// Get the updated skill data from the form submission
$updatedData = [
    'skill' => $_POST['skill'],
    'level' => $_POST['level'],
    'category' => $_POST['category'],
    'description' => $_POST['description']
];

// Save the updated data back to the file
$result = file_put_contents($filePath, json_encode($updatedData, JSON_PRETTY_PRINT));
if ($result === false) {
    echo "Error saving skill entry.";
} else {
    // Redirect back to the skills index page
    header('Location: /facts/skills/?update=success');
    exit;
}
?>
