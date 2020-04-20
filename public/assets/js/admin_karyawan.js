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
        beforeSend: function () {
            Swal.fire({
                title: 'Loading...',
                showConfirmButton: false,
                allowOutsideClick: false
            });
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
            Swal.close();
            if (errortype == 'timeout') {
                Swal.fire({
                    title: 'Connection Time Out!',
                    icon: 'warning',
                    showConfirmButton: true,
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

function viewModalEdit(id, name, username, jabatan, address, birth, phone, gender, start_work) {
    $('#modal_edit_karyawan input[name=name]').val(name);
    $('#modal_edit_karyawan input[name=username]').val(username);
    $('#modal_edit_karyawan input[name=password]').val('');
    $('#modal_edit_karyawan select[name=jabatan]').val(jabatan);
    $('#modal_edit_karyawan .alamat').val(address);
    $('#modal_edit_karyawan input[name=birth]').val(birth);
    $('#modal_edit_karyawan input[name=phone]').val(phone);
    $('#modal_edit_karyawan select[name=gender]').val(gender);
    $('#modal_edit_karyawan input[name=start_work]').val(start_work);
    $('#modal_edit_karyawan').modal('show');
    $('#btn_edit').off('click');
    $("#btn_edit").click(function () {
        editKaryawan(id);
    });
}

function editKaryawan(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'PATCH',
        url: '/admin/karyawan/' + id,
        timeout: 2000,
        data: {
            name: $('#modal_edit_karyawan input[name=name]').val(),
            username: $('#modal_edit_karyawan input[name=username]').val(),
            password: $('#modal_edit_karyawan input[name=password]').val(),
            jabatan: $('#modal_edit_karyawan select[name=jabatan]').val(),
            address: $('#modal_edit_karyawan .alamat').val(),
            birth: $('#modal_edit_karyawan input[name=birth]').val(),
            phone: $('#modal_edit_karyawan input[name=phone]').val(),
            gender: $('#modal_edit_karyawan select[name=gender]').val(),
            start_work: $('#modal_edit_karyawan input[name=start_work]').val(),
        },
        dataType: 'json',
        beforeSend: function () {
            Swal.fire({
                title: 'Loading...',
                showConfirmButton: false,
                allowOutsideClick: false
            });
            arr_err = ['name', 'username', 'jabatan', 'address', 'birth', 'phone', 'gender', 'start_work'];
            for (let index = 0; index < arr_err.length; index++) {
                $('#modal_edit_karyawan small[name=' + arr_err[index] + ']').removeClass('d-block').addClass('d-none');
            }
        },
        success: function (data) {
            $('#modal_edit_karyawan').modal('hide');
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
            Swal.close();
            if (errortype == 'timeout') {
                Swal.fire({
                    title: 'Connection Time Out!',
                    icon: 'warning',
                    showConfirmButton: true,
                });
            }
            var errors = $.parseJSON(data.responseText);
            arr_err = ['name', 'username', 'jabatan', 'address', 'birth', 'phone', 'gender', 'start_work'];
            for (let index = 0; index < arr_err.length; index++) {
                if (errors.messages[arr_err[index]] === undefined) {
                    $('#modal_edit_karyawan small[name=' + arr_err[index] + ']').removeClass('d-block').addClass('d-none');
                } else {
                    $('#modal_edit_karyawan small[name=' + arr_err[index] + ']').html(errors.messages[arr_err[index]]);
                    $('#modal_edit_karyawan small[name=' + arr_err[index] + ']').removeClass('d-none').addClass('d-block');
                }
            }
        }
    });
}

function deleteKaryawan(id, nama) {
    Swal.fire({
        title: 'Are You Sure!',
        html: 'Delete <b class="text-danger">'+nama+'</b>',
        icon: 'warning',
        confirmButtonText: 'Yes, Delete it!',
        confirmButtonColor: '#d33',
        showConfirmButton: true,
        showCancelButton: true,
    }).then((result) => {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'DELETE',
                url: '/admin/karyawan/' + id,
                timeout: 2000,
                beforeSend: function () {
                    Swal.fire({
                        title: 'Loading...',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                },
                success: function (data) {
                    Swal.fire({
                        title: 'Terhapus!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 700
                    });
                    setTimeout(() => {
                        window.location.reload();
                    }, 700);
                },
                error: function (data) {
                    Swal.fire({
                        title: 'Connection Time Out!',
                        icon: 'warning',
                        showConfirmButton: true,
                    });
                }
            });
        }
    });
}
