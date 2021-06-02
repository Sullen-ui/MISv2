function mask(){
    let type = $('#policy-type').val();
    switch (type) {
        case "3":
            $("#policy-num").inputmask("9999999999999999");
            $("#policy-num").val($("#policy-num").val());
            break;
        case "2":
            $("#policy-num").inputmask("999999999");
            $("#policy-num").val($("#policy-num").val());
            break;
        case "1":
            $("#policy-num").inputmask("99999 999999");
            $("#policy-num").val($("#policy-num").val());
            break;
        case "4":
            $("#policy-num").inputmask('remove');
            $("#policy-num").val($("#policy-num").val());
            break;
    }
    $("#snills").inputmask("999-999-999 99");
    $("#pasport-serial").inputmask("99 99");
    $("#pasport-num").inputmask("999999");
    $(".m-date").inputmask("x9.c9.9999", {
        definitions: {
            "x": {
                validator: "[0-3]"
            },
            "c": {
                validator: "[0-1]"
            }
        }
    });
    $("#phone").inputmask("+79999999999");
}
