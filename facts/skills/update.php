<?php
// Ensure the form data is submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Invalid request method.";
    exit;
}

// Get the file path from the form submission
if (!isset($_POST['id'])) {
    echo "No file specified.";
    exit;
}

if (!is_numeric($_POST['id'])) {
    echo "Invalid file id.";
    exit;
}

$filePath = $_SERVER['DOCUMENT_ROOT'] . "/data/skills/" . htmlspecialchars($_POST['id']) . ".json";

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
