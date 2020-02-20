<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

# 1 
$host = "localhost";
$user = "pw";
$password = "pw";
$database = "nwind";
$link = mysqli_connect($host, $user, $password, $database);
?>

<html>

    <head>
        <title>Template Bootstrap</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Brand</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>


        <div class="container">
            <div class="row">
                <div class="col-sm-3">

                    <div class="btn-group-vertical" role="group" aria-label="...">

                        <?php
                        
                        $c = $_GET["cid"];
                        $sql = "select * from categories";
                        $result = mysqli_query($link, $sql);

                        while ($row = mysqli_fetch_object($result)) {
                            $x = "";
                            if($row->CategoryID == $c)
                                $x = "active";
                            
                            
                            
                            ?>

                            <a class="btn btn-default <?=$x?>" href="products.php?cid=<?= $row->CategoryID ?>"><?= $row->CategoryName ?></a>
                            <?php
                        }
                        ?>




                    </div>


                </div>
                <div class="col-sm-9">


                    <table class="table table-striped">
<?php
# 2
$c = $_GET["cid"];
$sql = "select * from products where CategoryID = $c";
$result = mysqli_query($link, $sql);

# 3
while ($row = mysqli_fetch_object($result)) {
    #print "<pre>";
    #var_dump($row);
    #print "<br>";
    ?>

                            <tr>
                                <td><?= $row->ProductID ?></td>
                                <td><?= $row->ProductName ?></td>
                                <td><?= $row->UnitPrice ?></td>
                            </tr>

    <?php
    #print "PID: " . $row->ProductID;
    ##print "<br>";
    #print "Nama produk: " . $row->ProductName;
    #print "<br>";
    #print "Harga: " . $row->UnitPrice;
    #print "<br>";
    #print "------------------------------------------------<br>";
}
?>     



                    </table>






                </div>

            </div>
        </div>








    </body>
    <script src="bootstrap/js/jquery.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>

</html>




