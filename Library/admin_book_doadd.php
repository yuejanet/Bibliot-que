<?php
	require_once('connect.php');
	

	$nISBN = $_POST['nISBN'];
	$ntitle = $_POST['ntitle'];
	$nauthor = $_POST['nauthor'];
	$npublish= $_POST['npublish'];
	$nintrodu = $_POST['nintroduction'];
	$class=$_POST['class'];
	$status=String availble;
	
	
	if((!$nISBN==null)&&(!$ntitle==null){
		$insert="INSERT INTO LIVRE(ISBN,STATUS,TITRE,AUTHEUR,PUBLISHER,SOMMAIRE) values('".$nISBN."','".$status."','".$ntitle."','".$nauthor."','".$npublish."','".$nintrodu."')";
		$stid = oci_parse($conn, $insert);
		$r = oci_execute($stid);
		if($r){
			echo "<script>alert('reussi');window.location.href='admin_book.php'</script>";	
		}
			
	}else{
		echo "Failed!";
	}
?>