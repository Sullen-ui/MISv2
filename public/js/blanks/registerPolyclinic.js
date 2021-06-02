var uid;
var section;
var date;
var selectedDoctor;
var selectedId;
var selectedPatientId;
var selectedCartId;
var selectedDate;
var selectedSection;

var filter_select_el = document.getElementById('filter');
var items_el = document.getElementById('doc-list');


filter_select_el.onchange = function() {
    var items = items_el.getElementsByClassName('item');
    for (var i=0; i<items.length; i++) {
        if (items[i].classList.contains(this.value)) {
            items[i].style.display = 'block';
        } else {
            items[i].style.display = 'none';
        }
    }
};





//Получение списка врачей с API
function getAll(){
    preLoad($('#content-section'));
    $.ajax({
        type: "POST",
        url: "/api/timetable",
       
        dataType: 'json',
        data: {
            "date": $('#datepicker').val(),
            "section": $('#section').val()
        },
        success: function(msg){
            if(msg.status == false){
                toolTip(msg.message)
            }else{
                dataHadler(msg);
            }
            removePreLoader();
        },
        error: function (xhr, status, error) {
            $('.filter-wrapper').hide();
            toolTip(xhr.responseJSON.message);
            removePreLoader();
        }
    });
}

//Очистка списка полей
function clear(){
    $('#doc-list').empty();
    $('.dl').remove();

}


//Обработка данных с API (списка врачей и время)
function dataHadler(data){
    $('.filter-wrapper').show(100);
    for (var i = 0; i < data.length; i++) {
        $('#doc-list').append(`
            <div data-id="` + data[i]['id'] + `" class="wrapper item mb-3 ` + data[i]['id_profession'] + `"><div id="wrapper_info" class="wrapper_info" data-toggle="collapse" href="#collapse-` + data[i]['id'] + `" aria-expanded="true"><div class="name">ФИО: ` + data[i]['name'] + `</div><div class="cabinet">Кабинет: ` + data[i]['cabinet'] + `</div><div class="profession">Специальность: ` + data[i]['prof_name'] + `</div></div><div class="timelist row collapse" id="collapse-` + data[i]['id'] + `" style=""></div></div>
        `);
        if($(".dl[value='" + data[i]['profession_id'] + "']").length == 0){
            $('#filter').append(`
                <option class="dl" value="`+ data[i]['id_profession'] +`">` + data[i]['prof_name'] + `</option>
            `)
        }
        var array = data[i]['time'];
        for (var prop in array){
            $('#collapse-'+ data[i]['id'] +'').append(`
                <div class="col-md-2 col-lg-1"><div class="time_item" data-status="0" data-uid="` + data[i]['id'] + prop +`">` + array[prop] + `</div></div>
            `)
        };
        if(data[i]['visit']){
            for(var b = 0; b < data[i]['visit'].length; b++){
                $('.time_item[data-uid="'+ data[i]['visit'][b]['uid'] +'"]').attr('data-status', 1);
                $('.time_item[data-uid="'+ data[i]['visit'][b]['uid'] +'"]').attr('data-id', data[i]['visit'][b]['id']);
                $('.time_item[data-uid="'+ data[i]['visit'][b]['uid'] +'"]').addClass('red');
            }
        }
    }
}


//Кнопка получения списка врачей
$('#send-button').on('click', function(){
    if(validate('date') && ($('#datepicker').val() != selectedDate || $('#section').val() != selectedSection)){
        clear();
        selectedSection = $('#section').val();
        selectedDate = $('#datepicker').val();
        getAll();
    }
    return false;
});

//Время без записи
$('#doc-list').on('click', '.time_item[data-status="0"]' , function(){
    uid = $(this).attr('data-uid');
    selectedId = $(this).attr('data-id');
    selectedDoctor = $(this).closest(".wrapper[data-id]").attr('data-id');
    $('#active-date').val(selectedDate + " " + $(this).text());
    $('#modalCenter').modal('show');
    mask();
});

//Время с записью
$('#doc-list').on('click', '.time_item[data-status="1"]' , function(){
    selectedId = $(this).attr('data-id');
    $.ajax({
        type: "GET",
        url: "/api/timetable/show/"+selectedId,
        dataType: 'json',
        success: function(msg){
            $('#act-name').text(msg.patient.name);
            $('#act-born-date').text(msg.patient.dob);
            $('#act-policy-num').text(msg.patient.polis_num);
            $('#act-job').text(msg.patient.work_place);
            $('#act-phone').text(msg.patient.phone);
            $('#modalCenterContent').modal('show');
            $('#button-delete_act').attr('data-id', msg.id);
            $('#button-cart').attr('href', "/patient/" + msg.patient.id);
        },
        error: function (xhr, status, error) {
            toolTip(xhr.responseJSON.message);
        }
    });


});


//Удаление записи
$('#button-delete_act').on('click', function (){
    $.ajax({
        type: "DELETE",
        url: "/api/timetable/delete/"+selectedId,
        dataType: 'json',
        success: function(msg){
            if(msg.status == true){
                $('#modalCenterContent').modal('hide');
                toolTip(msg.message, 1);
            }
        },
        error: function (xhr, status, error) {
            toolTip(xhr.responseJSON.message);
        }
    });
});

