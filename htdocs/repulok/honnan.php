<HTML>
<HEAD>
<title>Mi legyen a címe?</title>
<style>
body {
  background-image: url("https://www.google.hu/url?sa=i&url=https%3A%2F%2Fwww.imadomamacskam.hu%2Fcuki-kepek-alvo-macskakrol%2F&psig=AOvVaw1Da2m5wbpBpjUkIbaTw4CT&ust=1650977903908000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCLjbm46ir_cCFQAAAAAdAAAAABAD");
  background-repeat: repeat-xy;
}
</style>
</HEAD>
<body>
<h1>És itt mi legyen?</h1>
<form action="honnan.php" method="get">
<table>
<tr> 
<td>
Varos:
</td>
<td>
<input type="text" name="varos">
</td>
</tr>
<input type="submit" name="submit">
</form>
<?php

if(!isset($_GET["varos"])){
		die("nincs varos");
}
$link = mysqli_connect("localhost", "root", "", "repulok") 
            or die("Kapcsolódási hiba: " . mysqli_error());

$escaped_varos = mysqli_real_escape_string($link, $_GET["varos"]);

$query = "SELECT StartVaros.Nev FROM jarat "
."INNER JOIN Varos StartVaros ON (Jarat.StartVaros = StartVaros.ID) "
."INNER JOIN Varos CelVaros ON (Jarat.CelVaros = CelVaros.ID) "
."WHERE CelVaros.Nev = '$escaped_varos' ";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

echo "<table border=1>";
echo "<tr><th>Indulási város</th></tr>";
for($i =0; $row = mysqli_fetch_assoc($result); $i++) {
	$background = ($i % 2 == 0) ? '' : "style='background-color:grey' ";

echo "<tr $background><td>".$row["Nev"]."</td></tr>";
}
echo "</table>";

mysqli_free_result($result);
mysqli_close($link); 

?>
</body>
</html>
