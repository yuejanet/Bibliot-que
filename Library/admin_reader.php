<?php
session_start();
$userid=$_SESSION['userid'];
include ('connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>user management</title>
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
nav class="navbar navbar-default navbar-static-top" role="navigation">
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
<h1 style="text-align: center"><strong>all reader</strong></h1>
<form  id="query" action="admin_reader.php" method="POST">
    <div id="query">
        <label ><input  SNAME="readerquery" type="text" placeholder="Please input reader SNAME or SID" class="form-control"></label>
        <input type="submit" value="research" class="btn btn-default">
    </div>
</form>
<table  width='100%' class="table table-hover">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>DEPARTEMENT</th>
        <th>SPWD</th>
        <th>OPERATION</th>
        <th>OPERATION</th>
    </tr>
    <?php



    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $gjc = $_POST["readerquery"];

        $sql="select STUDENT.SID, STUDENT.SNAME,DEPARTEMENT,STATUS from STUDENT where STUDENT.SID=reader_card.SID and (SSNAME like '%{$gjc}%' or SID like '%{$gjc}%') ;";

    }
    else{
        $sql="select STUDENT.SID, STUDENT.SNAME, DEPARTEMENT, STATUS from STUDENT where STUDENT.SID = reader_card.SID";
    }

	$pre=oci_parse($conn,$sql)
    $res=oci_execute($pre);
    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['SID']}</td>";
        echo "<td>{$row['SSNAME']}</td>";
        echo "<td>{$row['SPWD']}</td>";
        echo "<td>{$row['DEPARTEMENT']}</td>";
        echo "<td>{$row['STATUS']}</td>";
        
    };
    ?>
</table>
</body>
</html>