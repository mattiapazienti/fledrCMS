<?php 

$on='success';

include_once("tpl/header.php");
echo "<div class=\"content\"><h1>Edit post</h1>";

$savedata = $_REQUEST['savedata'];
$id = $_GET["post"];
$fileName = "posts.txt";
$file = @fopen($fileName,"r") or die("Can not read the file"); 
$data = @fread($file, filesize($fileName));
fclose($file);

$posts = explode("\n", $data);			
$tot_posts = count($posts)-1;

$content = explode("^", $posts[$id]);
$date = $content[0];
$title = $content[1];
$text = $content[2];

$new_date = $_POST['date'];
$new_title = $_POST['title'];
$new_text = $_POST['text'];
$new_text = str_replace("^", "°", $new_text);
$new_text = str_replace("\n", "<br>", $new_text);
$new_text = str_replace("\r", "", $new_text);

for ($i=0; $i<$tot_posts; $i++){

	if($i == $id) {	
	        
		$new_content .=  $new_date ."^". $new_title ."^". $new_text . "\n";
		
	  }else{
	  
		$new_content .= $posts[$i] . "\n";
	}
}
if ($savedata == 1) {
$file = @fopen($fileName,"w") or die("Can not write to file"); 
$success = fwrite($file, $new_content);
fclose($file);
if($success==true){ $_SESSION["saved"]=true; echo "<div class=\"message\"><h5>Post successfully modified</h5> <a href=\"index.php\">back to dashboard</a></div>";}
die();
} else {}

echo "</div>";
include_once("tpl/footer.php");

?> 

