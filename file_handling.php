<?php

$myfile = fopen("test.txt", "w");
$txt = "Hello World\n";
fwrite($myfile, $txt);
fclose($myfile);

$myfile = fopen("test.txt", "r");
echo fread($myfile, filesize("test.txt"));
fclose($myfile);
echo "<br>";
echo "---------------------------------";
echo "<br>";

$myfile = fopen("test.txt", "a");
$txt = "New Line\n";
fwrite($myfile, $txt);
fclose($myfile);

$myfile = fopen("test.txt", "r");
while(!feof($myfile)) {
    echo fgets($myfile) . "<br>";
}
fclose($myfile);
echo "---------------------------------";
echo "<br>";

?>
