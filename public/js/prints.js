$('.button_print').on('click', function (){
    let data;
    if(window.location.pathname == "/registry/polyclinic"){
        data = {
            "id": selectedPatientId,
            "act_id": selectedId,
            "cart_id": selectedCartId
        }
    }else if (window.location.pathname == "/registry/hospital"){
        data = {
            "id": selectedPatientId,
            "cart_id": selectedCartId
        }
    }else if (window.location.pathname.split('/')[1] == "cart"){
        data = {
            "data": $('#post-summer').summernote('code')
        };
    }
    docPrint($(this), $(this).text(), data);
});

function docPrint(block, text, data){
    load(block);
    $.ajax({
        type: "POST",
        url: "/api/prints/"+block.attr('data-print'),
        data: data,
        success: function(msg){
           printJS({printable:'/documents/complete/' + msg.file, type:'pdf', onLoadingEnd:cload(block,text,msg.file)});

        },
        error: function (xhr, status, error) {
            toolTip(xhr.responseJSON.message);
        }
    });
}

function load(block){
    block.html(`
                <svg class="spinner-block" viewBox="0 0 50 50">
                    <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
                </svg>
    `);
}

function cload(block, text, file){
    block.html(text);
    deleteDoc(file);
}

function deleteDoc(file){
    $.ajax({
        type: "POST",
        url: "/api/prints/delete",
        data: {
            "file": file
        },
        error: function (xhr, status, error) {
            console.log(xhr)
            toolTip(xhr.responseJSON.message);
        }
    });
}
