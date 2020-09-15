<?php
session_start();
$userid=$_SESSION['userid'];
include ('connect.php');

$bookid=$_GET['id'];
date_default_timezone_set("PRC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LIBRARY || RETURN</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

</body>
</html>

<?php

$sqle="select sernum from  lend_list where book_id={$bookid}";

$pre=oci_parse($conn,$sqle);
$resulte=oci_fetch_array($pre);

$sqlc="update lend_list set back_date=NOW() where sernum={$resulte['sernum']};";
$sqld="UPDATE book_info set state=1 where book_id={$bookid};";

$prec = oci_parse($conn, $sqlc);
$resc = oci_execute($prec);
$pred = oci_parse($conn, $sqld);
$resd = oci_execute($pred);


if($resc==1 && $resd==1)
echo"<script>alert('success！');window.location.href='admin_book.php'; </script>";
else echo"<script>alert('failed！');window.location.href='admin_book.php'; </script>";
?>