//Создание записи
$('#send-button-act').on('click', function (){
    if(!validate('form')){
        return false;
    }

    let data = {
        "visit": {
            "uid": uid,
            "id_branch": selectedSection,
            "id_doctor": selectedDoctor,
            "visit_date": selectedDate
        },
        "patient_data": {
            "polis_num": $('#policy-num').val(),
            "polis_comp": $('#policy-comp').val(),
            "polis_type": $('#policy-type').val(),
            "pasport_serial": $('#pasport-serial').val(),
            "pasport_num": $('#pasport-num').val(),
            "pasport_who": $('#pasport-who').val(),
            "pasport_date": $('#pasport-date').val(),
            "snils": $('#snills').val(),
            "name": $('#name').val(),
            "work_place": $('#job').val(),
            "gender": $('#gender').val(),
            "dob": $('#born-date').val(),
            "dob_place": $('#born-addr').val(),
            "registration": $('#registration').val(),
            "resident": 0,
            "phone": $('#phone').val(),
            "soc_status": $('#social').val(),
            "invalid": 0,
        }
    }

    console.log(data);
    $.ajax({
        type: "POST",
        url: "/api/timetable/create",
        dataType: 'json',
        data: data,
        success: function(msg){
            console.log(msg);
            if(msg.status == true){
                toolTip(msg.message, 1);
                $('#modalCenter').modal('hide');
                $('#active-form')[0].reset();
                selectedPatientId = msg.patient_id;
                selectedId = msg.act_id;
                selectedCartId = msg.cart_id;
                $('#modalCenterPrint').modal('show');

                console.log(selectedId);
            }
        },
        error: function (xhr, status, error) {
            toolTip(xhr.responseJSON.message);
        }
    });

    return false;
});

//Изменение типа полиса - изменение маски на поле
$('#policy-type').change(mask);


// Поиск пациентов по имени

$('#name').on('keyup', function(){
    if($(this).val().split('_').join('').split(' ').join('').length > 3){
        $.ajax({
            type: "POST",
            url: "/search/patient",
            dataType: 'json',
            data: {
                "_token": CSRF,
                "type": "name",
                "data": $(this).val().split('_').join('')
            },
            success: function(msg){
                searchDataHandler($('#search_box-name'), msg);
            },
            error: function (xhr, status, error) {
                toolTip(xhr.responseJSON.message);
            }
        });
    }
});

//По полюсу

// $('#policy-num').on('keyup', function(){
//     if($(this).val().split('_').join('').split(' ').join('').length > 3){
//         $.ajax({
//             type: "POST",
//             url: "/api/search/patient",
//             dataType: 'json',
//             data: {
//                 "type": "policy",
//                 "data": $(this).val().split('_').join('')
//             },
//             success: function(msg){
//                 searchDataHandler($('#search_box-policy'), msg);
//             },
//             error: function (xhr, status, error) {
//                 toolTip(xhr.responseJSON.message);
//             }
//         });
//     }else{
//         $("#search_box-policy").hide();
//         $("#search_box-name").hide();
//     }
// });


function searchDataHandler(block, data){
    block.empty();
    if(data.patients.length > 0){
        for(let i = 0; i < data.patients.length; i++){
            block.append(`
            <div class="search-item_container" data-id="` + data.patients[i]['id'] + `">` + data.patients[i]['polis_num'] + ` - ` + data.patients[i]['name'] + ` ` + data.patients[i]['dob'] + `</div>
        `);
        }
        block.show();
        $('.suggestions-wrapper').hide();
    }else{
        block.hide();
        $('.suggestions-wrapper').show();
    }
}



$(document).mouseup(function (e){
    var div = $("#search_box-policy");
    var div2 = $("#search_box-name")
    if (!div.is(e.target) && div.has(e.target).length === 0 && !div2.is(e.target) && div2.has(e.target).length === 0) {
        div.hide();
        div2.hide();
    }
});

$('.search-box').on('click', '.search-item_container', function (){
    $(this).parent().hide();
    $.ajax({
        type: "GET",
        url: "/api/emh/patient/"+$(this).attr('data-id'),
        dataType: 'json',
        success: function(msg){
            $('#policy-type').val(msg.patient.polis_type);
            mask();
            $('#policy-num').val(msg.patient.polis_num);
            $('#policy-comp').val(msg.patient.polis_comp);
            $('#snills').val(msg.patient.snils);
            $('#pasport-serial').val(msg.patient.pasport_serial);
            $('#pasport-num').val(msg.patient.pasport_num);
            $('#pasport-date').val(msg.patient.pasport_date);
            $('#pasport-who').val(msg.patient.pasport_who);
            $('#name').val(msg.patient.name);
            $('#born-date').val(msg.patient.dob);
            $('#gender').val(msg.patient.gender);
            $('#born-addr').val(msg.patient.dob_place);
            $('#registration').val(msg.patient.registration);
            $('#job').val(msg.patient.work_place);
            $('#social').val(msg.patient.soc_status);
            $('#phone').val(msg.patient.phone);
            $('.suggestions-wrapper').show();
        },
        error: function (xhr, status, error) {
            toolTip(xhr.responseJSON.message);
        }
    });
});
