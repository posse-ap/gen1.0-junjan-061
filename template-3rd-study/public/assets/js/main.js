'use strict'




$(function() {
    $('#to-modalLoading').on('click', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        alert("hogehoge");
        $('#modalPost').modal('hide');
        $('#modalLoading').modal('show');
        $.ajax({
            type: 'POST',
            url: '/webapp/add',
            data: $("#modalPost").serialize() //ここでシリアライズ
        }).done(function(data1, textStatus, jqXHR) {
            $('#modalLoading').modal('hide');
            $('#modalSuccess').modal('show');
        }).fail(function(jqXHR, textStatus, errorThrown) {
            $('#modalLoading').modal('hide');
            $('#modalError').modal('show');
        });
    })
})