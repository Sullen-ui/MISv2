var urlArray = window.location.pathname.split('/');
var patient_information;

$.ajax({
    type:'GET',
    url: '/api/emh/patient/' + urlArray[2],
    dataType:'json',
    success: function(data) {
        useReturnData(data);
    },
    error: function (xhr, status, error) {
        toolTip(xhr.responseJSON.message);
    }
});

function useReturnData(data){
    patient_information = data;
};

$('#post-summer').summernote({
    lang: 'ru-RU',
    toolbar:[
        ['style',['style']],
        ['font',['bold','italic','underline','clear']],
        ['fontname',['fontname']],
        ['color',['color']],
        ['para',['ul','ol','paragraph']],
        ['height',['height']],
        ['table',['table']],
        ['insert',['media','link','hr']],
        ['view',['fullscreen','codeview']],
        ['misc', ['print']],
    ],
    tooltip: false,
    callbacks: {
        onInit: function(e) {
            $('.note-misc').children().addClass("button_print btn-doc").attr("data-print", "post");
        }
    }
});

$('#addPost').on('click', function (){
    if($('#post-summer').text().length <= 0){
        getTemplate()
    }
    $('#modalCenterPost').modal('show');
});

$('#templates').change(getTemplate);


//Создание записи в карте
$('#sendPost').on('click', function (){
    $.ajax({
        type: "POST",
        url: "/api/emh/create",
        dataType: 'json',
        data: {
            "id_patient": urlArray[2],
            "name": $('#post-head_input').val(),
            "id_doctor": USERID,
            "description": $('#post-summer').summernote('code'),
        },
        success: function(msg){
            if(msg.status == true){
                $('#modalCenterPost').modal('hide');
                toolTip("Запись добавлена", 1);
                if($('#post-container').children('.post-item').length == 0){
                    $('#post-container').empty();
                }
                $('#post-container').append(`
                    <div class="row post-item" data-id="` + msg.post.id + `">
                         <div class="col-md-5">` + msg.post.name + `</div>
                         <div class="col-md-5">` + msg.post.doctor.name + " (" + msg.post.doctor.prof_name + ")" + `</div>
                         <div class="col-md-2">` + msg.post.create_date + `</div>
                    </div>
                `);1 
            }
        },
        error: function (xhr, status, error) {
            toolTip(xhr.responseJSON.message);
        }
    });
});

$('#post-container').on('click', '.post-item' , function (){
    $('#modalCenterPostContent').modal('show');
    preLoad($('#modal-content-p'));
    $.ajax({
        type: "GET",
        url: "/api/emh/show/" + $(this).attr('data-id'),
        dataType: 'json',
        success: function(msg){
            if(msg.status == true){
                $('#postName').text(msg.post.name);
                $('#postContent').html(msg.post.description);
                removePreLoader();
            }
        },
        error: function (xhr, status, error) {
            toolTip(xhr.responseJSON.message);
            removePreLoader();
        }
    });
});

function getTemplate(){
    preLoad($('#modal-content-post'));
    $.ajax({
        type: "GET",
        url: "/api/emh/template/" + $('#templates').val(),
        dataType: 'json',
        success: function(msg){
            if(msg.status == true){
                $('#post-head_input').val(msg.template.name);
                $('#post-summer').summernote('code', msg.template.template);
                fillTemplate();
                removePreLoader();
            }
        },
        error: function (xhr, status, error) {
            toolTip(xhr.responseJSON.message);
            removePreLoader();
        }
    });
}

function fillTemplate(){
    var Data = new Date();
    var Year = Data.getFullYear();
    var Month = String(Data.getMonth() + 1).padStart(2, '0');
    var Day = String(Data.getDate()).padStart(2, '0');
    var Hour = Data.getHours();
    var Minutes = Data.getMinutes();

    $('#post-temp_id').text(patient_information.patient.id);
    $('#post-temp_name').text(patient_information.patient.name);
    $('#post-temp_date').text(Day + "." + Month + "." + Year);
    $('#post-temp_time').text(Hour + ":" + Minutes);
    $('#post-temp_born').text(patient_information.patient.dob)
    $('#doc-name').text(USERNAME);
    $('#post-prof').text(PROF+"a");

}

    $('#button-edit_patient').on('click', function (){
    $('#modalPatient').modal('show')
    });
