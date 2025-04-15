<?php
$title = "CV Generator - Remove Skill";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";
if (!isset($_GET['id'])) {
    echo "No id specified.";
    exit;
}

if (!is_numeric($_GET['id'])) {
    echo "Invalid id.";
    exit;
}

$id = $_GET['id'];

$filePath = $_SERVER['DOCUMENT_ROOT'] . '/data/skills/' . htmlspecialchars($id) . '.json';
// Check if the file exists
if (!file_exists($filePath)) {
    echo "File not found.";
    exit;
}
$fileName = basename($filePath);
?>

<h1>
    Remove Skill
</h1>
<form action="/facts/skills/delete.php" method="post">
    <label for="file">
        Really remove <?php echo htmlspecialchars($fileName); ?>?
    </label>
    <input type="hidden" id="file" name="id" value="<?php echo htmlspecialchars($id); ?>" required>

    <input type="submit" value="Delete">
    <a href="/facts/skills">Cancel</a>
</form>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>
