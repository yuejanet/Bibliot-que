<?php
session_start();
$userid=$_SESSION['userid'];
require_once('connect.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>addbook</title>
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
<h1 style="text-align: center"><strong>Add book</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_book_doadd.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">ISBN</span><input name="nISBN" type="text" placeholder="please enter the ISBN" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Title</span><input name="ntitle" type="text" placeholder="please enter the title" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Author</span><input name="nauthor" type="text" placeholder="please enter the author" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Publisher</span><input name="npublish" type="text" placeholder="please enter the publisher" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">Sommaire</span><input name="nintroduction" type="text" placeholder="please enter the sommury" class="form-control"></div><br/>
			<div class="input-group"><span class="input-group-addon">classment</span>
                    
                    <select class="form-control mglf3" name=classe id="countySearch" style="width:160px;">
						
						<option value="0">Fiction</option>
						<option value="1">Historic</option>
						<option value="2">Novel</option>
						<option value="3">Autobiographies</option>
					</select>
				
            </div><br/><br/>
			<!--<span class="input-group-addon">Classment</span><input name="nclass" type="text" placeholder="choice the classment" class="form-control"></div><br/>-->
            <div class="input-group"><span class="input-group-addon">Status</span><input name="nstate" type="text" placeholder="please enter" class="form-control"></div><br/>
            <label><input type="submit" value="Add" class="btn btn-default"></label>
            <label><input type="reset" value="Reset" class="btn btn-default"></label>
        </div>
    </form>
</div>

</body>
</html>
