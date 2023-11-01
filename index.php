<!DOCTYPE html>
<html>
<head>
    <title>File Manager</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>File Manager</h1>

    <h2>File List</h2>
    <ul>
        <?php
        $files = scandir('uploads');
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                $originalFileName = substr($file, 0, 40); // Display the first 40 characters of the original name

                // Extract the user-defined display name from the file name
                $displayName = pathinfo($file, PATHINFO_FILENAME);

                // Remove the hash part of the file name
                $displayName = preg_replace('/^[0-9a-f]{40}\./', '', $displayName);

                // Display the display name as a link and the original file name as a download link
                echo "<li><a href='uploads/$file' target='_blank'>$displayName</a> <a href='uploads/$file' download>Download</a> <a href='delete.php?file=$file'>Delete</a></li>";
            }
        }
        ?>
    </ul>

    <h2>Upload a File</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <input type="text" name="display_name" placeholder="Display Name">
        <input type="submit" value="Upload">
    </form>
</body>
</html>

