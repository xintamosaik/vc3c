<?php
$title = "CV Generator - Edit Education";
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

// Read the existing education data
$educationData = json_decode(file_get_contents($filePath), true);
if ($educationData === null) {
    echo "Error reading education data.";
    exit;
}
?>

<nav>
    <a href="/">home</a> &gt; 
    <a href="/facts/">facts</a> &gt;
    <a href="/facts/education/">education</a> &gt;
    <span>edit</span> | 
    <a href="/preview/">preview</a>
</nav>
<h1>
    Edit Education
</h1>

<form action="/facts/education/update.php" method="post" style="display:flex; flex-direction:column;">
    <input type="hidden" name="file" value="<?php echo htmlspecialchars($_GET['file']); ?>">

    <label for="degree">Degree</label>
    <input type="text" id="degree" name="degree" value="<?php echo htmlspecialchars($educationData['degree']); ?>" required>
    <br>
    <label for="institution">Institution</label>
    <input type="text" id="institution" name="institution" value="<?php echo htmlspecialchars($educationData['institution']); ?>" required>
    <br>
    <label for="location">Location</label>
    <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($educationData['location']); ?>" required>
    <br>
    <label for="description">Description</label>
    <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($educationData['description']); ?></textarea>
    <br>
    <label for="start">Start Date</label>
    <input type="date" id="start" name="start" value="<?php echo htmlspecialchars($educationData['start']); ?>" required>
    <br>
    <label for="end">End Date</label>
    <input type="date" id="end" name="end" value="<?php echo htmlspecialchars($educationData['end']); ?>">
    <br>
    <input type="submit" value="Save Changes">
</form>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>