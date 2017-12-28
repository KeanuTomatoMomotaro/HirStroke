<?php
session_start();

if($_SESSION['oldPracticeIndex']==46){
    header('Location:destroySessionVar.php');
}else {

//validate if practice finished or not
    $validation = checkIsPracticeFinished($_SESSION['oldPracticeIndex']);
    if ($validation == true) {
        //if true
        //add the AlphabetOrder and redirect to continue learning
        $_SESSION['AlphabetOrder']++;
        header('Location:HirStrokeLearn.php');
    } else {
        //else, if false redirect to LearningServlet to iterate practice variables
        header('Location:LearningServlet.php');
    }
}

//function for controlledPractice exit validation, checks if oldPractice
function checkIsPracticeFinished($v){
    switch($v){
        case 5:
            //unset practiceIndex session variable
            unset($_SESSION['practiceIndex']);
            //unset oldPracticeIndex session variable
            unset($_SESSION['oldPracticeIndex']);
            return true;
            break;
        case 10:
            //unset practiceIndex session variable
            unset($_SESSION['practiceIndex']);
            //unset oldPracticeIndex session variable
            unset($_SESSION['oldPracticeIndex']);
            return true;
            break;
        case 15:
            //unset practiceIndex session variable
            unset($_SESSION['practiceIndex']);
            //unset oldPracticeIndex session variable
            unset($_SESSION['oldPracticeIndex']);
            return true;
            break;
        case 20:
            //unset practiceIndex session variable
            unset($_SESSION['practiceIndex']);
            //unset oldPracticeIndex session variable
            unset($_SESSION['oldPracticeIndex']);
            return true;
            break;
        case 25:
            //unset practiceIndex session variable
            unset($_SESSION['practiceIndex']);
            //unset oldPracticeIndex session variable
            unset($_SESSION['oldPracticeIndex']);
            return true;
            break;
        case 30:
            //unset practiceIndex session variable
            unset($_SESSION['practiceIndex']);
            //unset oldPracticeIndex session variable
            unset($_SESSION['oldPracticeIndex']);
            return true;
            break;
        case 35:
            //unset practiceIndex session variable
            unset($_SESSION['practiceIndex']);
            //unset oldPracticeIndex session variable
            unset($_SESSION['oldPracticeIndex']);
            return true;
            break;
        case 38:
            //unset practiceIndex session variable
            unset($_SESSION['practiceIndex']);
            //unset oldPracticeIndex session variable
            unset($_SESSION['oldPracticeIndex']);
            return true;
            break;
        case 43:
            //unset practiceIndex session variable
            unset($_SESSION['practiceIndex']);
            //unset oldPracticeIndex session variable
            unset($_SESSION['oldPracticeIndex']);
            return true;
            break;
        case 46:
            //unset practiceIndex session variable
            unset($_SESSION['practiceIndex']);
            //unset oldPracticeIndex session variable
            unset($_SESSION['oldPracticeIndex']);
            return true;
            break;
        default:
            //practice checkpoint is not finished,
            return false;
    }
}
