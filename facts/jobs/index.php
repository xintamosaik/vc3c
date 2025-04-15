<?php
$title = "CV Generator - Jobs";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";
?>
<nav>
<a href="/index.php">home</a> &gt;
    <a href="/facts">facts</a> &gt;
    <span>jobs</span> |
    <a href="/preview">preview</a>
</nav>
<h1>
    Jobs
</h1>
    <a href="/facts/jobs/new.php">Add Job</a>
    <?php
    $dir = $_SERVER['DOCUMENT_ROOT'] . '/data/jobs/';
    $files = glob($dir . '*.json');
    foreach ($files as $file) {
        $fileName = basename($file);
        $id = explode('.', $fileName)[0];
        $filePath = '/data/jobs/' . $fileName;
        $fileData = json_decode(file_get_contents($file), true);
        if ($fileData === null) {
            echo "Error reading file: $file";
            continue;
        }
        $title = htmlspecialchars($fileData['title']);
        $company = htmlspecialchars($fileData['company']);
        $position = htmlspecialchars($fileData['position']);
        $location = htmlspecialchars($fileData['location']);

        $startDate = htmlspecialchars($fileData['start']);
        $formattedStartDate = date('m/Y', strtotime($fileData['start']));

        $endDate = $fileData['end'] ? htmlspecialchars($fileData['end']) : 'Present';
        $formattedEndDate = '';
        if ($endDate === 'Present') {
            $formattedEndDate = 'Present';
        } else {
            $formattedEndDate = date('m/Y', strtotime($fileData['end']));
        }
        echo <<<HTML
        <hr>
        <div>
            <h2>$title</h2>
            <p><strong>$company</strong></p>
            <p>$position</p>
            <p>$formattedStartDate - $formattedEndDate</p>
            <a href="/facts/jobs/edit.php?id=$id">Edit</a>
            <a href="/facts/jobs/remove.php?id=$id">Delete</a>
        </div>
      
        HTML;
    }
    ?>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>
