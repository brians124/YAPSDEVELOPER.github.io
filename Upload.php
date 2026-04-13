<?php
// 1. Define the destination folder
$target_dir = "audio/";
$target_file = $target_dir . basename($_FILES["songFile"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// 2. Check if the "Upload" button was actually clicked
if(isset($_POST["submit"])) {
    
    // 3. Security: Only allow .mp3 files
    if($fileType != "mp3") {
        echo "Error: Only MP3 files are allowed.";
        $uploadOk = 0;
    }

    // 4. Check if file already exists
    if (file_exists($target_file)) {
        echo "Error: This song already exists in the folder.";
        $uploadOk = 0;
    }

    // 5. Limit file size (e.g., 10MB)
    if ($_FILES["songFile"]["size"] > 10000000) {
        echo "Error: Your file is too large (Max 10MB).";
        $uploadOk = 0;
    }

    // 6. If everything is okay, move the file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["songFile"]["tmp_name"], $target_file)) {
            echo "Success! The song " . htmlspecialchars(basename($_FILES["songFile"]["name"])) . " has been uploaded.";
            echo "<br><a href='index.html'>Go Back</a>";
        } else {
            echo "Error: There was a problem moving your file to the folder.";
        }
    }
}
?>
