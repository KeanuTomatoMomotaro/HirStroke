<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../Resources/NoGuide/HI(no).png">  

    <title>HirStroke-Home</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">HirStroke</h3>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Hiragana Stroke Orders Puzzle Trainer</h1>
            <p class="lead">Learn and practice beginner Hiragana characters and stroke orders</p>
            <p>
<!--              Student Mode<br>-->
              <a href="LearningServlet.php" class="btn btn-lg btn-default">Lesson Mode</a>
            </p>
            <p>
<!--              Free Practice Mode<br>-->
              <a href="ExerciseServlet.php" class="btn btn-lg btn-default">Free Practice Mode</a>
            </p>
            <p>
<!--              How To<br>-->
              <a href="" data-toggle="modal" data-target="#myModal" class="btn btn-lg btn-default">How To</a>
            </p>
          </div>
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modes in HirStroke</h4>
                        </div>
                        <div class="modal-body">
                            <p>HirStroke is an application that aims to help you learn how to write Hiragana fun modes!</p>
                            <p>There are 2 modes in HirStroke,</p>
                            <p>Learning mode will guide you through the 46 basic Hiragana characters and its respective strokes.</p>
                            <p>After some learning guides, you'll have to train your memory by solving the character's stroke sequence</p>
                            <p>If you already know some Hiragana and want to jump right to the action, Free mode fires an endless supply of puzzles for you to solve!</p>
                            <p>There is no time or solve limit, keep solving the stroke orders to your hearts content!</p>
                            <p>So, what are you waiting for, pick a mode and lets get started!</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Got it!</button>
                        </div>
                    </div>

                </div>
            </div>

          <div class="mastfoot">
            <div class="inner">
              <p>Keanu Nurherbyanto 2017</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="../js/ie10-viewport-bug-workaround.js"></script> -->
  </body>
</html>
