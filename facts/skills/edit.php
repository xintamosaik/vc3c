<?php
$title = "CV Generator - Edit Skill";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";

// Get the file path from the query parameter
if (!isset($_GET['id'])) {
    echo "No id specified.";
    exit;
}

if (!is_numeric($_GET['id'])) {
    echo "Invalid id.";
    exit;
}

$filePath = $_SERVER['DOCUMENT_ROOT'] .  "/data/skills/" . htmlspecialchars($_GET['id']) . ".json";

// Check if the file exists
if (!file_exists($filePath)) {
    echo "File not found.";
    exit;
}

// Read the existing skill data
$skillData = json_decode(file_get_contents($filePath), true);
if ($skillData === null) {
    echo "Error reading skill data.";
    exit;
}
?>

<nav>
    <a href="/">home</a> &gt; 
    <a href="/facts/">facts</a> &gt;
    <a href="/facts/skills">skills</a> &gt;
    <span>edit</span> | 
    <a href="/preview/">preview</a>
</nav>

<h1>
    Edit Skill
</h1>

<form action="/facts/skills/update.php" method="post" style="display:flex; flex-direction:column;">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
    
    <label for="skill">Skill</label>
    <input type="text" id="skill" name="skill" value="<?php echo htmlspecialchars($skillData['skill']); ?>" required>
    <br>
    <label for="level">Level</label>
    <input type="text" id="level" name="level" value="<?php echo htmlspecialchars($skillData['level']); ?>" required>
    <br>
    <label for="category">Category</label>
    <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($skillData['category']); ?>" required>
    <br>
    <label for="description">Description</label>
    <textarea id="description" name="description" rows="4"><?php echo htmlspecialchars($skillData['description']); ?></textarea>
    <br>
    <input type="submit" value="Save Changes">
</form>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>