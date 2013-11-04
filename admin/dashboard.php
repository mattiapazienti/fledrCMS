<div class="dashboard">
  
<ul>

<?php

$on='dashboard';
 
$fileName = "posts.txt";
$file = fopen($fileName, 'r') or die("Error opening file!");

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

    if($text != '' && $title != '') {   
        echo "<li class=\"post_id_$pid\"><time>$date</time><h2><a title=\"edit post\" href=\"index.php?p=edit&post=$pid\">$title</a></h2><div class=\"f_options\"><a class=\"f_delete\" title=\"delete post\" href=\"index.php?p=alert&post=$pid\">delete</a></div></li>";
    } else {
        continue;
    }
}    
    
}
else {

    echo "<li class=\"error\"><h5>No posts found</h5></li>";

}
 
?>
    
</ul>

</div>

