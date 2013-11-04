
<script type="text/javascript" src="plugins/niceEdit.latest.js"></script> 
<script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
</script>

<div class="new">
    <h1>New post</h1>    
<?php
$on='new';

$savedata = $_REQUEST['savedata'];
$text = $_POST['text'];
$text = str_replace("\n", "", $text);
$text = str_replace("^", "°", $text);
$text = str_replace("<article>", "<span>", $text);
$text = str_replace("</article>", "</span>", $text);
$text = str_replace("<p>", "<span>", $text);
$text = str_replace("</p>", "</span>", $text);
$text = str_replace("\r", "", $text);
$title = $_POST['title'];
if ($savedata == 1 && $_POST['title'] != '' && mb_strpos($title, '<') === FALSE AND mb_strpos($title, '>') === FALSE){ 
$postdate = date("<b>d</b> M Y"); 
$data = "$postdate ^" . $_POST['title'];
$data .= "^" . $text . "\n";
$fileName = "posts.txt"; 
$views_file = "views.txt";
$count = "0 \n";

$view = fopen($views_file, "a") or die("Can not open file");
fwrite($view, $count) or die("Can not write to file"); 

$file = fopen($fileName, "a") or die("Can not open file");
fwrite($file, $data) or die("Can not write to file"); 

fclose($file); 
echo "<div class=\"message\"><h5>Post successfully created</h5> <a href=\"index.php\">back to dashboard</a></div>";

} else {

   
    
}


?>
    
<form action="index.php?p=new&savedata=1" method="post">
<label>title</label><input type="text" name="title" value="title" onblur="if(this.value=='') { this.value='title'; } return false;" onfocus="this.value=''" value="title"><br>
<label>text</label><br> <textarea name="text" rows="5" cols="30"></textarea><br>
<input type="submit" class="button" name="submit" value="Submit">
</form>

</div>