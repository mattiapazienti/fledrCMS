<?php 
$on='delete';

include_once("tpl/header.php");

echo "<div class=\"content\"><h1>Delete post</h1>";

$fileName = "posts.txt"; 
$file = file($fileName); 
$id = $_GET["post"];

if (is_writable($fileName)) {


$yourArray = ""; 
$row = explode(",",$file[$id]); 

for ($j=0;$j<count($row);$j++) { 
$row[$j] = $yourArray[$j]; 
} 
$file[$id] =implode("",$row); 
$content = implode("",$file); 
$open = fopen($fileName,"w"); 
fwrite($open,$content); 
echo "<div class=\"message\"><h5>Post successfully deleted</h5> <a href=\"index.php\">back to dashboard</a></div>";

} else {
    echo "The file $fileName is not writable, set permissions to 755 or 777";
}

//deleting views

$views_file = "views.txt"; 
$view = file($views_file); 

if (is_writable($views_file)) {


$allviews = ""; 
$v = explode(",",$view[$id]); 

for ($j=0;$j<count($v);$j++) { 
$v[$j] = $allviews[$j]; 
} 
$view[$id] = implode("",$v); 
$contentV = implode("",$view); 
$openV = fopen($views_file,"w"); 
fwrite($openV,$contentV); 

} else {
    echo "The file $views_file is not writable, set permissions to 755 or 777";
}

echo "</div>";
include_once("tpl/footer.php");

?>

