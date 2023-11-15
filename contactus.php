<?php include('head.php'); ?>
<h1>Contact us</h1>

<?php
$filename = 'contactus.txt';

$file = fopen($filename, "r"); // Open the file for reading

if ($file) {
    $filesize = filesize($filename);
    $data = fread($file, $filesize);
    fclose($file); // Close the file
    
    echo nl2br($data);
} else {
    echo "Failed to open the file.";
}
?>


<?php include('footer.php'); ?>