<html>
<head><title>Vevő lista</title></head>
<body>
<H1>Jelenleg ezek a vevők szerepelnek az adatbázisban:</H1>
<TABLE border="1" align="center">
<TR bgcolor="lightgrey"><TD>ID</TD><TD>Név</TD><TD>Cím</TD><TD>Törlés</TD></TR>
<?php
	$mysqli = new mysqli("localhost","root","","demowebshop");
	if($mysqli->connect_errno)
	{
		echo "MySQL hiba: " . $mysqli->connect_error . "<BR/>";
	}
 
	$mysqli->real_query("SELECT ID,Nev,Cim FROM Vevo");
	$result = $mysqli->use_result();
 
	$i = 0;
	while ($row = $result->fetch_row()) {
		$i++;
		if ($i % 2 == 0)
		{
			$bgcolor = "lightblue";
		}
		else
		{
			$bgcolor = "white";
		}
		$TorlesURL=sprintf("<A href=\"VevoTorlese.php?ID=%s\">Törlés</A>",$row[0]);
		printf("<TR bgcolor=\"%s\"><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD></TR>\n",
			$bgcolor, $row[0], $row[1], $row[2],$TorlesURL);   
	} 
 
	$result->close(); 
	$mysqli->close(); 
	?>
</TABLE>
</body>
</html>
