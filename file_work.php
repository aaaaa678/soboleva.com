<?php
$file = fopen("test.txt", "w");
fwrite($file, "Привет, мир!");
fclose($file);

$file = fopen("test.txt", "r");
$content = fgets($file, 1024);
fclose($file);
echo $content;

rename("test.txt", "mir.txt");

mkdir("folder");
rename("mir.txt", "folder/mir.txt");

copy("folder/mir.txt", "folder/world.txt");

$size = filesize("folder/world.txt");
echo $size . " байт";
echo $size / 1048576 . " mb";
echo $size / 1073741824 . " gb";

unlink("folder/world.txt");

if (file_exists("folder/world.txt")) {
    echo "world.txt существует";
} else {
    echo "world.txt не существует";
}

if (file_exists("folder/mir.txt")) {
    echo "mir.txt существует";
} else {
    echo "mir.txt не существует";
}
?>
