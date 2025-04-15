<?php
$title = "CV Generator - Summary";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";
?>

<nav>
    <a href="/">home</a> &gt; 
    <a href="/facts/">facts</a> &gt;
    <span>summary</span> | 
    <a href="/preview/">preview</a>
</nav>
<h1>
    Summary
</h1>

<p>
    This section will allow you to manage your professional summary, which highlights your key skills and achievements.
</p>

<form action="/facts/summary/update.php" method="post" style="display:flex; flex-direction:column;">
    <?php
    $summary = '';
    
    // Define the file path where the summary is stored
    $filePath = $_SERVER['DOCUMENT_ROOT'] . '/data/summary.json';
    // Check if the file exists
    if (file_exists($filePath)) {
        $summaryData = json_decode(file_get_contents($filePath), true);
        if ($summaryData !== null) {
            $summary = htmlspecialchars($summaryData['summary']) ?? '';
            $position = htmlspecialchars($summaryData['position']) ?? '';
        }    
    }
    ?>
    <label for="summary">Professional Summary</label>
    <textarea id="summary" name="summary" rows="5" required><?php echo $summary; ?></textarea>
    <br>
    <label for="position">Position</label>
    <input type="text" id="position" name="position" value="<?php echo $position; ?>">
    <br>
    <input type="submit" value="Save Changes">
</form>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>