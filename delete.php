<?php
if (isset($_GET['file'])) {
    $file = 'uploads/' . $_GET['file'];
    
    if (file_exists($file)) {
        unlink($file);
        header('Location: index.php');
    } else {
        echo "File not found.";
    }
}
?>
