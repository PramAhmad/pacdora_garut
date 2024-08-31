@extends('front.layouts.app')
@push('css')
  
@endpush

@section("content")
<main class="">
  <!-- Contact -->
  <section class="relative py-10 ">
    <picture class="pointer-events-none absolute inset-0 -z-10 ">
      <img src="template/dist/img/gradient_light.jpg" alt="gradient" class="h-full w-full" />
    </picture>
    <div class="container">
      <div class="lg:flex">
        <!-- Contact Form -->
        <div class="mb-12 lg:mb-0 lg:w-2/3 lg:pr-12">
          <h2 class="mb-4 font-display text-xl text-jacarta-700 ">Daftar</h2>
          <p class="mb-16 text-lg leading-normal ">
            Isi data dengan benar
          </p>
          <form id="register-form" method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-6 ">
              <label for="name" class="mb-1 block font-display text-sm text-jacarta-700 ">
                Nama Pemilik Usaha<span class="text-red">*</span>
              </label>
              <input name="nama" class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent  " id="name" type="text" required placeholder="Masukan Nama Sesuai KTP" />
              @error('name')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>


            <div class="flex space-x-7">
              <div class="mb-6 w-1/2">
                <label for="nama_usaha" class="mb-1 block font-display text-sm text-jacarta-700 ">
                  Nama Usaha<span class="text-red">*</span>
                </label>
                <input name="nama_usaha" class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent  " id="nama_usaha" type="text" placeholder="Masukan Nama Usaha Anda" required />
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div class="mb-6 w-1/2">
                <label for="nohp" class="mb-1 block font-display text-sm text-jacarta-700 ">
                  No Hp<span class="text-red">*</span>
                </label>
                <input name="nohp" class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent  " id="nohp" type="number" required placeholder="Masukan 10-15 Digit Nomor HP" />
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="flex space-x-7">
              <div class="mb-6 w-1/2">
                <label for="no_ktp" class="mb-1 block font-display text-sm text-jacarta-700 ">
                  Nomor KTP<span class="text-red">*</span>
                </label>
                <input name="nik" class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent  " id="no_ktp" type="number" required placeholder="Masukan Nomor KTP Sesuai KTP" />
                @error('no_ktp')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <!-- is garut using radio -->
              <div class="mb-6">
                <label for="is_garut" class="mb-1 block font-display text-sm text-jacarta-700 ">
                  Apakah Usaha Berada di Garut?<span class="text-red">*</span>
                </label>
                <div class="flex items-center space-x-4">
                  <div class="flex items-center space-x-2 ">
                    <input type="radio" id="is_garut_yes" name="is_garut" value="1" class="h-4 w-4 text-accent border-accent focus:ring-accent/20" />
                    <label for="is_garut_yes" class="text-sm">Ya</label>
                  </div>
                  <div class="flex items-center space-x-2 ">
                    <input type="radio" id="is_garut_no" name="is_garut" value="0" class="h-4 w-4 text-accent  border-accent focus:ring-accent/20" />
                    <label for="is_garut_no" class="text-sm" id="label_is_garut_no">Tidak</label>
                    <div id="domisili_input" style="display: none;">

                      <input type="text" id="domisili" name="domisili" placeholder="masukan domisili" class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent  " />
                    </div>
                  </div>
                </div>
              </div>





            </div>
            <div class="mb-6">
              <label for="wilayah" class="mb-3 block
                font-display text-sm text-jacarta-700 ">Wilayah
                <span class="text-red">*</span>
              </label>
              <select name="wilayah" id="wilayah" class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent  wilayah "></select>
            </div>
            <!-- alamat usaha -->
            <div class="mb-6">
              <label for="alamat_usaha" class="mb-1 block
                font-display text-sm text-jacarta-700 ">
                Alamat Usaha<span class="text-red">*</span>
              </label>
              <!-- textarea -->
              <textarea name="alamat_usaha" class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent  " id="alamat_usaha" required></textarea>
              @error('alamat_usaha')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            <!-- disabilitas -->


            <!-- email password 1/2 1/2 -->
            <div class="flex space-x-7 mt-5">
              <div class="mb-6 w-1/2">
                <label for="email" class="mb-1 block font-display text-sm text-jacarta-700 ">
                  Email<span class="text-red">*</span>
                </label>
                <input name="email" class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent  " id="email" type="email" required />
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div class="mb-6 w-1/2">
                <label for="password" class="mb-1 block font-display text-sm text-jacarta-700 ">
                  Password<span class="text-red">*</span>
                </label>
                <input name="password" class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent  " id="password" type="password" required />
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <!-- refresnsi -->
             <div class="flex space-x-7 mt-5">

               <div class="mb-6 w-1/2">
                 <label for="referensi" class="mb-1 block font-display text-sm text-jacarta-700 ">
                   Referensi<span class="text-red">*</span>
                 </label>
                 <select name="referensi" id="" class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent  ">
                   <option value="">Pilih Referensi</option>
                   <option value="0">Dinas Koperasi dan UKM Kab. Garut</option>
                   <option value="1">Website</option>
                   <option value="2">Social Media</option>
                   <option value="3">Lainya</option>
                 </select>
                 @error('referensi')
                 <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                 @enderror
               </div>
               <!-- disabilitas select -->
                <div class="mb-6 w-1/2">
                  <label for="disabilitas" class="mb-1 block font-display text-sm text-jacarta-700 ">
                    Disabilitas<span class="text-red">*</span>
                  </label>
                  <select name="disabilitas" id="" class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent  ">
                    <option value="" aria-readonly="">Pilih Disabilitas</option>
                    <option value="tidak">Tidak</option>
                    <option value="ya">Ya</option>
                  </select>
                  @error('disabilitas')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                  @enderror
                  </div>  
             </div>

            <div class="mb-6 mt-5 flex items-center space-x-2">
              <input type="checkbox" id="agree_to_terms" name="agree_to_terms" class="h-5 w-5 self-start rounded border-jacarta-200 text-accent checked:bg-accent focus:ring-accent/20 focus:ring-offset-0" />
              <label for="agree_to_terms" class="text-sm">
                I agree to the <a href="tos.html" class="text-accent">Terms of Service</a>
              </label>
              @error('agree_to_terms')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <button type="button" onclick="submitForm()" class="rounded-full bg-accent py-3 px-8 text-center font-semibold text-white shadow-accent-volume transition-all hover:bg-accent-dark" id="contact-form-submit">
              Submit
            </button>

            <div id="contact-form-notice" class="relative mt-4 hidden rounded-lg border border-transparent p-4"></div>
          </form>
        </div>

        <!-- Info -->
        <div class="lg:w-1/3 lg:pl-5">
          <h2 class="mb-4 font-display text-xl text-jacarta-700 ">Informasi</h2>
          <p class="mb-6 text-lg leading-normal ">
            Jika kamu memiliki pertanyaan bisa langsung contact di bawah ini
          </p>

          <div class="rounded-2.5xl border border-jacarta-100 bg-white p-10">
            <div class="mb-6 flex items-center space-x-5">
              <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-jacarta-100 bg-light-base">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
