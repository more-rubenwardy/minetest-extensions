// get the slider's items
var current_id = 1;
var max = 3;

var looper = setInterval(slideRight, 5000);

function slideLeft(){
    $('#slide_'+current_id).fadeOut();

    current_id = current_id-1;

    if (current_id < 1){
        current_id = max;
    }

    $('#slide_'+current_id).fadeIn();
}

function slideRight(){

    $('#slide_'+current_id).fadeOut();

    current_id = current_id+1;

    if (current_id > max){
        current_id = 1;
    }

    $('#slide_'+current_id).fadeIn();
}

function buttonClick(direction){
    if (direction==1)
        slideLeft();
    else
        slideRight();

    window.clearInterval(looper);
}