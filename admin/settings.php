<div class="settings">
    <h1>Settings</h1>
<?php 

$on='settings'; 

$savedata = $_REQUEST['savedata'];

echo "<form name=\"editor\" method=\"post\" action=\"index.php?p=done&savedata=1\">
        <label>password</label>
        <input type=\"password\" name=\"password\" maxlength=\"90\" value=\"$pass\" title=\"Your password\" />
        <label>blog title</label>
        <input type=\"text\" name=\"blogtitle\" maxlength=\"120\" value=\"$blog_title\"  title=\"Your blog title\" />
        <label>theme</label>    
        <select name=\"theme\"  title=\"Select a blog theme\">
          <option value=\"$theme\">$theme</option>
          <option value=\"black\">black</option>
          <option value=\"crimson\">crimson</option>
          <option value=\"deep_sky_blue\">deep sky blue</option>
          <option value=\"gold\">gold</option>
          <option value=\"white\">white</option>
          <option value=\"forestgreen\">forestgreen</option>
          <option value=\"fledr\">fledr</option>
        </select>
        <input type=\"submit\" name=\"submit\" class=\"button\" value=\"Submit\">
</form>";


$password = $_POST['password'];
$blogtitle = $_POST['blogtitle'];
$blogtheme = $_POST['theme'];

$config = '<?php   
$blog_title = "'. $blogtitle .'";
$pass = "'. $password .'";
$theme = "'. $blogtheme .'";
?>';

if ($savedata == 1) {
$fileName = "../config.php"; 
$file = @fopen($fileName,"w") or die("Can not write to file"); 
$success = fwrite($file, $config);
fclose($file);
if($success==true){ $_SESSION["saved"]=true;}
die();
} else {}


?> 
    
</div>


