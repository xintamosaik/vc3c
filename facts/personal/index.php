<?php
$title = "CV Generator - Personal";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";
?>

<nav>
    <a href="/">home</a> &gt; 
    <a href="/facts/">facts</a> &gt;
    <span>personal</span> | 
    <a href="/preview/">preview</a>
</nav>
<h1>
    Personal Information
</h1>

<p>
    This section will allow you to manage your personal information, such as your name, date of birth, and other relevant details.
</p>

<form action="/facts/personal/update.php" method="post" style="display:flex; flex-direction:column;">
    <?php
    $name = '';
    $dob = '';
    $location = '';
    
    // Define the file path where personal information is stored
    $filePath = $_SERVER['DOCUMENT_ROOT'] . '/data/personal.json';
    // Check if the file exists
    if (file_exists($filePath)) {
        $personalData = json_decode(file_get_contents($filePath), true);
        if ($personalData !== null) {
            $name = htmlspecialchars($personalData['name']) ?? '';
            $dob = htmlspecialchars($personalData['dob']) ?? '';
            $location = htmlspecialchars($personalData['location']) ?? '';
        }    
    }
    ?>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="<?php echo $name ?>" required>
    <br>
    <label for="dob">Date of Birth</label>
    <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required>
    <br>
    <label for="location">Location</label>
    <input type="text" id="location" name="location" value="<?php echo $location; ?>" required>
    <br>
    <input type="submit" value="Save Changes">



</form>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>