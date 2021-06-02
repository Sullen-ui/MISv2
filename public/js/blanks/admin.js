$('#AddUser').on('click', function(){
    $('#modalAdminUsers').modal('show');
})



$('#Add-user-btn').on('click', function(){
    $.ajax({
    type: "POST",
    url: "/api/admin/user-add",
    dataType: 'json',
    data: {
        'login': $('#user-login').val(),
        'password': $('#user-password').val(),
        'type': $('#type_role').val(),
        'id_branch': $('#user-branch').val(),
    },
    success: function(msg){
        if(msg.status == true){
            toolTip(msg.message, 1);
            $('#modalAdminUsers').modal('hide');
        }
    },
    error: function (xhr, status, error) {
        toolTip(xhr.responseJSON.message);
    }
});
    return false;
});