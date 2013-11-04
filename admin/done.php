

<?php 

$on='done'; 

include_once("tpl/header.php");
echo "<div class=\"content\"><h1>Settings</h1>";

$savedata = $_REQUEST['savedata'];

$password = $_POST['password'];
$blogtitle = $_POST['blogtitle'];
$blogtheme = $_POST['theme'];

$config = '<?php   
$blog_title = "'. $blogtitle .'";
$pass = "'. $password .'";
$theme = "'. $blogtheme .'";
?>';


if ($savedata == 1) {
$fileName = "../config.php"; 
$file = @fopen($fileName,"w") or die("Can not write to file"); 
$success = fwrite($file, $config);
fclose($file);
if($success==true){ $_SESSION["saved"]=true; echo "<div class=\"message\"><h5>Settings saved</h5> <a href=\"index.php\">Back to dashboard</a></div>";}
die();
} else {}
echo "</div>";
include_once("tpl/footer.php");

?> 
    


