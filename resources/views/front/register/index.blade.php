@extends('front.layouts.app')

@section("content")
<main class="pt-[5.5rem] lg:pt-24">
  <!-- Contact -->
  <section class="relative py-24 dark:bg-jacarta-800">
    <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
      <img src="template/dist/img/gradient_light.jpg" alt="gradient" class="h-full w-full" />
    </picture>
    <div class="container">
      <div class="lg:flex">
        <!-- Contact Form -->
        <div class="mb-12 lg:mb-0 lg:w-2/3 lg:pr-12">
          <h2 class="mb-4 font-display text-xl text-jacarta-700 dark:text-white">Daftar</h2>
          <p class="mb-16 text-lg leading-normal dark:text-jacarta-300">
            Isi data dengan benar
          </p>
          <form id="register-form" method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
            @csrf
           
              <div class="mb-6 ">
                <label for="name" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">
                  Name Pemilik Usaha<span class="text-red">*</span>
                </label>
                <input
                  name="nama"
                  class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300"
                  id="name"
                  type="text"
                  required
          placeholder="Masukan Nama Sesuai KTP"
                />
                @error('name')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>


            <div class="flex space-x-7">
              <div class="mb-6 w-1/2">
                <label for="nama_usaha" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">
                  Name  Usaha<span class="text-red">*</span>
                </label>
                <input
                  name="nama_usaha"
                  class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300"
                  id="nama_usaha"
                  type="text"
                  placeholder="Masukan Nama Usaha Anda"
                  required
                />
                @error('name')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div class="mb-6 w-1/2">
                <label for="nohp" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">
                  No Hp<span class="text-red">*</span>
                </label>
                <input
                  name="nohp"
                  class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300"
                  id="nohp"
                  type="number"
                  required
                  placeholder="Masukan 10-15 Digit Nomor HP"
                />
                @error('email')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>
     
            <div class="flex space-x-7">
              <div class="mb-6 w-1/2">
                <label for="no_ktp" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">
                  Nomor KTP<span class="text-red">*</span>
                </label>
                <input
                  name="nik"
                  class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300"
                  id="no_ktp"
                  type="number"
                  required
                  placeholder="Masukan Nomor KTP Sesuai KTP"
                />
                @error('no_ktp')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

            <!-- is garut using radio -->
            <div class="mb-6">
              <label for="is_garut" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">
                Apakah Usaha Berada di Garut?<span class="text-red">*</span>
              </label>
              <div class="flex items center space-x-4 ">
                <div class="flex items-center space-x-2 mt-5">
                  <input
                    type="radio"
                    id="is_garut_yes"
                    name="is_garut"
                    value="1"
                    class="h-4 w-4 text-accent border-accent focus:ring-accent/20 dark:border-jacarta-600 dark:bg-jacarta-700"
                  />
                  <label for="is_garut_yes" class="text-sm dark:text-jacarta-200">Ya</label>
                </div>
                <div class="flex items
                center space-x-2 mt-5">
                  <input
                    type="radio"
                    id="is_garut_no"
                    name="is_garut"
                    value="0"
                    class="h-4 w-4 text-accent border-accent focus:ring-accent/20 dark:border-jacarta-600 dark:bg-jacarta-700"
                  />
                  <label for="is_garut_no" class="text-sm dark:text-jacarta-200">Tidak</label>

                  </div>
                  </div>
                  </div>

            </div>
            <!-- alamat usaha -->
            <div class="mb-6">
              <label for="alamat_usaha" class="mb-1 block
                font-display text-sm text-jacarta-700 dark:text-white">
                Alamat Usaha<span class="text-red">*</span>
              </label>
              <!-- textarea -->
              <textarea
                name="alamat_usaha"
                class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300"
                id="alamat_usaha"
                required
              ></textarea>
              @error('alamat_usaha')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div class="mt-6">
              <label for="file_ktp" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">
                Dokumen KTP<span class="text-red">*</span>
              </label>
              <input
                    type="file"
                    class="block w-full text-sm text-slate-500  border border-jacarta-100 py-1 px-1 rounded-lg 
                        file:mr-4 file:py-3 file:px-4 file:rounded-md
                        file:border-0 file:text-sm file:font-semibold
                        file:bg-accent-50 file:text-accent-700 
                        hover:file:bg-jacarta-100  dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300"
                        name="file_ktp"
                  />
              @error('file_ktp')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            <!-- file nib -->
            <div class="my-6">
              <label for="file_nib" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">
                Dokumen NIB<span class="text-red">*</span>
              </label>
              <input
                    type="file"
                    class="block w-full text-sm text-slate-500  border border-jacarta-100 py-1 px-1 rounded-lg 
                        file:mr-4 file:py-3 file:px-4 file:rounded-md
                        file:border-0 file:text-sm file:font-semibold
                        file:bg-accent-50 file:text-accent-700
                        hover:file:bg-jacarta-100  dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300"
                        name="file_nib"
                  />
              @error('file_nib')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            <!-- email password 1/2 1/2 -->
            <div class="flex space-x-7 mt-5">
              <div class="mb-6 w-1/2">
                <label for="email" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">
                  Email<span class="text-red">*</span>
                </label>
                <input
                  name="email"
                  class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300"
                  id="email"
                  type="email"
                  required
                />
                @error('email')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div class="mb-6 w-1/2">
                <label for="password" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">
                  Password<span class="text-red">*</span>
                </label>
                <input
                  name="password"
                  class="contact-form-input w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300"
                  id="password"
                  type="password"
                  required
                />
                @error('password')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="mb-6 mt-5 flex items-center space-x-2">
              <input
                type="checkbox"
                id="agree_to_terms"
                name="agree_to_terms"
                class="h-5 w-5 self-start rounded border-jacarta-200 text-accent checked:bg-accent focus:ring-accent/20 focus:ring-offset-0 dark:border-jacarta-500 dark:bg-jacarta-600"
              />
              <label for="agree_to_terms" class="text-sm dark:text-jacarta-200">
                I agree to the <a href="tos.html" class="text-accent">Terms of Service</a>
              </label>
              @error('agree_to_terms')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <button
              type="button"
              onclick="submitForm()"
              class="rounded-full bg-accent py-3 px-8 text-center font-semibold text-white shadow-accent-volume transition-all hover:bg-accent-dark"
              id="contact-form-submit"
            >
              Submit
            </button>

            <div
              id="contact-form-notice"
              class="relative mt-4 hidden rounded-lg border border-transparent p-4"
            ></div>
          </form>
        </div>

        <!-- Info -->
        <div class="lg:w-1/3 lg:pl-5">
          <h2 class="mb-4 font-display text-xl text-jacarta-700 dark:text-white">Informasi</h2>
          <p class="mb-6 text-lg leading-normal dark:text-jacarta-300">
            Jika kamu memiliki pertanyaan bisa langsung contact di bawah ini
          </p>

          <div class="rounded-2.5xl border border-jacarta-100 bg-white p-10 dark:border-jacarta-600 dark:bg-jacarta-700">
            <div class="mb-6 flex items-center space-x-5">
              <span
                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-jacarta-100 bg-light-base dark:border-jacarta-600 dark:bg-jacarta-700"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                  class="fill-jacarta-400"
                >
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M9.366 10.682a10.556 10.556 0 0 0 3.952 3.952l.884-1.238a1 1 0 0 1 1.294-.296 11.422 11.422 0 0 0 4.583 1.364 1 1 0 0 1 .921.997v4.462a1 1 0 0 1-.898.995c-.53.055-1.064.082-1.602.082C9.94 21 3 14.06 3 5.5c0-.538.027-1.072.082-1.602A1 1 0 0 1 4.077 3h4.462a1 1 0 0 1 .997.921A11.422 11.422 0 0 0 10.9 8.504a1 1 0 0 1-.296 1.294l-1.238.884zm-2.522-.657l1.9-1.357A13.41 13.41 0 0 1 7.9 5.51l-1.357 1.9zm9.343 6.857a9.55 9.55 0 0 1-3.634 3.634l-1.9 1.357a13.41 13.41 0 0 1-2.565-2.565l1.357-1.9a9.55 9.55 0 0 1 3.634-3.634l1.9-1.357a13.41 13.41 0 0 1 2.565 2.565l-1.357 1.9z"
                  />
                </svg>
              </span>
              <div class="text-sm">
                <h3 class="font-semibold text-jacarta-700 dark:text-white">Telepon</h3>
                <a href="tel:+610101010" class="text-jacarta-500">+610101010</a>
              </div>
            </div>
            <div class="mb-6 flex items-center space-x-5">
              <span
                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-jacarta-100 bg-light-base dark:border-jacarta-600 dark:bg-jacarta-700"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                  class="fill-jacarta-400"
                >
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M9.366 10.682a10.556 10.556 0 0 0 3.952 3.952l.884-1.238a1 1 0 0 1 1.294-.296 11.422 11.422 0 0 0 4.583 1.364 1 1 0 0 1 .921.997v4.462a1 1 0 0 1-.898.995c-.53.055-1.064.082-1.602.082C9.94 21 3 14.06 3 5.5c0-.538.027-1.072.082-1.602A1 1 0 0 1 4.077 3h4.462a1 1 0 0 1 .997.921A11.422 11.422 0 0 0 10.9 8.504a1 1 0 0 1-.296 1.294l-1.238.884zm-2.522-.657l1.9-1.357A13.41 13.41 0 0 1 7.9 5.51l-1.357 1.9zm9.343 6.857a9.55 9.55 0 0 1-3.634 3.634l-1.9 1.357a13.41 13.41 0 0 1-2.565-2.565l1.357-1.9a9.55 9.55 0 0 1 3.634-3.634l1.9-1.357a13.41 13.41 0 0 1 2.565 2.565l-1.357 1.9z"
                  />
                </svg>
              </span>
              <div class="text-sm">
                <h3 class="font-semibold text-jacarta-700 dark:text-white">Email</h3>
                <a href="mailto:admin@jacarta.com" class="text-jacarta-500">admin@jacarta.com</a>
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

<script>
  $(document).ready(function() {
    function submitForm() {
      let formData = new FormData($('#register-form')[0]);

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

@endsection
