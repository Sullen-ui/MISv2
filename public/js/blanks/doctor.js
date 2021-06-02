function getCarts(id){
    $('#doctorContent').empty();
    $.ajax({
        type: "GET",
        url: "/api/doctor/"+id,
        dataType: 'json',
        success: function(msg){
            if(msg.status == true){
                for (var i = 0; i < msg.carts.length; i++) {
                    $('#doctorContent').append(`
                        <div class="row">
                            <div class="col-md-2 cart-item">`+ msg.carts[i]['cart_id'] + `</div>
                            <div class="col-md-2 cart-item">`+ msg.carts[i]['create_date'] + `</div>
                            <div class="col-md-2 cart-item">-</div>
                            <div class="col-md-4 cart-item">`+ msg.carts[i]['patient']['name'] + `</div>
                            <div class="col-md-2 cart-item font-link">
                                <a href="/patient/` + msg.carts[i]['patient']['id'] + `"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    `);
                }


            }
        },
        error: function (xhr, status, error) {
            toolTip(xhr.responseJSON.message);
        }
    });
}
getCarts($('#section').val());

$('#section').change(function (){
    getCarts($(this).val());
});
