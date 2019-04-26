<?php
// Create image instances
$dest = imagecreatefrompng('pdf_files/box.png');
$src = imagecreatefrompng('pdf_files/img_1.png');

// Copy and merge
imagecopymerge($dest, $src, 10, 10, 0, 0, 100, 47, 75);

// Output and free from memory
header('Content-Type: image/gif');
imagegif($dest);

imagedestroy($dest);
imagedestroy($src);
?>
