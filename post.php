    
<?php 
include_once("config.php");
include_once("tpl/header.php"); 

echo "<div id=\"content\" class=\"post\">";

$id = $_GET["post"];

//views
$views_file = "admin/views.txt";
$views = @fopen($views_file,"r") or die("Can not read the file"); 
$data = @fread($views, filesize($views_file));
fclose($views);

$v = explode("\n", $data);			
$tot_views = count($v)-1;

for ($i=0; $i<$tot_views; $i++){
        $view = $v[$i];
        $count = $view + 1; 
	if($i == $id) {	
		$new_data .=  $count . "\n";
		
	  }else{
	  
		$new_data .= $v[$i] . "\n";
	}
}

$reviews = @fopen($views_file,"w") or die("Can not write to file"); 
$success = fwrite($reviews, $new_data);
fclose($reviews);
if($success==true){ $_SESSION["saved"]=true;}

//posts
$fileName = "admin/posts.txt";
$file = fopen($fileName, 'r') or die("Error opening file");

$posts = array();

while (!feof($file)) {
   $posts[] = fgets($file);
}

fclose($file);

//calc

$tot_posts = count($posts)-1;


if($tot_posts){

$start = $tot_posts;
$end = 0;

for ($i = $start;  $i >= $end;  $i-- ) { 
    $content = explode("^", $posts[$i]);
    $date = $content[0];
    $title = $content[1];
    $text = $content[2];
    $pid = $i;

    if($title != '' && $i == $id) {   
        echo "<article class=\"id_$pid\"><div class=\"left\"><time>$date</time></div><div class=\"entry\"><h2>$title</h2><p>$text</p></div></article>";
    } else {
        continue;
    }
}    
    
}
else {

    echo "<div class=\"f_error\">No posts found</div>";

}

echo "<div class=\"button\"><a href=\"index.php\">home</a></div></div>";

include_once("tpl/footer.php"); 

?> 
    


