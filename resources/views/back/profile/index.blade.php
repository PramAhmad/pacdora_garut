@extends('back.layout.app')
@section('title', 'Profile')
@section('content')
<div class="container-fluid">

    <div class="card">

        <div class="card-body">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-stretch">
                            <div class="card w-100 position-relative overflow-hidden">
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold">Change Profile</h5>
                                    <p class="card-subtitle mb-4">Change your profile picture from here</p>
                                    <div class="text-center">
                                        <img src="{{asset('admin/package/dist/images/profile/user-1.jpg')}}" alt="" class="img-fluid rounded-circle" width="120" height="120">
                                        <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                                            <button class="btn btn-primary">Upload</button>
                                            <button class="btn btn-outline-danger">Reset</button>
                                        </div>
                                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-stretch">
                            <div class="card w-100 position-relative overflow-hidden">
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-semibold">Change Password</h5>
                                    <p class="card-subtitle mb-4">To change your password please confirm here</p>
                                    <form action="{{route('account.update')}}">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="currentPassword" class="form-label fw-semibold"> Email</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="currentPassword" name="email" value="{{Auth::user()->email}}">

                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="newPassword" class="form-label fw-semibold">New Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="newPassword" name="password">
                                                <button type="button" class="btn btn-outline-secondary" id="toggleNewPassword">
                                                    <i class="ti ti-eye fs-7"></i>
                                                </button>
                                            </div>
                                        </div>
                                    
                                        <div class="d-flex align-items-center justify-content-between mt-4">
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        function togglePasswordVisibility(inputId, buttonId) {
            var input = $(inputId);
            var button = $(buttonId);

            button.on('click', function() {
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    button.html('<i class="ti ti-eye-off fs-7"></i>');
                } else {
                    input.attr('type', 'password');
                    button.html('<i class="ti ti-eye fs-7"></i>');
                }
            });
        }



        togglePasswordVisibility('#newPassword', '#toggleNewPassword');
      
    });
</script>
<!-- cdn swal -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- kirim update account -->
<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            var data = form.serialize();
            $.ajax({
                url: url,
                type: 'PUT',
                data: data,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message,
                    });
                },
                error: function(xhr) {
                    var res = xhr.responseJSON;
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: res.message,
                    });
                }
            });
        });
    });
</script>


@endsection