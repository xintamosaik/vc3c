<?php
$title = "CV Generator - Skills";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";
?>

<nav>
    <a href="/">home</a> &gt; 
    <a href="/facts/">facts</a> &gt;
    <span>skills</span> | 
    <a href="/preview/">preview</a>
</nav>
<h1>
    Skills
    <?php
    if (isset($_GET['update']) && $_GET['update'] === 'success') {
        echo '( Updated )';
    }
    ?>
</h1>

<a href="/facts/skills/new.php">Add Skill</a>

<?php
$dir = $_SERVER['DOCUMENT_ROOT'] . '/data/skills/';
$files = glob($dir . '*.json');
foreach ($files as $file) {
    $fileName = basename($file);
    $filePath = '/data/skills/' . $fileName;
    $fileData = json_decode(file_get_contents($file), true);
    if ($fileData === null) {
        echo "Error reading file: $file";
        continue;
    }

    $skill = htmlspecialchars($fileData['skill']);
    $level = htmlspecialchars($fileData['level']);
    $description = nl2br(htmlspecialchars($fileData['description'] ?? ''));
    $category = htmlspecialchars($fileData['category']);

    echo <<<HTML
    <hr>
    <div>
        <h2>$skill</h2>
        <p><strong>Level:</strong> $level</p>
        <p><strong>Category:</strong> $category</p>
        <p>$description</p>
        <a href="/facts/skills/edit.php?file=$filePath">Edit</a>
        <a href="/facts/skills/remove.php?file=$filePath">Delete</a>
    </div>
    HTML;
}
?>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>