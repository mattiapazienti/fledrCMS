<?php 
include_once("config.php");
include_once("tpl/header.php"); 
?>

<div id="content" class="about">

<?php

$fileName = "admin/about.txt";
$file = @fopen($fileName,"r") or die("Can not read the file"); 
$data = @fread($file, filesize($fileName));
fclose($file);
$bio = $data;

echo "<div class=\"contents\"><h1>About</h1><p>$data</p></div>";
echo "<div class=\"button\"><a href=\"index.php\">home</a></div></div>";

?>

</div>

<?php 
include_once("tpl/footer.php"); 
?>


