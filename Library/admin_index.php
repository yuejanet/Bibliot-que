<?php
//session_start();
//$userid=$_SESSION['userid'];
include ('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{
            width: 100%;
            overflow: hidden;
            background: url("2.jpg") no-repeat;
            background-size:cover;
            color: black;
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


<h3 style="text-align: center"><?php echo $userid; ?>, welcome</h3>
<br/><br/><br/>
<h4 style="text-align: center">
    <?php
   // $sql="select count(*) num1 from student;";

   // $res=oci_parse($con,$sql);
   // $result=oci_fetch_array($res);
   // echo "图书馆当前共有图书{$result['num1']}本。";
    ?>
</h4>

<h4 style="text-align: center">
    <?php
    //$sqla="select count(*) num2 from reader_card;";

    //$resa=mysqli_query($dbc,$sqla);
    //$resulta=mysqli_fetch_array($resa);
    //echo "共有读者{$resulta['num2']}个。";

    ?>
</h4>
</body>
</html>