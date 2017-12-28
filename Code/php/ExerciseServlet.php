<?php
//Servlet for Exercise Random

//session start
session_start();
if(!$_SESSION['usedAlphaArray']){
//get a random value between 1 to 46 inclusive, randomize for letter index
$_SESSION['randomAlphIndex']=mt_rand(1,46);
//set array to store collection of old indexes
$_SESSION['usedAlphaArray']=array();
}else{
//get a random value excluding the one previous
while(in_array(($_SESSION['randomAlphIndex']=mt_rand(1,46)), $_SESSION['usedAlphaArray']));
//if usedAlphaArray is full, reset
    if(sizeof($_SESSION['usedAlphaArray'])==46){
        //delete array
        unset($_SESSION['usedAlphaArray']);
        //reinstantiate
        $_SESSION['usedAlphaArray']=array();
    }
}
//redirect to php exercise page
header('Location:HirStrokeExercise.php');
exit();
?>