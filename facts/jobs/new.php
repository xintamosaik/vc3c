<?php
$title = "CV Generator - Add Job";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";
?>
<nav>
    <a href="/facts/jobs">jobs</a>
    <a href="/facts">facts</a>
    <a href="/index.php">home</a>
    <a href="/preview">preview</a>
</nav>
<h1>
    Add Job
</h1>
<form action="/facts/jobs/add.php" method="post">
    <label for="company">Company</label>
    <input type="text" id="company" name="company" required>
    
    <label for="position">Position</label>
    <input type="text" id="position" name="position" required>

    <label for="start">Start Date</label>
    <input type="date" id="start" name="start" required>

    <label for="end">End Date</label>
    <input type="date" id="end" name="end">

    <input type="submit" />

</form>
    

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>
