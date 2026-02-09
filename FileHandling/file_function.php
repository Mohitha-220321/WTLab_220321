<?php

echo "<h2>PHP File Functions Demonstration</h2>";

// File Name
$filename = "sample.txt";
$copyfile="copy_sample.txt";
$folder="test_folder";

// 1. file_exists()
if (file_exists($filename)) {
    echo "File exists<br><br>";
} else {
    echo "File does not exist<br>";
    exit();
}
// 2. fopen() & fwrite()
$file = fopen($filename, "w");
fwrite($file, "Hello PHP\nWelcome to File Handling\n");
fclose($file);
echo "Data written using fwrite()<br><br>";
// 3. fopen() & fread()
$file = fopen($filename, "r");
$size = filesize($filename);
$content = fread($file, $size);
fclose($file);
echo "<b>File content using fread():</b><br>";
echo nl2br($content) . "<br><br>";
// 4. file_get_contents()
echo "<b>File content using file_get_contents():</b><br>";
echo nl2br(file_get_contents($filename)) . "<br><br>";
// 5. file_put_contents()
file_put_contents($filename, "Updated using file_put_contents()");
echo "Data written using file_put_contents()<br><br>";
// 6. file()
echo "<b>File content line by line using file():</b><br>";
$lines = file($filename);
foreach ($lines as $line) {
    echo $line . "<br>";
}
echo "<br>";
// 7. filesize()
echo "File Size: " . filesize($filename) . " bytes<br>";
// 8. filetype()
echo "File Type: " . filetype($filename) . "<br>";
// 9. fileatime()
echo "Last Access Time: " . date("d-m-Y H:i:s", fileatime($filename)) . "<br>";
// 10. filemtime()
echo "Last Modified Time: " . date("d-m-Y H:i:s", filemtime($filename)) . "<br>";
// 11. filectime()
echo "Last Change Time: " . date("d-m-Y H:i:s", filectime($filename)) . "<br>";

//fileperms,fileowner,filegroup,fileinode
echo fileperms($filename);
echo fileowner($filename);
echo filegroup($filename);
echo fileinode($filename);
//file and folder management
//copy()
copy($filename,$copyfile);
echo "file copied succesfully<br>";
//rename()
rename($copyfile,"renamed_file.txt");
echo "file renamed successfully <br>";
//is_file()
if(is_file("renamed_file.txt")){
    echo "it is a file <br>";
}
//mkdir
if(!is_dir($folder)){
    mkdir($folder);
    echo "folder created successfully<br>";
}
//is_dir()
if(!is_dir($folder)){
    echo "it is a directory<br>";
}
else{
    echo "it is not a directory<br>";
    }
//rmdir
rmdir($folder);
echo "folder removed successfully<br>";
//directiory handling (parsing directories)
//getcwd()
echo "current working directory";
getcwd()."<br><br>";
//scandir()
echo "<b>using scandir():</b><br>";
$files=scandir(getcwd());
foreach($files as $file){
    echo $file . "<br>";
}
echo "<br>";
//opendir(),readdir(),closedir()
echo "<b> using opendir,readdir and closedir</b><br>";
$dir=opendir(getcwd());
while(($file=readdir($dir))!==false){
    echo $file ."<br>";
}
closedir($dir);
//flock()
$file = fopen("sample.txt", "a");

if (flock($file, LOCK_EX)) {

    fwrite($file, "Data written safely\n");
    flock($file, LOCK_UN); // unlock

} else {
    echo "Could not lock the file";
}
    fclose($file);
    
$fp = fopen("sample.txt", "a+");

if (flock($fp, LOCK_EX)) {
    fwrite($fp, "Locked write operation\n");
    rewind($fp);
    echo fread($fp, filesize("sample.txt"));
    flock($fp, LOCK_UN);
}

fclose($fp);
?>