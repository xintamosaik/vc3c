<?php
$title = "CV Generator - Add Skill";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";
?>

<nav>
    <a href="/">home</a> &gt; 
    <a href="/facts/">facts</a> &gt;
    <a href="/facts/skills">skills</a> &gt;
    <span>new</span> | 
    <a href="/preview/">preview</a>
</nav>
<h1>
    Add Skill
</h1>
<form action="/facts/skills/add.php" method="post" style="display:flex; flex-direction:column;">
    <label for="skill">Skill</label>
    <input type="text" id="skill" name="skill" required>
    <br>
    <label for="level">Level</label>
    <input type="text" id="level" name="level" required>
    <br>
    <label for="category">Category</label>
    <input type="text" id="category" name="category" required>
    <br>
    <label for="description">Description</label>
    <textarea id="description" name="description" rows="4"></textarea>
    <br>
    <input type="submit" value="Add Skill">
</form>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>
