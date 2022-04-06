<?php session_start();
?>
<HTML>
<HEAD><TITLE>Session demo - closing</TITLE></HEAD>
<BODY>
<H1>Closing the session</H1>
<?php
	if (!isset($_SESSION['message']))
	{
		echo "No session to close (message is empty)...<BR/>";
	}
	else
	{
		unset($_SESSION['message']);
		if (isset($_SESSION['message']))
		{
			echo "I am unable to close this session... :(";
		}
		else
		{
			echo "<H1>Muhahaha.... this session is now closed!!!</H1><BR/>";
		}
	}
?>
<P/>
<A href="session_start.php">Link to start the session</A><BR/>
<A href="session_start_onlyHttps.php">Link to a secure session</A><BR/>
<A href="session_show.php">Link to show the session status</A><BR/>
</BODY>
</HTML>
