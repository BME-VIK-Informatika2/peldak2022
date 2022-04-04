<html>
<head><title>Customer list</title><meta charset='UTF-8'/></head>
<body>
<H1>Following customers are in the database:</H1>
<TABLE border="1">
<TR><TD>ID</TD><TD>Name</TD><TD>Address</TD></TR>
<?php

	$mysqli = new mysqli("localhost", "root", "", "demowebshop");
	if ($mysqli->connect_errno) {
	    echo "<P/>Failed to connect to MySQL: (" .
			$mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	/* change character set to utf8 */
	  if (!$mysqli->set_charset("utf8")) {
		printf("Error loading character set utf8: %s\n", $mysqli->error);
	} else {
		/*printf("Current character set: %s\n", $mysqli->character_set_name());*/
	}

	$mysqli->real_query("SELECT ID,Nev,Cim FROM Vevo");
	$result = $mysqli->use_result();

	while ($row = $result->fetch_row()) {
		printf("<TR><TD>%s</TD><TD>%s</TD><TD>%s</TD></TR>\n",
			$row[0], $row[1], $row[2]);   
	}

    $result->close();
    $mysqli->close();
	?>
</TABLE>
</body>
</html>
