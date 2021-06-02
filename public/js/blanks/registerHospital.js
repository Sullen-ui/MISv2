var selectedPatientId;
var selectedCartId;

$('#hospital-reg-modal').on('click', function (){
   $('#modalCenterHospital').modal('show');
});

mask();

$('#send-button-act').on('click', function (){
    if(!validate('form')){
        return false;
    }

    let data = {
        "cart_data": {
            "cart_id": $('#idCart').val(),
            "section_id": $('#section').val(),
            "cart_type": 1,
            "dop_policy": $('#policy-dms').val(),
            "dop_information": $('#dop-inf').val(),
            "trans_type": $('#type-trans').val(),
            "direction": $('#direction').val(),
            "direction_diagnos": $('#diag').val()
        },
        "patient_data": {
            "policy_num": $('#policy-num').val(),
            "policy_comp": $('#policy-comp').val(),
            "policy_type": $('#policy-type').val(),
            "pasport_serial": $('#pasport-serial').val(),
            "pasport_num": $('#pasport-num').val(),
            "pasport_who": $('#pasport-who').val(),
            "pasport_date": $('#pasport-date').val(),
            "snills": $('#snills').val(),
            "name": $('#name').val(),
            "job": $('#job').val(),
            "gender": $('#gender').val(),
            "born_date": $('#born-date').val(),
            "born_addr": $('#born-addr').val(),
            "registration": $('#registration').val(),
            "resident": $('#resident').val(),
            "phone": $('#phone').val(),
            "social": $('#social').val(),
            "type_disability": $('#disability').val(),
        }
    }
    $.ajax({
        type: "POST",
        url: "/api/registration/hospital",
        dataType: 'json',
        data: data,
        success: function(msg){
            if(msg.status == true){
                toolTip(msg.message, 1);
                $('#modalCenterHospital').modal('hide');
                $('#active-form')[0].reset();
                selectedPatientId = msg.patient_id;
                selectedCartId = msg.cart_id;
                $('#modalCenterPrint').modal('show');
            }
        },
        error: function (xhr, status, error) {
            toolTip(xhr.responseJSON.message);
        }
    });

    return false;
});
