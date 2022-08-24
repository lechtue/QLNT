$(document).ready(function(){
    if($('html, body').scrollTop() < 10) {
        $('html, body').delay(100).animate({ scrollTop : 540}, 1000);
    }
});

