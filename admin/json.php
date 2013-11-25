<div class="json">
    <h1>Convert to Json</h1>    
<?php
$on='json';

$savedata = $_REQUEST['savedata'];

if ($savedata == 1){ 

$fileName = "posts.txt";
$file = @fopen($fileName,"r") or die("Can not read the file"); 
$data = @fread($file, filesize($fileName));
fclose($file);

$posts = explode("\n", $data);			
$tot_posts = count($posts)-1;



for ($i=0; $i<$tot_posts; $i++){
    $content = explode("^", $posts[$i]);
    $date = $content[0];
    $title = $content[1];
    $text = $content[2];
    $slug = str_replace(" ", "-", $title);
    $slug = strtolower($slug);
    $arr = array('slug' => $slug, 'date' => $date, 'title' => $title, 'text' => $text);
    $package = json_encode($arr);
    $new_content .=  "\n" . $package . ",";
}


$new_content = substr($new_content, 0, -1);

$new_data = '[' . $new_content . ']';
$fp = fopen('posts.json', 'w');
fwrite($fp, $new_data);
fclose($fp);    
     
echo "<div class=\"message\"><h5>Posts correctly converted</h5> <a href=\"index.php\">back to dashboard</a></div>";

} else {

   
    
}


?>
    
    
<div class="message" style="background:#ddd !important"><h5>Convert your posts to json</h5></div>  
<form action="index.php?p=json&savedata=1" method="post">
<input type="submit" class="button" name="submit" value="Convert">
</form>

</div>


