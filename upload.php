<?php
if (isset($_FILES['file'])) {
    $uploadDir = 'uploads/';
    $originalFileName = $_FILES['file']['name'];
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

    // Get the display name from the form input (sanitize as needed)
    $displayName = isset($_POST['display_name']) ? $_POST['display_name'] : '';
    $displayName = trim($displayName);

    if (empty($displayName)) {
        $displayName = pathinfo($originalFileName, PATHINFO_FILENAME);
    }

    // Generate an obfuscated file name using a hash of the display name
    $hashedFileName = sha1($displayName) . ".$fileExtension";

    $uploadFile = $uploadDir . $hashedFileName;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        header('Location: index.php');
    } else {
        echo "File upload failed.";
    }
}
?>

