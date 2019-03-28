$(function () {
    $('.subscribe-form').on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
            },
        });

        url = $(this).attr('action');
        var form = new FormData(this);
        $.ajax({
            url:url,
            type:'POST',
            dataType:'text',
            cache: false,
            contentType: false,
            processData: false,
            data:form,
            success:function (data) {
                var json = JSON.parse(data);
                console.log(json);
                if (json.alert_type == 'danger'){
                    toastr.error(json.message);
                }else if (json.alert_type == 'warning'){
                    toastr.warning(json.message);
                }
                else{
                    toastr.success(json.message);
		    $('.subscriber').val('');
                }
            }
    })
    });
});
