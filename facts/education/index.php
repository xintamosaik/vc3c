<?php
$title = "CV Generator - Education";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";
?>

<nav>
    <!-- breadcrumbs like --> 
    <a href="/">home</a> &gt;
    <a href="/facts">facts</a> &gt;
  
    <span>education</span> |
    <a href="/preview">preview</a>
</nav>
<h1>
    Education
    <?php
    // check for update=success
    if (isset($_GET['update']) && $_GET['update'] === 'success') {
        echo '( Updated )';
    }
    ?>
</h1>
<a href="/facts/education/new.php">Add Education</a>

<?php
$dir = $_SERVER['DOCUMENT_ROOT'] . '/data/education/';
$files = glob($dir . '*.json');
foreach ($files as $file) {
    $fileName = basename($file);
    $id = explode('.', $fileName)[0];
    $filePath = '/data/education/' . $fileName;
    $fileData = json_decode(file_get_contents($file), true);
    if ($fileData === null) {
        echo "Error reading file with id: $id";
        continue;
    }

    $degree = htmlspecialchars($fileData['degree']);
    $institution = htmlspecialchars($fileData['institution']);
    $startDate = htmlspecialchars($fileData['start']);
    $formattedStartDate = date('m/Y', strtotime($fileData['start']));

    $endDate = $fileData['end'] ? htmlspecialchars($fileData['end']) : 'Present';
    $formattedEndDate = ($endDate === 'Present') ? 'Present' : date('m/Y', strtotime($fileData['end']));

    $location = htmlspecialchars($fileData['location']);
    $description = nl2br(htmlspecialchars($fileData['description'] ?? ''));

    echo <<<HTML
    <hr>
    <div>
        <h2>$degree</h2>
        <p><strong>$institution</strong></p>
        <p>$formattedStartDate - $formattedEndDate</p>
        <p>$location</p>
        <p>$description</p>
        <a href="/facts/education/edit.php?id=$id">Edit</a>
        <a href="/facts/education/remove.php?id=$id">Delete</a>
    </div>
    HTML;
}
?>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>