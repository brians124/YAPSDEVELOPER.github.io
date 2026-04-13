<?php
// 1. Define the directory where your music files are stored
// Change 'uploads/songs/' to your actual folder path
$music_directory = 'uploads/songs/';

if (isset($_GET['file'])) {
    // 2. Get the filename and sanitize it 
    // basename() prevents directory traversal attacks (e.g., ../../config.php)
    $filename = basename($_GET['file']);
    $filepath = $music_directory . $filename;

    // 3. Check if the file exists and is readable
    if (!empty($filename) && file_exists($filepath) && is_file($filepath)) {
        
        // 4. Set headers to force the download
        header('Content-Description: File Transfer');
        header('Content-Type: audio/mpeg'); // Assumes MP3 files
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));

        // 5. Clear output buffer and read the file
        ob_clean();
        flush();
        readfile($filepath);
        exit;
        
    } else {
        // Error if file doesn't exist
        echo "Error: The file does not exist or has been moved.";
    }
} else {
    echo "Error: No file specified.";
}
?>