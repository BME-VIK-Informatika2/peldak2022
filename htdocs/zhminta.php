<HTML>
<HEAD>
<title>Ételek</title>
<?php
    if(isset($_GET["szin"]))
    {
        $szin = $_GET["szin"];
        echo "<link rel='stylesheet' href='$szin.css'>";
    }
?>
</HEAD>
<body>
<h1>NÉV: MINTA MÓKUS, NEPTUN: H69420</h1>
<table border=1>
<tr><th>Étel</th><th>Állatok száma</th></tr>

<?php 
if(!isset($_GET["fajta"])){
		die("nincs fajta");
}
$link = mysqli_connect("localhost", "root", "", "minta_zh") 
            or die("Kapcsolódási hiba: " . mysqli_error());

$escaped_fajta = mysqli_real_escape_string($link, $_GET["fajta"]);

$query = "SELECT etel.etel_nev AS etel_nev, COUNT(*) AS szam FROM kedvenc_etel "
."INNER JOIN etel ON (kedvenc_etel.etel_id = etel.id) "
."INNER JOIN allat ON (kedvenc_etel.allat_id = allat.id) "
."INNER JOIN faj ON (faj.id = allat.faj_id) "
."WHERE faj.faj_nev = '{$escaped_fajta}' "
."GROUP BY etel.id, etel.etel_nev "
."ORDER BY etel.etel_nev";

$result = mysqli_query($link, $query) or die(mysqli_error($link));

for($i =0; $row = mysqli_fetch_assoc($result); $i++) {
	$background = ($i % 2 == 0) ? '' : "style='background-color:grey' ";
    echo "<tr $background><td>".$row["etel_nev"]."</td><td>".$row["szam"]."</td></tr>";
}
mysqli_free_result($result);
mysqli_close($link);
?>

</table>
</body>
</HTML>
