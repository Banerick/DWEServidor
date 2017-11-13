<?php
$PATH = "..";
$directories = scandir($PATH);

echo '<ul>';
foreach ($directories as $dir) {

    if (is_dir($PATH . '/' . $dir))
        echo "<li>Folder: {$dir}</li>";
    else {
        $size = filesize($PATH . '/' . $dir);
        echo "<li>File: {$dir}    -   {$size} Bytes</li>";
    }
}
echo '</ul>';