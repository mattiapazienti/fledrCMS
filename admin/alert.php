<div class="alert">
    <h1>Delete post</h1>
<?php 

$on='alert';

$postID = $_GET["post"];

echo "<div class=\"message\"><h5>Are you sure you want to delete this post?</h5>";
echo "<a href=\"delete.php?p=delete&post=$postID\">Yes</a><a href=\"index.php\">No</a></div>";



?>

</div>