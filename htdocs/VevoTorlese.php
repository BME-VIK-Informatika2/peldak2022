<HTML>
<HEAD><TITLE>Vevő törlése GET</TITLE>
</HEAD>
<BODY>

<?php
if(isset($_GET['ID']))
{
	echo "ID=" . $_GET['ID'] . " törlése!!! :) <BR/>";
	$VevoID = $_GET['ID'];
	
	$mysqli = new mysqli("localhost","root","","demowebshop");
	if($mysqli->connect_errno)
	{
		echo "MySQL hiba: " . $mysqli->connect_error . "<BR/>";
	}
	$query = sprintf("DELETE FROM Vevo WHERE ID=%s", $VevoID);
	echo "SQL parancs: ".$query."<BR/>";
	
	if(!$mysqli->query($query))
	{
		echo "Hiba a törlésnél! :(<BR/>Lehet érvényes megrendelése?<BR/>";
	}
	else
	{
		echo "Sikeres :)<BR/>";
	}
	$mysqli->close();
}
else
{
	echo "Nem érkezett Vevő ID a GET módszerrel... :(";
}
?>
<BR/><A href="http://localhost/VevoLista_TorlesLinkkel.php">Vissza a listához</A>
</BODY>
</HTML>
