<?php
$title = "CV Generator - Contact";
include $_SERVER['DOCUMENT_ROOT'] . "/html/start.php";
?>

<nav>
    <a href="/">home</a> &gt; 
    <a href="/facts/">facts</a> &gt;
    <span>contact</span> | 
    <a href="/preview/">preview</a>
</nav>
<h1>
    Contact Information
</h1>

<p>
    This section will allow you to manage your contact information, such as your email, phone number, and address.
</p>

<form action="/facts/contact/update.php" method="post" style="display:flex; flex-direction:column;">
    <?php
    $email = '';
    $phone = '';
    $address = '';
    
    // Define the file path where contact information is stored
    $filePath = $_SERVER['DOCUMENT_ROOT'] . '/data/contact.json';
    // Check if the file exists
    if (file_exists($filePath)) {
        $contactData = json_decode(file_get_contents($filePath), true);
        if ($contactData !== null) {
            $email = htmlspecialchars($contactData['email']) ?? '';
            $phone = htmlspecialchars($contactData['phone']) ?? '';
            $address = htmlspecialchars($contactData['address']) ?? '';
        }    
    }
    ?>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="<?php echo $email ?>" required>

    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" required>

    <label for="address">Address</label>
    <input type="text" id="address" name="address" value="<?php echo $address; ?>" required>

    <input type="submit" value="Save Changes">
</form>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/html/end.php";
?>