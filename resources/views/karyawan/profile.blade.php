@extends('layout/karyawan')
@section('title', 'Profile')
@section('add_style')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div style="margin-left: 15%; margin-right: 15%">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Change Password</h1>
                        </div>
                        <form id="form_password" class="user">
                            <div class="form-group">
                                <input style="text-align: center" type="password" class="form-control form-control-user" name="password" placeholder="Isi Untuk Mengubah Password">
                                <small name="password" class="form-text text-center text-danger d-none"></small>
                            </div>
                            <div class="form-group">
                                <input style="text-align: center" type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Ulangi Password">
                                <small name="password_confirmation" class="form-text text-center text-danger d-none"></small>
                            </div>
                        </form>
                        <button onclick="change()" class="btn btn-primary btn-user btn-block">
                            Save Change
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('add_script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
function change(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'PATCH',
        url: '/karyawan/password',
        timeout: 2000,
        data: {
            password: $('#form_password input[name=password]').val(),
            password_confirmation: $('#form_password input[name=password_confirmation]').val(),
        },
        beforeSend: function(){
            Swal.fire({
                title: 'Loading...',
                showConfirmButton: false,
                allowOutsideClick: false
            });
            arr_err = ['password', 'password_confirmation'];
            for (let index = 0; index < arr_err.length; index++) {
                $('#form_password small[name=' + arr_err[index] + ']').removeClass('d-block').addClass('d-none');
            }
        },
        success: function(data){
            Swal.fire({
                title: 'Password Changed!',
                icon: 'success',
                showConfirmButton: false,
                timer: 700
            });
            setTimeout(() => {
                window.location.reload();
            }, 700);
        },
        error: function(data, errortype){
            Swal.close();
            if(errortype == 'timeout'){
                Swal.fire({
                    title: 'Connection Time Out!',
                    icon: 'warning',
                    showConfirmButton: true,
                });
            }
            var errors = $.parseJSON(data.responseText);
            arr_err = ['password', 'password_confirmation'];
            for (let index = 0; index < arr_err.length; index++) {
                if (errors.messages[arr_err[index]] === undefined) {
                    $('#form_password small[name=' + arr_err[index] + ']').removeClass('d-block').addClass('d-none');
                } else {
                    $('#form_password small[name=' + arr_err[index] + ']').html(errors.messages[arr_err[index]]);
                    $('#form_password small[name=' + arr_err[index] + ']').removeClass('d-none').addClass('d-block');
                }
            }
        }
    });
}
</script>
@endsection
