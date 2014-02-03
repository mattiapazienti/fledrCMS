<div class="edit">

<script type="text/javascript" src="plugins/niceEdit.latest.js"></script> 
<script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
</script>

<h1>Edit Post</h1>

<?php 

$on='edit';
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

echo "<form name=\"editor\" method=\"post\" action=\"index.php?p=success&post=$id&savedata=1\">
        <input type=\"hidden\" name=\"date\" maxlength=\"50\" value=\"$date\" />
        <label>title</label>
        <input type=\"text\" name=\"title\" maxlength=\"70\" value=\"$title\" />
   	<textarea cols=\"100\" rows=\"10\" name=\"text\">$text</textarea>	
	<br>
        <input type=\"submit\" name=\"submit\" class=\"button\" value=\"Submit\">
</form>";

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
if($success==true){ $_SESSION["saved"]=true; echo "<div class=\"message\">Your post has been modified</div>";}
die();
} else {}


?> 
    
</div>

