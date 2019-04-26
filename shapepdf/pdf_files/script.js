$(document).ready(function() {
    // Rotation step must be always positive and between 0 and 360;
    // Give models the .model class for easier access and filtering
    $('#rotation_step').bind("propertychange keyup input paste", function(e){
        // only digits
        $(this).val($(this).val().replace(/[^\d]+/, ''));
        // No leading zeros
        $(this).val($(this).val().replace(/^0/, ''));
        // No empty values
        if($(this).val().length == 0)
            $(this).val(0);
        // No overlap detection if degree is not a multiple of 90
        if($(this).val() % 90)
            $('#overlap_policy').val('allow');
        else
            $('#overlap_policy').removeAttr('disabled');
    });
    // Prevent submission of the options form
    $('#options form').submit(function (e){e.preventDefault();});
    
    $('#models img').addClass('model');
    // Make models draggable 
    $('.model').draggable({
        helper:'clone',
        drag: item_effects
    });  
    $('#design').droppable({
        accept: '.model, .item',
        drop: function(event,ui){
            if($('.erroneous').length){
                return false;
            }
            elm_clone = $(ui.draggable).clone();
            if($(elm_clone).hasClass('model')){
                $(this).append(elm_clone);
            }
            $(elm_clone)
                .removeClass('model')
                .addClass('item')
                .data('degree', 0)
                .css('top', ui.position.top - $('#design').position()['top'] - parseInt($('#design').css('margin-top'), 10) + 'px')
                .css('left', ui.position.left - $('#design').position()['left'] - parseInt($('#design').css('margin-left'), 10) + 'px')
                // Make cloned item draggable 
                .draggable({drag: item_effects});
            $(".item").unbind('dblclick').dblclick(function(e){
                // Number of degrees to add
                var step = $('#rotation_step').val() % 360;
                // Clockwise or counterclockwise
                var direction = $('#rotation_direction').val();
                // Plus or minus depeding on direction
                var sign = (direction === 'clockwise')? '+' :'-';
                // Store degree count
                if(direction === 'clockwise')
                    $(this).data('degree', $(this).data('degree') + step);
                else
                    $(this).data('degree', $(this).data('degree') - step);
                // Correct degree (0 to 359 only)
                $(this).data('degree', $(this).data('degree')%360);
                // Rotate
                $(this).animate({rotate: sign+'='+step+'deg'}, step*3);
            });
            return true;
        }
    });
    // Clean garbage, correct settings
    setInterval(function(){
        // Remove bad items
        $('.erroneous').not('.ui-draggable-dragging').remove();
        // Set overlap_policy to allow if any items is rotated to a degree which is not a multiple of 90
        $('.item').filter(function(){return $(this).data('degree') % 90}).each(function(){
            $('#overlap_policy').val('allow');
        });


    },300);
});
function item_effects(){
    var item = $('.ui-draggable-dragging');
    var items = $('.item').not('.ui-draggable-dragging');
    var parent = $('#design');
    var allow_overlap = ($('#overlap_policy').val() == 'allow')? true : false;

    if(
       !item_inside_parent(item, parent)
       ||
       (!allow_overlap && item_overlaps_items(item, items))
    )
        item.addClass('erroneous');
    else
        item.removeClass('erroneous');
}
function item_inside_parent(item, parent){
    return $(item).offset()['top'] >= $(parent).offset()['top']
        && $(item).offset()['top'] + $(item).height() <= $(parent).offset()['top'] + $(parent).height()
        && $(item).offset()['left'] >= $(parent).offset()['left']
        && $(item).offset()['left'] + $(item).width() <= $(parent).offset()['left'] + $(parent).width();
}
function item_overlaps_items(item, items){
    if(!items)
        return false;
    var rotated, rrotated;
    var diff, ddiff;
    var x = item.offset().left - $('#design').offset().left;
    var X = item.offset().left - $('#design').offset().left + item.width();
    var y = item.offset().top - $('#design').offset().top;
    var Y = item.offset().top - $('#design').offset().top + item.height();

    diff = item.height() - item.width();
    rotated = $(item).data('degree') % 180;
    if(rotated){
        X = x + item.height();
        Y = y + item.width();
    }
    for(var i=0; i<items.length; i++){
        var xx = items[i].offsetLeft;
        var XX = xx + items[i].width;
        var yy = items[i].offsetTop;
        var YY = yy + items[i].height;
        // Recalculate boundaries if necessary
        ddiff = items[i].height - items[i].width;
        rrotated = $(items[i]).data('degree') % 180;
        if(rrotated){
            xx = xx - ddiff/2;
            XX = xx + items[i].height;
            yy = yy + ddiff/2;
            YY = yy + items[i].width;
        }
        if(xx>X || XX<x){continue;}
        if(yy>Y || YY<y){continue;}
        if(xx>x && xx<X){return true;}
        if(XX>x && XX<X){return true;}
        if(yy>y && yy<Y){return true;}
        if(YY>y && YY<Y){return true;}
        return false;        
    }
    return false;
}
function getRotationDegrees(obj) {
    var matrix = obj.css("-webkit-transform") ||
    obj.css("-moz-transform")    ||
    obj.css("-ms-transform")     ||
    obj.css("-o-transform")      ||
    obj.css("transform");
    if(matrix !== 'none') {
        var values = matrix.split('(')[1].split(')')[0].split(',');
        var a = values[0];
        var b = values[1];
        var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
    } else { var angle = 0; }
    return angle;
}