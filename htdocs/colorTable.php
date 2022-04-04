<html>
<head><title>Colorful table</title></head>
<body>
<H1>This is a colorful table</H1>
<TABLE border="1">
<TR bgcolor="lightgrey"><TH>Font size</TH><TH>Background color</TH><TH>Text color</TH></TR>
<?php
	for($fs=1; $fs<=10; $fs++)
	{
		if ($fs % 2 == 1)
		{
			$bc="lightblue";
			$fc="black";
		}
		else
		{
			$bc="blue";
			$fc="red";
		}
		
		printf("<TR bgcolor='$bc'><TD><FONT color='$fc' size='$fs'>$fs</FONT>".
			"</TD><TD><FONT color='$fc' size='$fs'>$bc</FONT></TD>".
			"<TD><FONT color='$fc' size='$fs'>$fc</FONT></TD></TR>\n");
	}
?>
</TABLE>
</body>
</html>
