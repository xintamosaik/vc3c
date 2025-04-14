<?php
$title = "CV Generator - Add Education";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";
?>

<nav>
    <a href="/">home</a> &gt; 
    <a href="/facts/">facts</a> &gt;
    <a href="/facts/education">education</a> &gt;
    <span>new</span> | 
    <a href="/preview/">preview</a>
</nav>
<h1>
    Add Education
</h1>
<form action="/facts/education/add.php" method="post" style="display:flex; flex-direction:column;">
    <label for="degree">Degree</label>
    <input type="text" id="degree" name="degree" required>
    <br>
    <label for="institution">Institution</label>
    <input type="text" id="institution" name="institution" required>
    <br>
    <label for="location">Location</label>
    <input type="text" id="location" name="location" required>
    <br>
    <label for="description">Description</label>
    <textarea id="description" name="description" rows="4" required></textarea>
    <br>
    <label for="start">Start Date</label>
    <input type="date" id="start" name="start" required>
    <br>
    <label for="end">End Date</label>
    <input type="date" id="end" name="end">
    <br>
    <input type="submit" value="Add Education">
</form>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>