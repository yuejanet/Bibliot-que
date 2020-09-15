<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
</body>
</html>

<?php
include ('connect.php');
//include ('waf.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acco = $_POST["username"];
    $pw = $_POST["passwd"];
  
}
$adsql="select * from ADMINISTRATUER where AID={$acco} and APWD=md5('{$pw}')";
$adres=oci_parse($conn,$adsql);
oci_execute($adres);
$row = oci_fetch_array($adres);  
session_start();
//if(strtolower($_SESSION["captcha"]) == strtolower($captcha))
//{
if (($row['APWD'] == $pw)&&($row['AID'] == $acco) ){
	
        session_start();
        $_SESSION['userid'] = $acco;
		oci_free_statement($result);
        oci_close($con);
 
        echo "<script>window.location='admin_index.php'</script>";
    }
    else {
		echo $row['APWD'];
       //echo "<Script language='JavaScript'> alert('Password error!');</Script>";
        oci_free_statement($result);
        oci_close($con);
        echo "<script>location.href='index.php'</script>";
		

    }
//}

?>