<?php
session_start();
$userid=$_SESSION['userid'];
include ('connect.php');

$bookid=$_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library|| borrow</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>

    </style>

</head>
<body>
<div style="padding: 180px 550px 10px;text-align: center">
<form  action="admin_book_jiechu.php?tsid=<?php echo $bookid; ?>" method="POST" class="bs-example bs-example-form" role="form">
    <div id="login">
        <div class="input-group"><span class="input-group-addon">Borrower</span><input  name="borrower" type="text" placeholder="Please enter your ID" class="form-control"></div><br><br>
        <input type="submit" value="borrow" class="btn btn-default">
    </div>
</form>
</div>
</body>
</html>
<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $jctsid=$_GET['tsid'];
        $reid=$_POST['borrower'];
        $sqlc="select emprininfo from student where SID={$reid}";
        $prec = oci_parse($conn, $sqlc);
		$resc = oci_execute($prec);
        $resultc=oci_fetch_array($resc);
        if($resultc['card_state']==1){

            $sqla="insert into emprininfo(ISBN,SID,ETIME,RTIME) values ({$jctsid},{$reid},NOW(),NULL);";
            $sqlb="UPDATE LIVRE set state=0 where ISBN={$jctsid};";
            $prea = oci_parse($conn, $sqla);
			$resa = oci_execute($prea);
			$preb = oci_parse($conn, $sqlb);
			$resb = oci_execute($preb);
            if($resa==1 && $resb==1)
                echo"<script>alert('SUCCES');window.location.href='admin_book.php'; </script>";
            else echo"<script>alert('FAILED！');window.location.href='admin_book.php'; </script>";
        }
      

    };

?>