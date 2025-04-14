<?php
$title = "CV Generator - Add Job";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";
if (!isset($_GET['id'])) {
    echo "No id specified.";
    exit;
}
$filePath = $_SERVER['DOCUMENT_ROOT'] . '/data/jobs/' . htmlspecialchars($_GET['id']) . '.json';
// Check if the file exists
if (!file_exists($filePath)) {
    echo "File not found.";
    exit;
}
$fileName = basename($filePath);
$filePath = '/data/jobs/' . $fileName;

?>


<h1>
    Remove Job
</h1>
<form action="/facts/jobs/delete.php" method="post">
    <label for="file">
        Really remove <?php echo htmlspecialchars($fileName); ?>
    </label>
    <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($filePath); ?>" required>

    <input type="submit" value="Delete">
    <a href="/facts/jobs">Cancel</a>
</form>
    

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>