</svg>

              </span>
              <div class="text-sm">
                <h3 class="font-semibold text-jacarta-700 ">Telepon</h3>
                <a href="tel:+610101010" class="text-jacarta-500">(62) 859-12356-9232</a>
              </div>
            </div>
            <div class="mb-6 flex items-center space-x-5">
              <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-jacarta-100 bg-light-base">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
</svg>

              </span>
              <div class="text-sm">
                <h3 class="font-semibold text-jacarta-700 ">Email</h3>
                <a href="mailto:admin@jacarta.com" class="text-jacarta-500">diskopukm.garut@gmail.com</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- jqeury -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
  $(document).ready(function() {
    function submitForm() {
      let formData = new FormData($('#register-form')[0]);
      formData.append('_token', '{{ csrf_token() }}');

      $.ajax({
        url: '{{ route("register.store") }}',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          console.log(data);
          if (data.success) {
            Swal.fire({
              icon: 'success',
              title: 'Registrasi Berhasil!',
              text: 'Terima kasih telah mendaftar.',
              confirmButtonColor: '#4CAF50',
              confirmButtonText: 'Ok'
            }).then(() => {
              window.location.href = '{{ route("home") }}';
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Terjadi kesalahan saat memproses data.',
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
              text: 'Terjadi kesalahan saat memproses data.',
              confirmButtonColor: '#EF4444',
              confirmButtonText: 'Ok'
            });
          }

          $('#contact-form-notice').html('<p class="text-red-500 text-sm mt-1">Terjadi kesalahan saat memproses data.</p>');
        }
      });
    }

    $('#contact-form-submit').click(function(e) {
      e.preventDefault();
      submitForm();
    });
  });
</script>
<script>
  $(".select2").select2({

    placeholder: "Pilih Wilayah",
    allowClear: true
  });

  $('.wilayah').select2({

    placeholder: "Cari Kecamatan, Kota atau Provinsi",
    minimumInputLength: 1,
    ajax: {
      url: `{{ route('ajax.wilayah.search') }}`,
      dataType: 'json',
      delay: 250,
      processResults: function(data) {
        return {
          results: $.map(data.data, function(item) {
            return {
              text: `${item.nama_provinsi}, ${item.nama_kota}, ${item.nama_kecamatan}, ${item.nama_kelurahan}`,
              id: item.id,
            }
          }),
          pagination: {
            more: data.more_pagination
          }
        }
      },
      cache: true
    }
  })
</script>

<script>
  $(document).ready(function() {
    $('input[name="is_garut"]').on('change', function() {
      if ($('input[name="is_garut"]:checked').val() == '0') {
        $('#domisili_input').show();
        $('#is_garut_no').hide();
        $('#label_is_garut_no').hide();
      } else {
        $('#domisili_input').hide();
        $('#domisili').val('');
        $('#is_garut_no').show();
        $('#label_is_garut_no').show();
      }
    });
  });
</script>
<script>
    $('#no_ktp').on('input', function() {
            if ($(this).val().length > 16) {
                $(this).val($(this).val().slice(0, 16))
            }
        }) 
        $('#nohp').on('input',function(){
          if($(this).val().length > 15){
            $(this).val($(this).val().slice(0,15))
          }
        })
</script>


@endsection