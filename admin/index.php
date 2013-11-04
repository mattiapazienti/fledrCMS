<!-- INDEX ADMIN -->
<?php
include_once("../config.php");
include_once("login.php");

$area = (isset( $_GET['p']) && !empty($_GET['p'])) ? $_GET['p'] : 'dashboard';

$area = str_replace("/","", $area);
$area = str_replace("\\","", $area);
$area = preg_replace('/[^-a-zA-Z0-9_]/', '', $area);
$area = htmlspecialchars($area, ENT_QUOTES, 'UTF-8');

ob_start();

include("$area.php");

$content = ob_get_contents();

ob_end_clean();

include("tpl/header.php");

echo "<div class=\"content\">";

echo $content;

echo "</div>";

include("tpl/footer.php"); 

?>

