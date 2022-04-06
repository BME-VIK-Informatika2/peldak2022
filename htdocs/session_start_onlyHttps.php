<?php
if ($_SERVER["HTTPS"] != "on")
{
	header("Location: https://".$_SERVER["HTTP_HOST"].
		$_SERVER["REQUEST_URI"]);
	exit();
}
session_start();
$_SESSION['message']="Hello";
?>
<HTML>
<HEAD><TITLE>Session demo - start with https</TITLE></HEAD>
<BODY>
<H1>Starting the session and forcing https</H1>
<?php 
	echo "HTTPS status: ".$_SERVER["HTTPS"]."<BR/>";
	echo "Session message: ".$_SESSION['message']."<BR/>";
?>
<P/>
<A href="session_show.php">Link to show session status</A><BR/>
<A href="session_close.php">Link to close the session</A>
</BODY>
</HTML>
