<?php
$title = "CV Generator - Add Job";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";
?>


<nav>
    <a href="/">home</a> &gt; 
    <a href="/facts/">facts</a> &gt;
    <a href="/facts/jobs">jobs</a> &gt;
    <span>new</span> | 
    <a href="/preview/">preview</a>
</nav>
<h1>
    Add Job
</h1>
<form action="/facts/jobs/add.php" method="post" style="display:flex; flex-direction:column;">
    <label for="company">Company</label>
    <input type="text" id="company" name="company" required>
    <br>
    <label for="position">Position</label>
    <input type="text" id="position" name="position" required>
    <br>
    <label for="start">Start Date</label>
    <input type="date" id="start" name="start" required>
    <br>
    <label for="end">End Date</label>
    <input type="date" id="end" name="end">
    <br>
    <input type="submit" />

</form>


<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>
