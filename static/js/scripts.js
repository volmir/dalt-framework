
$(function() {
    
    var hint = $('#hint');
    $('span[data-hint]').on({
        mouseenter: function(){
             hint.html('<img src="/static/upload/' + $(this).data('hint') + '" border="0" alt="">').show();
        },
        mouseleave: function(){
            hint.hide();
        },
        mousemove: function(e){
            hint.css({top: e.pageY, left: e.pageX - 355});
        }
    });  
    
});