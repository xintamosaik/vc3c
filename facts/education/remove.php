<?php
$title = "CV Generator - Remove Education";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";

if (!isset($_GET['id'])) {
    echo "No id specified.";
    exit;
}

$filePath = $_SERVER['DOCUMENT_ROOT'] . '/data/education/' . htmlspecialchars($_GET['id']) . '.json';

// Check if the file exists
if (!file_exists($filePath)) {
    echo "File not found.";
    exit;
}

$fileName = basename($filePath);
$filePath = '/data/education/' . $fileName;
?>

<h1>
    Remove Education
</h1>
<form action="/facts/education/delete.php" method="post">
    <label for="id">
        Really remove <?php echo htmlspecialchars($fileName); ?>?
    </label>
    <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>" required>

    <input type="submit" value="Delete">
    <a href="/facts/education">Cancel</a>
</form>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>