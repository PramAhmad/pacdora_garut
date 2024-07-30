@extends('front.layouts.app')
@section('content')
<div class="container">
    <div class="flex w-full justify-center items-center h-[80vh]">
        <div class="w-[40%] bg-light-base py-10 px-5 rounded-lg border border-jacarta-100">
            <h3 class="text-center text-xl text-accent font-semibold ">Login</h3>
            <p class="text-center text-base mt-2">Isi email dan password dengan benar</p>
            <form  id="login-form">
                @csrf
                <div class="mt-5">
                    <label for="email" class="text-accent">Email</label>
                    <input type="email" name="email" id="email" class="w-full border border-jacarta-100 rounded-lg px-3 py-2 mt-1">
                </div>
                <div class="mt-5">
                    <label for="password" class="text-accent">Password</label>
                    <input type="password" name="password" id="password" class="w-full border border-jacarta-100 rounded-lg px-3 py-2 mt-1">
                </div>
                <div class="mt-5">
                    <button type="button" onclick="submitForm()" id="login-button" class="w-full bg-accent text-white rounded-lg py-2">Login</button>
                </div>
                <div class="mt-5">
                    <p class="text-center">Belum punya akun? <a href="{{ route('register') }}" class="text-accent">Daftar</a></p>
                </div>
            </form>
        </div>
    </div>
</div>


@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- jqeury -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    function submitForm() {
      let formData = new FormData($('#login-form')[0]);
      formData.append('_token', '{{ csrf_token() }}');
      

      $.ajax({
        url: '{{ route("login.store") }}',
        method: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:
        formData,

        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);
          if (data.success) {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil Login!',
              text: data.message,
              confirmButtonColor: '#4CAF50',
              confirmButtonText: 'Ok'
            }).then(() => {
              window.location.href = '{{ route("home") }}'; 
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: data.message,
              confirmButtonColor: '#EF4444',
              confirmButtonText: 'Ok'
            });
          }
        },
        error: function(xhr, status, error) {
          if (xhr.responseJSON.errors) {
            
            let errorsHtml = '<ul>';
            $.each(xhr.responseJSON.errors, function(key, value) {
              errorsHtml += '<li>' + value[0] + '</li>'; 
            });
            errorsHtml += '</ul>';
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              html: errorsHtml,
              confirmButtonColor: '#EF4444',
              confirmButtonText: 'Ok'
            });

  
            $('#contact-form-notice').html(errorsHtml);
          } else if (xhr.responseJSON.message) {
       
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: xhr.responseJSON.message,
              confirmButtonColor: '#EF4444',
              confirmButtonText: 'Ok'
            });
          } else {
          
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: xhr.responseJSON.message,
              confirmButtonColor: '#EF4444',
              confirmButtonText: 'Ok'
            });
          }

          $('#contact-form-notice').html('<p class="text-red-500 text-sm mt-1">Terjadi kesalahan saat memproses data.</p>');
        }
      });
    }

    $('#login-button').click(function(e) {
      e.preventDefault();
      submitForm();
    });
  });
</script>
@endpush
@endsection