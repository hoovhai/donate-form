
function formatCreditCard() {
    console.log(1)
    var x = document.getElementById("card-number");
    var index = x.value.lastIndexOf('-');
    var test = x.value.substr(index + 1);
    if (test.length === 4 && x.value.length < 19)
        x.value = x.value + '-';
}

function formControl() {
    if (this.checkVal()) {
        var frm = $('#from-donate');
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                success: function (data) {
                    console.log('Submission was successful.')
                    $(".popup-background").addClass("popup-add-open");
                    $("#success").addClass("popup-add-open");
                },
                error: function (data) {
                    $("#error").addClass("popup-add-open");
                    $("#message-error").prepend(`<p> ${data.responseJSON.message} </p>`)
                    $(".popup-background").addClass("popup-add-open");
                },
            });
    }
}

function checkVal() {
    $("input").removeClass("form-control-red");
    $("#paymethod").removeClass("validateFail");

    var errorId = []
    if (!$("#firstname").val()) {
        errorId.push('#firstname')
    }
    if (!$("#lastname").val()) {
        errorId.push('#lastname')
    }
    if (!$("#email").val() || !validateEmail($("#email").val())) {
        errorId.push('#email')
    }
    if (!$("#company").val()) {
        errorId.push('#company')
    }
    if (!$("#gender").val()) {
        errorId.push('#gender')
    }
    if (!$("#card-number").val()) {
        errorId.push('#card-number')
    }
    if (!$("#cvn").val()) {
        errorId.push('#cvn')
    }
    if (!$("input[name='credit_method']:checked").val()) {
        $("#paymethod").addClass("validateFail");
    }
    if (!$("#expiration-date").val() || $("#expiration-date").val() < 1 || $("#expiration-date").val() > 12) {
        errorId.push('#expiration-date')
    }
    if (!$("#expiration-year").val() || $("#expiration-year").val() < new Date().getFullYear()) {
        errorId.push('#expiration-year')
    }
    if (!$("#phonenumber").val() || $("#phonenumber").val().length < 9 || $("#phonenumber").val().length > 12) {
        errorId.push('#phonenumber')
    }
    
    for (const id of errorId) {
        console.log(id)
        $(id).addClass("form-control-red");
    }

    if (errorId.length === 0) {
        return true
    }
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    console.log(re.test(email))
    return re.test(email);
}

$(document).ready(function($target){
    $("#popup-background").click(function(){
        $("#errors").removeClass("popup-add-open");
        $("#success").removeClass("popup-add-open");
        $("#popup-background").removeClass("popup-add-open");
    });
})