<div class="about">
    <h1>About</h1>
<script type="text/javascript" src="plugins/niceEdit.latest.js"></script> 
<script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
</script>
    
<?php 

$on='about';
$savedata = $_REQUEST['savedata'];
$fileName = "about.txt";
$file = @fopen($fileName,"r") or die("Can not read the file"); 
$data = @fread($file, filesize($fileName));
fclose($file);
$bio = $data;



echo "<form name=\"editor\" method=\"post\" action=\"index.php?p=b_success&savedata=1\">
        <label>Write something about you here!</label>
   	<textarea cols=\"100\" rows=\"10\" name=\"bio\">$bio</textarea>	
	<br>
        <input type=\"submit\" name=\"submit\" class=\"button\" value=\"Submit\">
</form>";

$new_bio = $_POST['bio'];


if ($savedata == 1) {
$file = @fopen($fileName,"w") or die("Can not write to file"); 
$success = fwrite($file, $new_bio);
fclose($file);
if($success==true){ $_SESSION["saved"]=true; echo "<div class=\"message\">Content updated!</div>";}
die();
} else {}


?> 
    
</div>

