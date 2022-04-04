<!DOCTYPE html> 
<html> 
    <head><title>Új vevő</title></head> 
    <body> 
<?php 
    if( isset( $_GET[ 'VevoNev' ] ) ) { 
        $VevoNev = $_GET[ 'VevoNev' ]; 
        $VevoCim = $_GET[ 'VevoCim' ]; 
 
		$mysqli = new mysqli("localhost","root","","demowebshop");
		if($mysqli->connect_errno)
		{
			echo "MySQL Fehler: " . $mysqli->connect_error . "<BR/>";
		}
 
        $query=sprintf("INSERT INTO Vevo(Nev, Cim) VALUES('%s','%s')" 
                        ,$VevoNev, $VevoCim );
		echo("SQL parancs: ".$query."<BR/>");
		$mysqli->query($query); 
		$mysqli->close(); 

		echo('Elmentve (GET-tel érkezett)');
    } 
?>
        <form method="GET"> 
            Név: <input type="text" name="VevoNev" /> <br /> 
            Cím: <input type="text" name="VevoCim" /> <br /> 
            <input type="submit"/> 
        </form>

		<A href="http://localhost/VevoLista_TorlesLinkkel.php">A vevő listához</A>
    </body> 
</html> 
