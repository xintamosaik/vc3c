<?php
$title = "CV Generator - Edit Job";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";

// Get the file path from the query parameter
if (!isset($_GET['file'])) {
    echo "No file specified.";
    exit;
}

$filePath = $_SERVER['DOCUMENT_ROOT'] . $_GET['file'];

// Check if the file exists
if (!file_exists($filePath)) {
    echo "File not found.";
    exit;
}

// Read the existing job data
$jobData = json_decode(file_get_contents($filePath), true);
if ($jobData === null) {
    echo "Error reading job data.";
    exit;
}
?>

<nav>
    <a href="/">home</a> &gt; 
    <a href="/facts/">facts</a> &gt;
    <a href="/facts/jobs">jobs</a> &gt;
    <span>edit</span> | 
    <a href="/preview/">preview</a>
</nav>

<h1>Edit Job</h1>

<form action="/facts/jobs/update.php" method="post" style="display:flex; flex-direction:column;">
    <input type="hidden" name="file" value="<?php echo htmlspecialchars($_GET['file']); ?>">
    
    <label for="company">Company</label>
    <input type="text" id="company" name="company" value="<?php echo htmlspecialchars($jobData['company']); ?>" required>
    <br>
    <label for="position">Position</label>
    <input type="text" id="position" name="position" value="<?php echo htmlspecialchars($jobData['position']); ?>" required>
    <br>
    <label for="start">Start Date</label>
    <input type="date" id="start" name="start" value="<?php echo htmlspecialchars($jobData['start']); ?>" required>
    <br>
    <label for="end">End Date</label>
    <input type="date" id="end" name="end" value="<?php echo htmlspecialchars($jobData['end']); ?>">
    <br>
    <input type="submit" value="Save Changes">
</form>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>