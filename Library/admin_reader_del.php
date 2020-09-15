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
$sqla="select count(*) a from EMPRUNINFO where SID={$delid} and back_date is NULL;";
$prea=oci_parse($conn,$sqla);
$resa=oci_execute($prea);
$resulta=oci_fetch_array($resa);

if($resulta['a']==0) {
    $sqlB = "delete  from Student where SID={$delid} ;";
	$pre=oci_parse($conn, $sqlB);
    $resB = oci_execute($pre);


    if ($resa == 1 && $resb == 1) {
        echo "<script>alert('success！')</script>";
        echo "<script>window.location.href='admin_reader.php'</script>";
    }
    else {
        echo "failed！";
        echo "<script>window.location.href='admin_reader.php'</script>";
    }
}

?>
