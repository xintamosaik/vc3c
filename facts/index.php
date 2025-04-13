<?php
$title = "CV Generator - Facts";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";
// check if there is update=success in the url

?>

<nav>
    <a href="/">home</a> &gt; 
    <span>facts</> | 
    <a href="/preview/">preview</a>
</nav>
<h1>
    Facts
    <?php
    if (isset($_GET['update']) && $_GET['update'] === 'success') {
        echo " (updated)";
    } 
    ?>
</h1>
<nav>
    <ul>
        <li>
            <a href="/facts/personal/">Personal</a>
        </li>
        
        <li>
            <a href="/facts/contact/">Contact</a>
        </li>

        <li>
            <a href="/facts/summary/">Summary</a>
        </li>

        <li>
            <a href="/facts/jobs/">Jobs</a>
        </li>

        <li>
            <a href="/facts/education/">Education</a>
        </li>

        <li>
            <a href="/facts/skills/">Skills</a>
        </li>

        <li>
            <a href="/facts/languages/">Languages</a>
        </li>
    </ul>
</nav>


<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>