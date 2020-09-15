<?php	
    $conn = oci_connect('c##yue','123456','localhost:1521/ORCL.UNICE.FR');
if (!$conn) {
  $e = oci_error();
  print htmlentities($e['message']);
  exit;
}
?>