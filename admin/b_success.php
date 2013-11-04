<?php $on='b_success'; include_once("tpl/header.php"); ?>

<div class="content">
    <h1>About</h1>
<?php

$on='about';
$savedata = $_REQUEST['savedata'];
$fileName = "about.txt";
$file = @fopen($fileName,"r") or die("Can not read the file"); 
$data = @fread($file, filesize($fileName));
fclose($file);
$bio = $data;


$new_bio = $_POST['bio'];


if ($savedata == 1) {
$file = @fopen($fileName,"w") or die("Can not write to file"); 
$success = fwrite($file, $new_bio);
fclose($file);
if($success==true){ $_SESSION["saved"]=true; echo "<div class=\"message\"><h5>Content updated!</h5> <a href=\"index.php\">back to dashboard</a></div>";}
die();
} else {}

?>

</div>

<?php include_once("tpl/footer.php"); ?> 

