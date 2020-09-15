<?php
	require_once('connect.php');
	
	$pre = oci_parse($conn, "SELECT * FROM LIVRE");
	$res=oci_execute($pre,OCI_DEFAULT);
        //while($row = $pre->fetch(PDO::FETCH_ASSOC)){
	while($row = oci_fetch_row($res)){
		$data[]=$row;
	}           
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library || book management</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{
            width: 100%;
            height:auto;

        }
        #query{
            text-align: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Admin system</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="admin_index.php">HOME</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Book management<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_book.php">All books</a></li>
                        <li><a href="admin_book_add.php">Add books</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reader management<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_reader.php">All reader</a></li>
                        <li><a href="admin_reader_add.php">Add reader</a></li>
                    </ul>
                </li>
                <li><a href="admin_borrow_info.php">Borrow/Return management</a></li>
              
                <li><a href="index.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1 style="text-align: center"><strong>All Books</strong></h1>
<form  id="query" action="admin_book.php" method="POST">
    <div id="query">
        <label ><input  name="bookquery" type="text" placeholder="please input ISBN or title" class="form-control"></label>
        <input type="submit" value="research" class="btn btn-default">
    </div>
</form>

<table  width='100%' class="table table-hover">
    <tr>
        <th>Title</th>
        <th>Status</th>
        <th>Author</th>
        <th>Publisher</th>
        <th>ISBN</th>
        <th>Summery</th>
        <th>Classment</th>
        <th>Operation</th>
        <th>Operation</th>
        <th>Operation</th>
      
    </tr>
    <?php
		require_once('connect.php');
	
	$pre = oci_parse($conn, "SELECT * FROM LIVRE");
	
	$res=oci_execute($pre,OCI_DEFAULT);
	$row = oci_fetch_row($pre);
        //while($row = $pre->fetch(PDO::FETCH_ASSOC)){
	//while($row = oci_fetch_row($pre)){
		//$data[]=$row;
		//echo "<td>{$data['i']}</td>";
	//}     

  // if ($_SERVER["REQUEST_METHOD"] == "POST")
    //{
    //$gjc = $_POST["bookquery"];

       // $sql="select ISBN,TITRE,from LIVRE,CLASSMENT where LIVRE.class_id=CLASSMENT.class_id and ( name like '%{$gjc}%' or book_id like '%{$gjc}%')  ;";

    //}
    //else{
      //  $sql="select book_id,name,author,publish,ISBN,introduction,language,price,pubdate,book_info.class_id,class_name,pressmark,state from book_info,class_info where book_info.class_id=class_info.class_id ;";
   // }

   // $stid=oci_parse($conn,$sql);
	//$rowbook=oci_fetch_array($adres);
	//$res=oci_execute($stid);

    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['book_id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['author']}</td>";
        echo "<td>{$row['publish']}</td>";
        echo "<td>{$row['ISBN']}</td>";
        echo "<td>{$row['introduction']}</td>";
      
         if($row['status']==1) echo "<td>avilable</td>"; else if($row['state']==0) echo "<td>inavilable</td>";else  echo "<td>无状态信息</td>";
        echo "<td><a href='admin_book_edit.php?id={$row['book_id']}'>Modify</a></td>";
        echo "<td><a href='admin_book_del.php?id={$row['book_id']}'>Delect</a></td>";
        if($row['state']==1)echo "<td><a href='admin_book_jiechu.php?id={$row['book_id']}'>借阅</a></td>";
        if($row['state']==0)echo "<td><a href='admin_book_guihuan.php?id={$row['book_id']}'>归还</a></td>";
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>