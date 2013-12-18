<?php

ob_start();
session_start();

//vars
$session = 40000; $hash = Array();$hash[] = sha1($pass);$f_limit = 4; $session_expires = $_SESSION["f_session_expires"]; $f_limit++;

//create cookie
if(isset($_COOKIE["f_password"])){$_SESSION["f_password"] = $_COOKIE['f_password'];}

//login encrypt password with sha1
if(!empty($_POST["f_password"])){
        if(in_array(sha1($_POST["f_password"]), $hash) ){                    
		$_SESSION["f_password"] = sha1($_POST["f_password"]);
		setcookie ("f_password", sha1($_POST["f_password"]), time()+3600*24*7,'/');
		header("Location: index.php");
		die();		
	} else {
		
	}	
}

//attempts to 0
if(empty($_SESSION["f_attempts"])){$_SESSION["f_attempts"] = 0;}
if(($session > 0 && !empty($session_expires) && time() > $session_expires) || empty($_SESSION["f_password"]) || !in_array($_SESSION["f_password"],$hash)) {	
	if(!in_array($_SESSION["f_password"],$hash)){	
		$_SESSION["f_attempts"]++;				
	}
	$_SESSION["f_session_expires"] = "";
?>

<?php include_once("tpl/login_header.php"); ?>
<div class="content">
        <div class="f_login">  
            <div class="fledrLogo">fledr</div>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="login" id="login">
                <?php           
                    if($ins_limit > 1 && $_SESSION["f_attempts"] >= $ins_limit){
	                echo "<p class=\"error\">You have 0 out of $ins_limit attempts left.</p>";
	            }
                    if (!empty($_POST["f_password"]) && !in_array(\sha1($_POST["f_password"]), $hash))
                        echo "<p class=\"error\">sorry, wrong password!</p>"; 
                ?>
                <input type="password" name="f_password" placeholder="password" size="25" />
                <button class="button">login</button>
            </form>
        </div>
</div>
<?php 
include_once("tpl/footer.php");
exit(); }
$_SESSION["f_attempts"] = 0;
$_SESSION["f_session_expires"] = time()+$session;
?>
