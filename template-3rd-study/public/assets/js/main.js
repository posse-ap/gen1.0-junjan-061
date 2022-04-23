'use strict'

// $(function() {
//     $('#to-modalLoading').on('click', function() {
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
//         alert("hogehoge");
//         $('#modalPost').modal('hide');
//         $('#modalLoading').modal('show');
//         $.ajax({
//             type: 'POST',
//             // data: 'form_data',
//             url: '/webapp/add',
//             data: $("#modalPost") //ここでシリアライズ
//         }).done(function(data1, textStatus, jqXHR) {
//             $('#modalLoading').modal('hide');
//             $('#modalSuccess').modal('show');
//             const data_stringify = JSON.stringify(data1);
//             const data_json = JSON.parse(data_stringify);

//             console.log(data_json);
//         })
//         .fail(function(jqXHR, textStatus, errorThrown) {
//             $('#modalLoading').modal('hide');
//             $('#modalError').modal('show');
//         })
//         ;
//     })
// })
$(function(){
    $('#to-modalLoading').on('click', function(){
        // var language_id = $('input[name=language_id]:checked').val();
        // alert($("#modalPost"));
      // alert($('input[name="languages[]"]').val());
      $('#modalPost').modal('hide');
      $('#modalLoading').modal('show');

      var date = $('#studyDate').val();
      var hour = $('#hour').val();

      var language_id = [];
      $('input[name="languages[]"]:checked').each(function(i) {
        // alert($('input[name="languages[]"]:checked').eq(i).val());
        language_id.push($('input[name="languages[]"]:checked').eq(i).val());
      });

      var content_id = [];
      $('input[name="contents[]"]:checked').each(function(i) {
        // alert($('input[name="contents[]"]:checked').eq(i).val());
        content_id.push($('input[name="contents[]"]:checked').eq(i).val());
      });

      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/webapp/add',
        data: {date: date, hour: hour, language_id: language_id, content_id: content_id}
      }).done(function(data1,textStatus,jqXHR){
        alert(data1);
        $('#modalLoading').modal('hide');
        $('#modalSuccess').modal('show');
      }).fail(function(jqXHR, textStatus, errorThrown ){
        $('#modalLoading').modal('hide');
        $('#modalError').modal('show');
      });
    });
  })
