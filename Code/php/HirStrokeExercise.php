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
$query = "SELECT `index`, `alphabetName`, `strokeNumb`, `alphaUrl`, `noUrl`, `strokesUrl` FROM `alphabet` WHERE `index` = ".$_SESSION['randomAlphIndex'].";";
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
//shuffle contents of strokeOrderExploded
shuffle($strokeOrderExploded);
//close connection
mysqli_close($conn);
//old alphabet for validation in servlet
//$_SESSION['oldAlphaOrder']=$_SESSION['randomAlphIndex'];

//store randomAlphIndex to array usedAlphaArray
array_push($_SESSION['usedAlphaArray'],$_SESSION['randomAlphIndex']);
//commented for debugging purposes echo "new used is ".end($_SESSION['usedAlphaArray']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>HirStroke Exercise - <?php echo $alphabet;?></title>
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
<!-- Fixed navbar for exercise -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Free Practice <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="../navbar/">Previous</a></li> -->
                <li><a href="" data-toggle="modal" data-target="#myModal">Help <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a></li>
                <li class=""><a href="destroySessionVar.php">Quit <span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<!-- <div class="container">
  used to be space for progress bar
</div> -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Free exercise guide</h4>
            </div>
            <div class="modal-body">
                <p>Click on the correct stroke sequence in the buttons below the Hiragana letter,</p>
                <p>try memorizing the correct stroke order for the Hiragana character shown here.</p>
                <p>After you've solved the correct stroke orders, click the link that sends you to the next page...</p>
                <p>There is no time or solve limit, keep solving the stroke orders to your hearts content!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Got it!</button>
            </div>
        </div>

    </div>
</div>
<!--modal for success-->
<div id="successModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    </div>
</div>
<!-- content -->
<div class="container">
    <div class="starter-template">
        <div class="panel panel-default">
<!--            <div class="progress">-->
<!--                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">-->
<!--                    60%-->
<!--                </div>-->
<!--            </div>-->
            <h1>Exercise Time!</h1>
            <h1>Enter the Strokes for <?php echo $alphabet;?></h1>
            <p class="lead">Below is a <?php echo $alphabet;?> Character</p>
            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <!--                    <button type="button" class="btn btn-default btn-lg"><a href="LearningServlet.php?back=true"><i class="glyphicon glyphicon-chevron-left"></i></a></button>-->
                </div>
                <div class="col-xs-4 col-md-4">
                    <div class="figure">
                        <img src="<?php echo $figureNoUrl;?>" alt="HiraganaChar" class="img-responsive center-block">
                    </div>
                </div>
                <div class="col-xs-4 col-md-4">
<!--                    <a href="ExerciseServlet.php"><button type="button" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-chevron-right"></i></button></a>-->
                </div>
            </div>
        </div>
        <p class="lead">Please click on the correct sequence of the character <?php echo $alphabet;?>'s stroke order</p>
        <!-- alerts and success messages-->
        <div id="alertSuccess"></div>
        <!--  end messages-->
        <!--        Button with pictures -->
        <div class="row">
            <?php
            if($strokeNumb=="4"){
                //if stroke numbers is 4
                //loop through the stroke orders and load layout for 4 and load layout
                for($i=0;$i<sizeof($strokeOrderExploded);$i++){
                    //get order from url file
                    $buttonOrder=substr($strokeOrderExploded[$i],-5,1);
                    ?>
                    <div class="col-xs-3 col-md-3">
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default" id="Button <?php echo $buttonOrder;?>" onclick="validateStrokeFree(<?php echo $buttonOrder;?>,<?php echo $strokeNumb;?>,'alertSuccess','Button <?php echo $buttonOrder;?>','myModal')"><img class="img-responsive center-block" src="<?php echo $strokeOrderExploded[$i];?>" alt="HiraganaOrder" ></button>
                            </div>
                        </div>
                    </div>
                    <?php
                    //end for
                }
            }//end if
            elseif($strokeNumb=="3"){
                //if stroke number is 3
                //loop through the stroke orders and load layout for 3
                for($i=0;$i<sizeof($strokeOrderExploded);$i++){
                    //get order from url file
                    $buttonOrder=substr($strokeOrderExploded[$i],-5,1);
                    ?>
                    <div class="col-xs-4 col-md-4">
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default" id="Button <?php echo $buttonOrder;?>" onclick="validateStrokeFree(<?php echo $buttonOrder;?>,<?php echo $strokeNumb;?>,'alertSuccess','Button <?php echo $buttonOrder;?>','myModal')"><img class="img-responsive center-block" src="<?php echo $strokeOrderExploded[$i];?>" alt="HiraganaOrder" ></button>
                            </div>
                        </div>
                    </div>
                    <?php
                    //end for
                }
            }//end if
            elseif($strokeNumb=="2"){
                //if stroke number is 2
                //loop through the stroke orders and load layout for 2
                for($i=0;$i<sizeof($strokeOrderExploded);$i++){
                    //get order from url file
                    $buttonOrder=substr($strokeOrderExploded[$i],-5,1);
                    ?>
                    <div class="col-xs-6 col-md-6">
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default" id="Button <?php echo $buttonOrder;?>" onclick="validateStrokeFree(<?php echo $buttonOrder;?>,<?php echo $strokeNumb;?>,'alertSuccess','Button <?php echo $buttonOrder;?>','myModal')"><img class="img-responsive center-block" src="<?php echo $strokeOrderExploded[$i];?>" alt="HiraganaOrder" ></button>
                            </div>
                        </div>
                    </div>
                    <?php
                    //end for
                }
            }//end if
            elseif($strokeNumb=="1"){
                //if stroke number is 1
                //loop through the stroke orders and load layout for 1
                for($i=0;$i<sizeof($strokeOrderExploded);$i++){
                    //get order from url file
                    $buttonOrder=substr($strokeOrderExploded[$i],-5,1);
                    ?>
                    <div class="col-xs-12 col-md-12">
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default" id="Button <?php echo $buttonOrder;?>" onclick="validateStrokeFree(<?php echo $buttonOrder;?>,<?php echo $strokeNumb;?>,'alertSuccess','Button <?php echo $buttonOrder;?>','myModal')"><img class="img-responsive center-block" src="<?php echo $strokeOrderExploded[$i];?>" alt="HiraganaOrder" ></button>
                            </div>
                        </div>
                    </div>
                    <?php
                    //end for
                }
            }//end if
            ?>
        </div>
        <!--/row-->
    </div><!-- starter template -->
</div><!-- /.container -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
<!--include validation javascript-->
<script src="../js/strokeValidation.js"></script>
</body>
</html>
