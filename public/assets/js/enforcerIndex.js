$('document').ready(function(){
    var x = $("#dtblEnforcer").DataTable();
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});

$(".addEnforcer").click(function(){
    var passwordGenerated = randomString(7);
    $("#form").validator('update');
    $("#formErrorMessage").hide();
    $("#inputPassword").val(passwordGenerated);
    $("#inputReEnterPassword").val(passwordGenerated);
    $("#inputFirstname").val("");
    $("#inputLastname").val("");
    $("#inputEnforcerID").val("");
    $(".passwordCredential").hide();
    $("#setPasswordBlock").show();
});

$(".btnCancelCreateEnforcer").click(function(){
    $("#form").validator('destroy');
});

function randomString(length){
    var stringGenerated = '';
    var chars = '0123456789!@#$_&abcdefghijklmnopwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    for(var i = length; i > 0; --i){
        stringGenerated += chars[Math.floor(Math.random() * chars.length)];
    }
    return stringGenerated;
}

$(".passwordCredential").hide();
$("#setPassword").click(function(){
    $(".passwordCredential").show();
    $("#setPasswordBlock").hide();
    $("#inputPassword").val("");
    $("#inputReEnterPassword").val("");
});
$("#autoGeneratePassword").click(function(){
    $(".passwordCredential").hide();
    $("#setPasswordBlock").show();
    var passwordGenerated = randomString(7);
    $("#inputPassword").val(passwordGenerated);
    $("#inputReEnterPassword").val(passwordGenerated);
});


$('#form').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
        // handle the invalid form...
    } else {
        /* 
            for create enforcer loading state
        */
        var $btnCreateEnforcer = $('#btnCreateEnforcer');
        $btnCreateEnforcer.button('loading');
        /*
            Submit data to the controller using ajax
        */
        var strFirstname = $("#inputFirstname").val();
        var strLastname = $("#inputLastname").val();
        var strEnforcerID = $("#inputEnforcerID").val();
        var strPassword = $("#inputPassword").val();
        var strReEnterPassword = $("#inputReEnterPassword").val();
        $.ajax({
            url: "enforcer/create",
            type:"POST",
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');
                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            data: { strFirstname : strFirstname, strLastname : strLastname, strEnforcerID : strEnforcerID, strPassword : strPassword },
            success:function(data){
                if(data == 'error'){
                    $("#formErrorMessage").show();
                    $btnCreateEnforcer.button('reset');  
                } else{
                    $('#loadingEnforcer').addClass('overlay');
                    $('#loadingEnforcerDesign').addClass('fa fa-refresh fa-spin')
                    $('#enforcerTable').empty();
                    $('#enforcerTable').append(data);
                    $('#modalAddEnforcer').modal('hide');
                    $('#successUsername').text(strEnforcerID);
                    $('#successPassword').text(strPassword);
                    $('#successFirstname').text(strFirstname);
                    $('#successLastname').text(strLastname);
                    $('#modalSuccessfulCreation').modal('show');
                    $btnCreateEnforcer.button('reset');  
                }
                
            },error:function(data){ 
                alert("Error!");
            }
        });
    }
    return false;
})

$("#btnCreateAnotherEnforcer").click(function(){
    $('#modalSuccessfulCreation').modal('hide');
    var passwordGenerated = randomString(7);
    $("#form").validator('update');
    $("#formErrorMessage").hide();
    $("#inputPassword").val(passwordGenerated);
    $("#inputReEnterPassword").val(passwordGenerated);
    $("#inputFirstname").val("");
    $("#inputLastname").val("");
    $("#inputEnforcerID").val("");
    $(".passwordCredential").hide();
    $("#setPasswordBlock").show();
    $('#modalAddEnforcer').modal('show');
});


















