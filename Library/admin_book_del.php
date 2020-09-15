<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

</body>
</html>
<?php
session_start();
$userid=$_SESSION['userid'];
include ('connect.php');


$delid=$_GET['id'];
$sqla="select state a from LIVRE where ISBN={$delid};";
$pre=oci_parse($conn,$sqla);
$resa=oci_execute()
$resulta=oci_fetch_array($resa);

if($resulta['a']==1) {
    $sql = "delete  from LIVRE where ISBN={$delid} ;";
	$pre=oci_parse($conn, $sql);
    $res = oci_execute($conn, $sql);

    if ($res == 1) {
        echo "<script>alert('DELECT SUCCESS！')</script>";
        echo "<script>window.location.href='admin_book.php'</script>";
    }
    else {
        echo "FAILED TO DELECT！";
        echo "<script>window.location.href='admin_book.php'</script>";
    }
}


?>
