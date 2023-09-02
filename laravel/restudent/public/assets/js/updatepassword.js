// var updatePassword = $('#update_password_form')
$(document).on('submit', '#update_password_form', function (e) {
    e.preventDefault()
    var data = new FormData($('#update_password_form')[0])
    // alert(data)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        type: "POST",
        url: hostUrl+"/update_password",
        data: data,
        //crossDomain : true,
        contentType: false,
        processData:false,
        dataType: 'json',
        success: function (response) {
            if (response.status == true) {
                toastr.success(response.message);
                setTimeout(function () {
                    // $("#update_password_div").load("#update_password_div");
                    $('#up_dt_pas').val('')
                    $('#up_dt_cpas').val('')
                }, 3000);
            } else {
                toastr.error(response.message);
            }
        },
        error: function (e) {
            toastr.error('Something went wrong');
        }
    });
})
// $(document).ready(function () {
    
// })