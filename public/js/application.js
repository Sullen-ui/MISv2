



jQuery(document).ready(function() {

    $.datepicker.setDefaults(
        $.extend(
            $.datepicker.regional['ru']
        )
    );


    $("#datepicker").datepicker({
        dateFormat: "dd.mm.yy"
    });

});



function backlight(blocks, status){

    if(typeof(blocks) == "object"){
        for (var i = 0; i < Object.keys(blocks['false']).length; i++) {
            $(blocks['false'][i]).addClass('alert-red');
        }
        for (var i = 0; i < Object.keys(blocks['true']).length; i++) {
            $(blocks['true'][i]).removeClass('alert-red');
        }
    }else if(typeof(blocks) == "string"){
        if(status == false){
            $(blocks).addClass('alert-red');
        }else if (status == true){
            $(blocks).removeClass('alert-red');
        }

    }

}

function validate(type){

    const items = $('.alert-red');
    Array.from(items).forEach(item => {
        item.classList.remove('alert-red')
    });

    if(type == 'form'){
        let blocks = {};
        let falseBlock = [];
        let trueBlock = [];
        if($('#policy-num').val().split('_').join('').split(' ').join('').length > 0){
            if($('#policy-num').val().split('_').join('').split(' ').join('').length != $('.policy-type_option[value="'+$('#policy-type').val()+'"]').attr('data-length') && $('#policy-type').val() != 4){
                falseBlock.push('#policy-num');
            }else{
                trueBlock.push('#policy-num');
            }

            if($('#policy-num').val().length <= 0){
                falseBlock.push('#policy-num');
            }
        }




        if($('#snills').val().length > 0){
            if($('#snills').val().split('_').join('').split('-').join('').split(' ').join('').length != 11){
                falseBlock.push('#snills');
            }else{
                trueBlock.push('#snills');
            }
        }

        if($('#pasport-serial').val().length > 0){
            if($('#pasport-serial').val().split('_').join('').split(' ').join('').length != 4){
                falseBlock.push('#pasport-serial');
            }else{
                trueBlock.push('#pasport-serial');
            }

            if($('#pasport-num').val().length <= 0){
                falseBlock.push('#pasport-num');
            }else if($('#pasport-num').val().length > 0 && $('#pasport-num').val().split('_').join('').length != 6){
                falseBlock.push('#pasport-num');
            }else{
                trueBlock.push('#pasport-num');
            }

            if($('#pasport-date').val().length <= 0){
                falseBlock.push('#pasport-date');
            }else if($('#pasport-date').val().split('.').join('').split(' ').join('').length != 8){
                falseBlock.push('#pasport-date');
            }else{
                let arrD = $('#pasport-date').val().split(".");
                if (isNaN(Date.parse(arrD[2] + "-" + arrD[1] + "-" + arrD[0]))) {
                    falseBlock.push('#pasport-date');
                }else {
                    trueBlock.push('#pasport-date');
                }
            }

        }

        if($('#pasport-num').val().length > 0){
            if($('#pasport-serial').val().length <= 0 || $('#pasport-num').val().split('_').join('').length != 6 || $('#pasport-date').val().length <= 0){
                falseBlock.push('#pasport-num');
                falseBlock.push('#pasport-serial');
                falseBlock.push('#pasport-date');
            }

        }

        if($('#born-date').val().split('.').join('').split(' ').join('').length != 8){
            falseBlock.push('#born-date');
        }else{
            trueBlock.push('#born-date');
        }

        if($('#name').val().split('_').join('').split(' ').join('').length <= 0){
            falseBlock.push('#name');
        }else{
            trueBlock.push('#name');
        }


        blocks['false'] = falseBlock;
        blocks['true'] = trueBlock;
        if(Object.keys(blocks['false']).length > 0){
            backlight(blocks);
            toolTip('Не правильно заполнены поля');
            return false;
        }else{
            backlight(blocks);
            return true
        }
    } else if(type == 'date'){
        if($('#datepicker').val().length == 0){
            backlight('#datepicker', false);
            toolTip('Не выбрана дата');
            return false;
        }else{
            backlight('#datepicker', true);
            return true;
        }
    }

    return true;
}

function toolTip(text, color = 0){
    if(color == 0){
        $('#tooltip').css('background-color', '#ed1c29');
        var timeOut = 5000;
    }else if(color == 1){
        $('#tooltip').css('background-color', '#00af14');
        var timeOut = 3000;
    }
    $('#tooltip').text(text).fadeIn(500);
    setTimeout(hide, timeOut);
}

function hide() {
    $('#tooltip').fadeOut(500);
}



function preLoad(block){
    block.append($('.preloader'));
    $('.preloader').show();
}
function removePreLoader(){
    $('.preloader').hide();
    $('#app').append($('.preloader'));
}





$("#name").suggestions({
    token: "8365ea2d420011b956f22f1a6edf14cf1ee47e47",
    type: "NAME"
});
$("#registration").suggestions({
    token: "8365ea2d420011b956f22f1a6edf14cf1ee47e47",
    type: "ADDRESS"
});
$("#pasport-who").suggestions({
    token: "8365ea2d420011b956f22f1a6edf14cf1ee47e47",
    type: "fms_unit"
});



// WS обработчик данных
function wsHandler(data){
    if(data.message.date != selectedDate){
        return false;
    }

    if(data.message_type == "act"){
        $('.time_item[data-uid="' + data.message.uid + '"]').attr('data-status', 1);
        $('.time_item[data-uid="' + data.message.uid + '"]').attr('data-id', data.message.id);
        $('.time_item[data-uid="' + data.message.uid + '"]').addClass('red');
    }else if(data.message_type == "delete_act"){
        $('.time_item[data-uid="' + data.message.uid + '"]').attr('data-status', 0);
        $('.time_item[data-uid="' + data.message.uid + '"]').removeAttr('data-id');
        $('.time_item[data-uid="' + data.message.uid + '"]').removeClass('red');
    }
}




// Лоадер при потере соединения
function addLoader(){
    $('#loader').addClass('loader-vissble');
    $('body').addClass('blocked');
}

function removeLoader(){
    $('#loader').removeClass('loader-vissble');
    $('body').removeClass('blocked');
}








