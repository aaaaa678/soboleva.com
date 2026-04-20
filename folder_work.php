<?php
mkdir("test");

rename("test", "www");

rmdir("www");

mkdir("test");
$folders = array("images", "docs", "uploads", "temp", "backup");
foreach ($folders as $folder) {
    mkdir("test/" . $folder);
}

$jpg_files = glob("*.jpg");
foreach ($jpg_files as $file) {
    echo $file . " - " . filesize($file) . " байт<br>";
}
?>
