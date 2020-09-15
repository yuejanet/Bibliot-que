<?php
session_start();
$userid=$_SESSION['userid'];
include ('connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>add reaser</title>
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
<h1 style="text-align: center"><strong>Insert reader</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_reader_add.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group">
                <span class="input-group-addon">Reader ID</span>
                <input name="nid" type="text" placeholder="Please input id" class="form-control">
            </div><br/>
            <div class="input-group">
                <span class="input-group-addon">Name</span>
                <input name="nname" type="text" placeholder="Please input name " class="form-control">
            </div><br/>
			<span class="input-group-addon">Password</span>
                <input name="pwd" type="text" placeholder="Please input name " class="form-control">
            </div><br/>
			
           

            <input type="submit" value="add" class="btn btn-default">
            <input type="reset" value="reset" class="btn btn-default">
        </div>
    </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nnid = $_POST["nid"];
    $nnam= $_POST["nname"];
	$npwd=$_POST["pwd"];


    $sqlb="insert into STUDENT (SID,sname,SPWD) VALUES($nnid ,'{$nnam}','{$pwd}';";
   
	$preb=oci_parse($conn,$sqlb)
    $resb=oci_execute($preb);

    if($resb==1)
    {

        echo "<script>alert('seccess')</script>";
        echo "<script>window.location.href='admin_reader.php'</script>";

    }
    else
    {
        echo "<script>alert('failed! Try it again');</script>";

    }

}

?>
</body>
</html>
