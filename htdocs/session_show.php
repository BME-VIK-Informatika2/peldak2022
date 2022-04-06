<?php session_start(); ?>
<HTML>
<HEAD><TITLE>Session demo - show status</TITLE></HEAD>
<BODY>
<H1>Showing the session status</H1>
<?php 
	if (isset($_SESSION['message']))
	{
		echo "Session message: ".$_SESSION['message']."<BR/>";
	}
	else
	{
		echo "I could not find an open session... :(<BR/>";
	}
?>
<P/>
<A href="session_start.php">Link to start the session</A><BR/>
<A href="session_start_onlyHttps.php">Link to a secure session</A><BR/>
<A href="session_close.php">Link to close the session</A><BR/>
</BODY>
</HTML>
