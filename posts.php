
<nav>
    <div class="nav">
        <div class="pop">Popular Posts</div> 
        <div class="aut"><a href="about.php">About</a></div>
    </div>
</nav>    
<div id="content" class="entries">

<?php

//views
$views_file = "admin/views.txt";
$views = fopen($views_file, 'r') or die("Error opening file!");

$v = array();

while (!feof($views)) {
   $v[] = fgets($views);
}

fclose($views);

//posts
$fileName = "admin/posts.txt";
$file = fopen($fileName, 'r') or die("Error opening file!");

$posts = array();

while (!feof($file)) {
   $posts[] = fgets($file);
}

fclose($file);

//calc

$tot_posts = count($posts)-1;


if($tot_posts){
echo "<ul>";
    
$start = $tot_posts;
$end = 0;

    function rip_tags($string) { 
        $string = preg_replace ('/<[^>]*>/', ' ', $string); 
        $string = str_replace("\r", '', $string);    // --- replace with empty space
        $string = str_replace("\n", ' ', $string);   // --- replace with space
        $string = str_replace("\t", ' ', $string);   // --- replace with space
        $string = trim(preg_replace('/ {2,}/', ' ', $string));
        return $string; 
    }

for ($i = $start;  $i >= $end;  $i-- ) { 
    $content = explode("^", $posts[$i]);
    $vt = $v[$i];
    $date = $content[0];
    $title = $content[1];
    $text = $content[2];

    $text = rip_tags($text);
    
    $max_length = 500;
    if (strlen($text) > $max_length)
    {
        $offset = ($max_length - 3) - strlen($text);
        $text = substr($text, 0, strrpos($text, ' ', $offset)) . '...';
    }    
    $pid = $i;

    if($title != '') {   
        echo "<li class=\"id_$pid\" data=\"$vt\"><div class=\"left\"><time>$date</time><span><b class=\"views\">$vt</b> views</span></div><div class=\"entry\"><h2><a href=\"post.php?post=$pid\">$title</a></h2><p>$text</p></div></li>";
    } else {
        continue;
    }
}    
echo "</ul>";    
}
else {

    echo "<div class=\"f_error\">No posts found</p>";

}
 

?>

</div>
<script src="admin/plugins/sort.el.js"></script>
