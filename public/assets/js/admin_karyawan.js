function tambah() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'PUT',
        url: '/admin/karyawan',
        timeout: 2000,
        data: {
            name: $('#modal_add_karyawan input[name=name]').val(),
            jabatan: $('#modal_add_karyawan select[name=jabatan]').val(),
            address: $('#modal_add_karyawan .alamat').val(),
            birth: $('#modal_add_karyawan input[name=birth]').val(),
            phone: $('#modal_add_karyawan input[name=phone]').val(),
            gender: $('#modal_add_karyawan select[name=gender]').val(),
            start_work: $('#modal_add_karyawan input[name=start_work]').val(),
        },
        dataType: 'json',
        beforeSend: function(){
            arr_err = ['name', 'jabatan', 'address', 'birth', 'phone', 'gender', 'start_work'];
            for (let index = 0; index < arr_err.length; index++) {
                $('#modal_add_karyawan small[name=' + arr_err[index] + ']').removeClass('d-block').addClass('d-none');
            }
        },
        success: function (data) {
            $('#modal_add_karyawan').modal('hide');
            Swal.fire({
                title: 'Data Ditambahkan!',
                icon: 'success',
                showConfirmButton: false,
                timer: 700
            });
            setTimeout(() => {
                window.location.reload();
            }, 700);
        },
        error: function (data, errortype) {
            if (errortype == 'timeout') {
                Swal.fire({
                    title: 'Connection Time Out!',
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 1000
                });
            }
            var errors = $.parseJSON(data.responseText);
            arr_err = ['name', 'jabatan', 'address', 'birth', 'phone', 'gender', 'start_work'];
            for (let index = 0; index < arr_err.length; index++) {
                if (errors.messages[arr_err[index]] === undefined) {
                    $('#modal_add_karyawan small[name=' + arr_err[index] + ']').removeClass('d-block').addClass('d-none');
                } else {
                    $('#modal_add_karyawan small[name=' + arr_err[index] + ']').html(errors.messages[arr_err[index]]);
                    $('#modal_add_karyawan small[name=' + arr_err[index] + ']').removeClass('d-none').addClass('d-block');
                }
            }
        }
    });
}
