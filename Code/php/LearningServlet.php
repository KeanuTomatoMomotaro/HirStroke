<?php
//Servlet for Learning, in order
session_start();

//check if session is new, then start with index 1
//session start and start variable as 1, for A
if(is_null($_SESSION['oldAlphaOrder'])){
    $_SESSION['AlphabetOrder'] = 1;
    //redirect to continue learning pages
    header('Location:HirStrokeLearn.php');
}else if(htmlspecialchars($_GET['back'])==true && $_SESSION['oldAlphaOrder']==1){
    //if user reverses at A
    header('Location:destroySessionVar.php');
}
else if(htmlspecialchars($_GET['back'])==true){
    //decrease AlphabetOrder
    $_SESSION['AlphabetOrder']--;
    //redirect to continue learning pages
    header('Location:HirStrokeLearn.php');
}
else{
        //after a few letters, proceed to practice
        switch ($_SESSION['oldAlphaOrder']) {
            case 5:
                //redirect to controlled practice for A-O
                //set practice index to A if it is empty
                if (is_null($_SESSION['oldPracticeIndex'])) {
                    $_SESSION['practiceIndex'] = 1;
                } else {
                    //else iterate to O
                    $_SESSION['practiceIndex']++;
                }
                header('Location:HirStrokeControlledExercise.php');
                break;
            case 10:
                //redirect to controlled practice for KA-KO
                //set practice index to KA if it is empty
                if (is_null($_SESSION['oldPracticeIndex'])) {
                    $_SESSION['practiceIndex'] = 6;
                } else {
                    //else iterate to KO
                    $_SESSION['practiceIndex']++;
                }
                header('Location:HirStrokeControlledExercise.php');
                break;
            case 15:
                //redirect to controlled practice for SA-SO
                //set practice index to SA if it is empty
                if (is_null($_SESSION['oldPracticeIndex'])) {
                    $_SESSION['practiceIndex'] = 11;
                } else {
                    //else iterate to SO
                    $_SESSION['practiceIndex']++;
                }
                header('Location:HirStrokeControlledExercise.php');
                break;
            case 20:
                //redirect to controlled practice for TA-TO
                //set practice index to TA if it is empty
                if (is_null($_SESSION['oldPracticeIndex'])) {
                    $_SESSION['practiceIndex'] = 16;
                } else {
                    //else iterate to TO
                    $_SESSION['practiceIndex']++;
                }
                header('Location:HirStrokeControlledExercise.php');
                break;
            case 25:
                //redirect to controlled practice for NA-NO
                //set practice index to NA if it is empty
                if (is_null($_SESSION['oldPracticeIndex'])) {
                    $_SESSION['practiceIndex'] = 21;
                } else {
                    //else iterate to NO
                    $_SESSION['practiceIndex']++;
                }
                header('Location:HirStrokeControlledExercise.php');
                break;
            case 30:
                //redirect to controlled practice for HA-HO
                //set practice index to HA if it is empty
                if (is_null($_SESSION['oldPracticeIndex'])) {
                    $_SESSION['practiceIndex'] = 26;
                } else {
                    //else iterate to HO
                    $_SESSION['practiceIndex']++;
                }
                header('Location:HirStrokeControlledExercise.php');
                break;
            case 35:
                //redirect to controlled practice for MA-MO
                //set practice index to MA if it is empty
                if (is_null($_SESSION['oldPracticeIndex'])) {
                    $_SESSION['practiceIndex'] = 31;
                } else {
                    //else iterate to MO
                    $_SESSION['practiceIndex']++;
                }
                header('Location:HirStrokeControlledExercise.php');
                break;
            case 38:
                //redirect to controlled practice for YA-YO
                //set practice index to YA if it is empty
                if (is_null($_SESSION['oldPracticeIndex'])) {
                    $_SESSION['practiceIndex'] = 36;
                } else {
                    //else iterate to YO
                    $_SESSION['practiceIndex']++;
                }
                header('Location:HirStrokeControlledExercise.php');
                break;
            case 43:
                //redirect to controlled practice for RA-RO
                //set practice index to RA if it is empty
                if (is_null($_SESSION['oldPracticeIndex'])) {
                    $_SESSION['practiceIndex'] = 39;
                } else {
                    //else iterate to RO
                    $_SESSION['practiceIndex']++;
                }
                header('Location:HirStrokeControlledExercise.php');
                break;
            case 46:
                //redirect to controlled practice for WA-N
                //set practice index to WA if it is empty
                if (is_null($_SESSION['oldPracticeIndex'])) {
                    $_SESSION['practiceIndex'] = 44;
                }else{
                    //else iterate to N
                    $_SESSION['practiceIndex']++;
                }
                header('Location:HirStrokeControlledExercise.php');
                break;
           default:
                //increase AlphabetOrder
                $_SESSION['AlphabetOrder'] ++;
                //redirect to continue learning pages
                header('Location:HirStrokeLearn.php');
        }
}

exit();
?>