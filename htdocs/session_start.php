<?php
session_start();
$_SESSION['message']="Hello";
?>
<HTML>
<HEAD><TITLE>Session demo - start with https</TITLE></HEAD>
<BODY>
<H1>Starting the session</H1>
<?php 
	echo "Session message: ".$_SESSION['message']."<BR/>";
?>
<P/>
<A href="session_show.php">Link to show session status</A><BR/>
<A href="session_close.php">Link to close the session</A>
</BODY>
</HTML>
