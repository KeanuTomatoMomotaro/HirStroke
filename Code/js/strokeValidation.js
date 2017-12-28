/**
 * Created by Keanu on 3/3/2017.
 */
//inputted stroke
var x;
//expected stroke number
var y = 1;
//number of total strokes
var z;
//element of button
var buttonId;
//notifMessage
var divElement;


//function to validate strokes in controlled practice
function validateStrokeControlled(x,z,divElement,buttonId,popup){
    //validate
    //if x is not equal to current expected stroke
    if(x!=y){
        //output error message to divElement
        var notifMessage=document.getElementById(divElement);
        notifMessage.innerHTML='<div class="alert alert-danger fade in" role="alert"><p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>Wrong stroke order, please select the correct stroke for stroke number '+y+'</p></div>';
    }else if((x==y) && (y==z)){
        //output correct Message with link to divElement
        var notifMessage=document.getElementById(divElement);
        notifMessage.innerHTML='<div class="alert alert-success fade in" role="alert-link"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>All strokes are correct,</p><a href="ControlledPracticeServlet.php" class="alert-link">move to the next letter</a></div>';
        //output correct Message with link to modal
        var modal=document.getElementById(popup);
        modal.innerHTML='<div class="modal-dialog">'+
            '<!-- Modal content-->'+
            '<div class="modal-content">'+
            '<div class="modal-header">'+
            '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
            '<h4 class="modal-title">Good Job!</h4>'+
            '</div>'+
            '<div class="modal-body">'+
            '<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>All strokes are correct</p>'+
            '</div>'+
            '<div class="modal-footer">'+
            '<a href="ControlledPracticeServlet.php" class="alert-link"><button type="link" class="btn btn-success" >move to the next letter</button></a>'+
            '</div>'+
            '</div>'+
            '</div>';
        $('#'+popup).modal('show');
        //deactivate button or change style
        document.getElementById(buttonId).disabled = true;
    }//else if x is equal y
    else if (x==y){
        //output correct message to divElement
        var notifMessage=document.getElementById(divElement);
        notifMessage.innerHTML='<div class="alert alert-info fade in" role="alert"><p><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>Good Job, Select the next Stroke</p></div>';
        //increase expected input for next button
        y++;
        //deactivate button or change style
        document.getElementById(buttonId).disabled = true;
    }
}

//function to validate strokes in free practice
function validateStrokeFree(x,z,divElement,buttonId,popup){
    //validate
    //if x is not equal to current expected stroke
    if(x!=y){
        //output error message to divElement
        var notifMessage=document.getElementById(divElement);
        notifMessage.innerHTML='<div class="alert alert-danger fade in" role="alert"><p><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Wrong stroke order, please select the correct stroke for stroke number '+y+'</p></div>';
    }else if((x==y) && (y==z)){
        //output correct Message with link to divElement
        var notifMessage=document.getElementById(divElement);
        notifMessage.innerHTML='<div class="alert alert-success fade in" role="alert-link"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>All strokes are correct,</p><a href="ExerciseServlet.php" class="alert-link">move to the next letter</a></div>';
        //output correct Message with link to modal
        var modal=document.getElementById(popup);
        modal.innerHTML='<div class="modal-dialog">'+
            '<!-- Modal content-->'+
        '<div class="modal-content">'+
            '<div class="modal-header">'+
            '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
        '<h4 class="modal-title">Good Job!</h4>'+
        '</div>'+
        '<div class="modal-body">'+
            '<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>All strokes are correct</p>'+
        '</div>'+
        '<div class="modal-footer">'+
            '<a href="ExerciseServlet.php" class="alert-link"><button type="link" class="btn btn-success" >move to the next letter</button></a>'+
        '</div>'+
        '</div>'+
        '</div>';
        $('#'+popup).modal('show');
        //deactivate button or change style
        document.getElementById(buttonId).disabled = true;
    }//else if x is equal y
    else if (x==y){
        //output correct message to divElement
        var notifMessage=document.getElementById(divElement);
        notifMessage.innerHTML='<div class="alert alert-info fade in" role="alert"><p><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>Good Job, Select the next Stroke</p></div>';
        //increase expected input for next button
        y++;
        //deactivate button or change style
        document.getElementById(buttonId).disabled = true;
    }
}