$(document).ready(function(){
    $('select[name=pendidikan_pasca_sarjana]').on('change', function(){
        if($(this).val() == "Magister / Magister Terapan"){
            $('#s2').addClass('d-none')
            $('#s3').addClass('d-none')
            $('#s2').removeClass('d-none')
            $('#s3').addClass('d-none')
        }else if($(this).val() == "Doctor / Doctor Terapan"){
            $('#s2').addClass('d-none')
            $('#s3').addClass('d-none')
            $('#s2').removeClass('d-none')
            $('#s3').removeClass('d-none')
        }else{
            $('#s2').addClass('d-none')
            $('#s3').addClass('d-none')
        }
    });

    $('.btn-file').on('click', function(){
        $('input[name= '+ $('.btn-file').attr('target') +']').click();
    });
});

var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

// $('.masukan-text').on('keyup', function() {
//     simpan_inputan($(this).attr('name'), $(this).val());
// });

// $('.masukan-select').on('change', function() {
//     simpan_inputan($(this).attr('name'), $(this).val());
// });

// $('.masukan-check').on('change', function() {
//     simpan_inputan($(this).attr('name'), this.checked ? $(this).val() : '');
// });

// $('.masukan-file').on('change', function() {
//     var formData = new FormData();
//     formData.append('ijasah_s2', $(this)[0].files[0]);
//     formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
//     $.ajax({
//         url: $(this).closest('form').attr('action'),
//         type: 'POST',
//         data: formData,
//         success: function(response){
//             console.log(response);
//             if(response == 1){
//                 Toast.fire({
//                     icon: 'success',
//                     title: 'Data disimpan'
//                 })
//             }else{
//                 Toast.fire({
//                     icon: 'error',
//                     title: 'Data gagal disimpan'
//                 })
//             }
//         }
//     });
// });

function simpan_inputan(key, val){
    $.ajax({
        url: $(this).closest('form').attr('action'),
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            key: key,
            val: val,
        },
        success: function(response){
            if(response == 1){
                Toast.fire({
                    icon: 'success',
                    title: 'Data disimpan'
                })
            }else{
                Toast.fire({
                    icon: 'error',
                    title: 'Data gagal disimpan'
                })
            }
        }
    });
}