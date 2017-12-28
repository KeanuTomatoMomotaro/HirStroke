<?php
//start session
session_start();
//database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hirstroke";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//get Data
$query = "SELECT `index`, `alphabetName`, `strokeNumb`, `alphaUrl`, `noUrl`, `strokesUrl` FROM `alphabet` WHERE `index` = ".$_SESSION['AlphabetOrder'].";";
$result = $conn->query($query);
$resultSet =  $result->fetch_assoc();

//store to variables
$alphabet = $resultSet["alphabetName"];
$strokeNumb = $resultSet["strokeNumb"];
$figureUrl = $resultSet["alphaUrl"];
$figureNoUrl = $resultSet["noUrl"];
$strokeUrl = $resultSet["strokesUrl"];
//explode urls of stroke orders
$strokeOrderExploded = explode(";",$strokeUrl);

//close connection
mysqli_close($conn);
//old alphabet for validation in servlet
$_SESSION['oldAlphaOrder']=$_SESSION['AlphabetOrder'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>HirStroke Learn - <?php echo $alphabet;?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- custom css-->
    <link rel="stylesheet" href="../css/myStylesheet.css">
    <!-- Custom menubar -->
    <link href="../css/navbar-fixed-top.css" rel="stylesheet">
    <!-- icon -->
    <link rel="icon" href="../../Resources/NoGuide/HI(no).png">
</head>
<body>
<!-- Fixed navbar  for example page-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Learn <span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
<!--                <li><a href="LearningServlet.php?back=true"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Previous</a></li>-->
                <li><a href="#" data-toggle="modal" data-target="#myModal">Help <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a></li>
                <li class=""><a href="destroySessionVar.php">Quit <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Learning Guide</h4>
            </div>
            <div class="modal-body">
                <p>You will be shown a Hiragana character with its sequence of correct stroke order.</p>
                <p>Try visualizing yourself writing the character with the stroke flow shown below the letter.</p>
                <p>Also, try memorizing the letter's pronounciation, to help you understand the character</p>
                <p>However, dont stress about the details right now because we'll help you remember about the details later.</p>
                <p>Click on the arrows next to the letters to navigate throughout the whole alphabet.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Got it</button>
            </div>
        </div>

    </div>
</div>
<!--content-->
<div class="container">
    <div class="starter-template">
        <div class="panel panel-default">
            <h1>Stroke Orders</h1>
            <p class="lead">Below is the <?php echo $alphabet;?> Hiragana Character</p>
            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <a href="LearningServlet.php?back=true"><button type="button" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-chevron-left"></i></button></a>
                </div>
                <div class="col-xs-4 col-md-4">
                    <div class="figure">
                        <img src="<?php echo $figureUrl;?>" alt="HiraganaChar" class="img-responsive center-block">
                    </div>
                </div>
                <div class="col-xs-4 col-md-4">
                    <a href="LearningServlet.php"><button type="button" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-chevron-right"></i></button></a>
                </div>
            </div>

        </div>
        <p class="lead">Below is its correct stroke order</p>
        <!--        Button with pictures -->
        <div class="row">
            <?php
            if($strokeNumb=="4"){
                //if stroke numbers is 4
                //loop through the stroke orders and load layout for 4 and load layout
                for($i=0;$i<sizeof($strokeOrderExploded);$i++){?>
                    <div class="col-xs-3 col-md-3"><div class="thumbnail"><img src="<?php echo $strokeOrderExploded[$i];?>" alt="HiraganaOrder" ></div></div>
                    <?php
                    //end for
                }
            }//end if
            elseif($strokeNumb=="3"){
            //if stroke number is 3
            //loop through the stroke orders and load layout for 3
            for($i=0;$i<sizeof($strokeOrderExploded);$i++){?>
                <div class="col-xs-4 col-md-4"><div class="thumbnail"><img src="<?php echo $strokeOrderExploded[$i];?>" alt="HiraganaOrder" ></div></div>
                <?php
                //end for
                }
            }//end elseif
            elseif($strokeNumb=="2"){
                //if stroke numbers is 2
                //loop through the stroke orders and load layout for 2
                for($i=0;$i<sizeof($strokeOrderExploded);$i++){?>
                    <div class="col-xs-6 col-md-6"><div class="thumbnail"><img src="<?php echo $strokeOrderExploded[$i];?>" alt="HiraganaOrder" ></div></div>
                    <?php
                    //end for
                }
            }//end elseif
            elseif($strokeNumb=="1"){
                //if stroke numbers is 1
                //loop through the stroke orders and load layout for 1
                for($i=0;$i<sizeof($strokeOrderExploded);$i++){?>
                    <div class="col-xs-12 col-md-12"><div class="thumbnail"><img src="<?php echo $strokeOrderExploded[$i];?>" alt="HiraganaOrder" ></div></div>
                    <?php
                    //end for
                }
            }//end elseif
            ?>
        </div>
        <!--/row-->
    </div><!-- starter template -->
</div><!-- /.container -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>