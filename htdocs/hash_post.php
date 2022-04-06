<!DOCTYPE html> 
<html> 
    <head><title>Hash demo</title></head> 
    <body> 
<?php 
    if( isset( $_POST[ 'OriginalString' ] ) ) { 
        $OriginalString = $_POST[ 'OriginalString' ]; 
        $md5Hash = md5($OriginalString); 
        $sha1Hash = sha1($OriginalString); 
 
		echo('Original string: '.$OriginalString."<BR/>");
		echo('MD5 hash: '.$md5Hash."<BR/>");
		echo('SHA1 hash: '.$sha1Hash."<BR/>");
    } 
?>
        <form method="POST"> 
            Original String: <input type="text" name="OriginalString" /> <br /> 
            <input type="submit"/> 
        </form>
    </body> 
</html> 
