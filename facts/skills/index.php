<?php
$title = "CV Generator - Skills";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";
?>
<nav>
    <a href="/">home</a> &gt; 
    <a href="/facts/">facts</a> &gt;
    <span>skills</span> | 
    <a href="/preview/">preview</a>

    <h1>
        Skills
    </h1>

    <a href="/facts/skills/new.php">add skill</a>

    <?php 
    $directory = $_SERVER['DOCUMENT_ROOT'] . '/data/skills/';
    $files = glob(pattern: $directory . '*.json');
    foreach ($files as $file) {
        $data = json_decode(file_get_contents($file), true);
        $skill = htmlspecialchars($data['skill']);
        $level = htmlspecialchars($data['level']);
        $description = htmlspecialchars($data['description']);
        $category = htmlspecialchars($data['category']);
 
        echo <<<HTML
        <hr>
        <div class="skill">
            <h2>$skill</h2>
            <p>Level: $level</p>
            <p>Description: $description</p>
            <p>Category: $category</p>
        </div>
        <a href="/facts/skills/edit.php?file=" . basename($file) . ">edit</a>
        <a href="/facts/skills/delete.php?file=" . basename($file) . ">delete</a>
        HTML;
    }
    ?>

</nav>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>