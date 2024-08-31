@extends('front.layouts.app')
@section('content')
<main class="  overflow-x-hidden ">
  <!-- Banner -->
  <div class="relative">
    <img src="{{asset('template/dist/img/user/banner.jpg')}}" alt="banner" class="h-[18.75rem] object-cover" />
  </div>
  <!-- end banner -->

  <!-- Profile -->
  <section class="relative bg-light-base pb-12 pt-28 ">
    <!-- Avatar -->
    <div class="absolute left-1/2 top-0 z-10 flex -translate-x-1/2 -translate-y-1/2 items-center justify-center">
      <figure class="relative">
        <img src="{{asset('template/dist/img/user/user_avatar.gif')}}" alt="collection avatar" class="rounded-xl border-[5px] border-white " />
        <div class="absolute -right-3 bottom-0 flex h-6 w-6 items-center justify-center rounded-full border-2 border-white bg-green " data-tippy-content="Verified Collection">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-[.875rem] w-[.875rem] fill-white">
            <path fill="none" d="M0 0h24v24H0z"></path>
            <path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
          </svg>
        </div>
      </figure>
    </div>

    <div class="container">
      <div class="text-center">
        <h2 class="mb-2 font-display text-4xl font-medium text-jacarta-700 ">{{$umkm->nama}}</h2>
        <div class="mb-8 inline-flex items-center justify-center rounded-full border border-accent bg-accent py-1.5 px-4 ">

          <button class="js-copy-clipboard max-w-[10rem] select-none overflow-hidden text-ellipsis whitespace-nowrap text-white " data-tippy-content="Copy">
            <span>{{$umkm->approved == 1 ? 'Terverifikasi' : 'Tidak Terverifikasi'}}</span>
          </button>
        </div>

        <p class="mx-auto mb-2 max-w-xl text-lg ">
          {{$umkm->nama_usaha}}
        </p>
        <span class="text-jacarta-400">Bergabung {{ Carbon\Carbon::parse($umkm->created_at)->format('d F Y') }}
        </span>

        <div class="mt-6 flex items-center justify-center space-x-2.5">
          @if ($umkm->approved == 1)
          <div class="p-3 rounded-full bg-accent-lightest border border-accent-lighter ">

            <span class="text-accent-dark">Akun sudah berhasil di terima sekarang kamu dapat menggunakan semua fitur
              myopia</span>
          </div>
          @elseif($umkm->approved == 0)
          <div class="p-3 rounded-full bg-yellow-bright ">
            <span class="text-yellow ">Akun sedang dalam tahap pengecekan data harap periksa kembali data kamu</span>
          </div>
          @else
          <div class="p-3 rounded-full bg-red-bright">

            <span class="text-red">Akun kamu belum aktif dikarenakan {{$umkm->alasan_reject}} </span>
          </div>
          @endif
        </div>
      </div>
    </div>
  </section>
  <!-- end profile -->

  <!-- Collection -->
  <section class="relative py-24 pt-20">
    <picture class="pointer-events-none absolute inset-0 -z-10 ">
      <img src="{{asset('template/dist/img/gradient_light.jpg')}}" alt="gradient" class="h-full w-full" />
    </picture>
    <div class="container">
      <!-- Tabs Nav -->
      <ul class="nav nav-tabs scrollbar-custom mb-12 flex items-center justify-start overflow-x-auto overflow-y-hidden border-b border-jacarta-100 pb-px  md:justify-center" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active relative flex items-center whitespace-nowrap py-3 px-6 text-jacarta-400 hover:text-jacarta-700 " id="informasi-tab" data-bs-toggle="tab" data-bs-target="#informasi" type="button" role="tab" aria-controls="informasi" aria-selected="true">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-1 h-5 w-5 size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
            </svg>

            <span class="font-display text-base font-medium">Informasi</span>
          </button>
        </li>


        <li class="nav-item" role="presentation">
          <button class="nav-link relative flex items-center whitespace-nowrap py-3 px-6 text-jacarta-400 hover:text-jacarta-700 " id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity" type="button" role="tab" aria-controls="activity" aria-selected="false">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-1 h-5 w-5  size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>

            <span class="font-display text-base font-medium">History Design</span>
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link relative flex items-center whitespace-nowrap py-3 px-6 text-jacarta-400 hover:text-jacarta-700 " id="pendampingan-tab" data-bs-toggle="tab" data-bs-target="#pendampingan" type="button" role="tab" aria-controls="pendampingan" aria-selected="false">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-1 h-5 w-5  size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
            </svg>


            <span class="font-display text-base font-medium">Pendampingan</span>
          </button>
        </li>
      </ul>
      <div class="tab-content">

        <div class="tab-pane fade show active " id="informasi" role="tabpanel" aria-labelledby="informasi-tab">
          <form id="update-profile-form" action="/profile/update/{{$umkm->id}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mx-auto md:flex pt-16">
              <!-- Form -->
              <div class="mb-12 md:w-1/2 md:pr-8">
                <div class="mb-6">
                  <label for="profile-username" class="mb-1 block font-display text-sm text-jacarta-700 ">Nama Pemilik<span class="text-red">*</span></label>
                  <input type="text" id="profile-username" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent " placeholder="Enter username" value="{{ $umkm->nama }}" name="nama" required />
                </div>
                <div class="mb-6">
                  <label for="profile-bio" class="mb-1 block font-display text-sm text-jacarta-700 ">NIK<span class="text-red">*</span></label>
                  <input type="text" id="profile-bio" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent " required placeholder="Enter NIK" value="{{ $umkm->nik }}" name="nik" />
                </div>
                <div class="mb-6">
                  <!-- is garut -->
                  <div class="mb-6">
                    <label for="is_garut" class="mb-1 block font-display text-sm text-jacarta-700 ">Domisili<span class="text-red">*</span></label>
                    <div class="flex items-center space-x-2">
                      <input type="radio" id="is_garut_ya" name="is_garut" value="ya" {{ $umkm->is_garut == 'ya' ? 'checked' : '' }} class="h-4 w-4 text-accent border-accent focus:ring-accent/20  " />
                      <label for="is_garut_ya" class="text-jacarta-700 ">Garut</label>
                      <input type="radio" id="is_garut_tidak" name="is_garut" value="tidak" {{ $umkm->is_garut == 'tidak' ? 'checked' : '' }} class="h-4 w-4 text-accent border-accent focus:ring-accent/20  " />
                      <label for="is_garut_tidak" class="text-jacarta-700 ">Bukan Garut</label>
                    </div>
                  </div>

                  <div class="mb-6" id="domisili_field" style="display: none;">
                    <input type="text" id="domisili" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent " placeholder="Masukin Domisili" value="{{ old('domisili', $umkm->domisili ?? '') }}" name="domisili" />
                  </div>
                </div>

                <div class="mb-6">
                  <label for="referensi" class="mb-1 block font-display text-sm text-jacarta-700 ">Referensi<span class="text-red">*</span></label>
                  @php
                  $referensi = [
                  0 => 'Dinas Koperasi dan UKM Kab. Garut',
                  1 => 'Website',
                  2 => 'Social Media',
                  3 => 'Lainya',
                  ];
                  @endphp
                  <select name="referensi" id="referensi" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent ">
                    <option value="">Pilih Referensi</option>
                    @foreach ($referensi as $key => $item)
                    <option value="{{ $key }}" {{ $umkm->referensi == $key ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-6">
                  <label class="mb-1 block font-display text-sm text-jacarta-700 ">No Hp</label>
                  <input type="text" id="profile-phone" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent " required placeholder="Enter phone number" value="{{ $umkm->nohp }}" name="nphp" />
                </div>
                <button type="submit" class="rounded-full bg-accent py-3 px-8 text-center font-semibold text-white shadow-accent-volume transition-all ">
                  Update Profile
                </button>
              </div>

              <div class="md:w-1/2 md:pl-8">
                <!-- Nama Usaha -->
                <div class="mb-6">
                  <label for="profile-username" class="mb-1 block font-display text-sm text-jacarta-700 ">
                    Nama Usaha<span class="text-red">*</span>
                  </label>
                  <input type="text" id="profile-username" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent " placeholder="Enter username" value="{{ $umkm->nama_usaha }}" name="nama_usaha" required />
                </div>

                <!-- Alamat Usaha -->
                <div class="mb-6">
                  <label for="profile-username" class="mb-1 block font-display text-sm text-jacarta-700 ">
                    Alamat Usaha<span class="text-red">*</span>
                  </label>
                  <input type="text" id="profile-username" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent " placeholder="Enter username" value="{{ $umkm->alamat_usaha }}" name="alamat_usaha" required />
                </div>

                <!-- Disabilitas -->
                <div class="mb-6">
                  <label for="disabilitas" class="mb-1 block font-display text-sm text-jacarta-700 ">
                    Disabilitas<span class="text-red">*</span>
                  </label>
                  <div class="flex items-center space-x-2">
                    <input type="radio" id="disabilitas_ya" name="disabilitas" value="ya" {{ $umkm->disabilitas == 'ya' ? 'checked' : '' }} class="h-4 w-4 text-accent border-accent focus:ring-accent/20  " />
                    <label for="disabilitas_ya" class="text-jacarta-700 ">Ya</label>
                    <input type="radio" id="disabilitas_tidak" name="disabilitas" value="tidak" {{ $umkm->disabilitas == 'tidak' ? 'checked' : '' }} class="h-4 w-4 text-accent border-accent focus:ring-accent/20  " />
                    <label for="disabilitas_tidak" class="text-jacarta-700 ">Tidak</label>
                  </div>
                </div>

                <!-- Wilayah Select -->
                <div class="mb-6">
                  <label for="wilayah" class="mb-1 block font-display text-sm text-jacarta-700 ">
                    Wilayah<span class="text-red">*</span>
                  </label>
                  <select name="wilayah" id="wilayah" class="form-select wilayah"></select>
                </div>

                <!-- Hidden Fields for IDs -->
                <input type="hidden" name="provinsi_id" id="provinsi_id">
                <input type="hidden" name="kota_id" id="kota_id">
                <input type="hidden" name="kecamatan_id" id="kecamatan_id">
                <input type="hidden" name="kelurahan_id" id="kelurahan_id">

                <!-- Display the Input for Address Preview -->
                <div class="mb-6">
                  <input type="text" id="address-preview" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent " value="{{ $umkm->provinsi->nama_provinsi . ', ' . $umkm->kota->nama_kota . ', ' . $umkm->kecamatan->nama_kecamatan . ', ' . $umkm->kelurahan->nama_kelurahan }}" name="wilayah" readonly />
                </div>
              </div>
            </div>
          </form>

        </div>
        <!-- end activity tab -->

        <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
          <!-- Records / Filter -->
          <div class="lg:flex">
            <!-- Records -->
            <div class="mb-10 shrink-0 basis-8/12 space-y-5 lg:mb-0 lg:pr-10">
              @forelse ($data as $item)
              <div href="" class="relative flex items-center rounded-2.5xl border border-jacarta-100 bg-white p-8 transition-shadow hover:shadow-lg " data-id="{{$item['id']}}">
                <figure class="mr-5 self-start">
                  <img src="{{$item['screenshot']}}" alt="avatar 2" class="rounded-2lg w-32 h-32 object-cover" loading="lazy" />
                </figure>

                <div>
                  <div class="flex gap-1">
                    <a href="{{route('profile.design', ['id' => $item['id']])}}" class="mb-1 font-display text-base font-semibold text-jacarta-700  judul">{{$item['name']}}</a>
                    <div class="   rounded-full p-1 -translate-y-6">
                      <a id="modal-title">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                      </a>
                     
                    </div>
                  </div>

                  <span class="mb-3 block text-sm text-jacarta-500">width {{$item['width']}} / height
                    {{$item['height']}}</span>
                  <span class="block text-xs text-jacarta-300">Panjang {{$item['length']}}</span>
                </div>
                <div class="ml-auto rounded-full border border-jacarta-100 p-3  svg-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24" stroke-width="1.5" stroke="currentColor" class="svg-doc">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" id="icon" />
                  </svg>


                </div>
                <!-- delete button -->
                <div class="absolute left-10 top-10 ">
                
                  <div class="text-jacarta-500">
                    
                    <button class="delete-design" onclick="deleteconfirm(`{{$item['id']}}`)">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
              @empty
              <h3 class="text-left text-accent text-sm py-5">Belum Ada Design</h3>
              @endforelse
            </div>

            <!-- Filters -->
            <aside class="basis-4/12 lg:pl-5">
              <form action="search" class="relative mb-12 block">
                <input type="search" class="w-full rounded-2xl border border-jacarta-100 py-[0.6875rem] px-4 pl-10 text-jacarta-700 placeholder-jacarta-500 focus:ring-accent" placeholder="Search" />
                <span class="absolute left-0 top-0 flex h-full w-12 items-center justify-center rounded-2xl">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-4 w-4 fill-jacarta-500">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z">
                    </path>
                  </svg>
                </span>
              </form>


            </aside>
          </div>
        </div>
        <!-- end activity tab -->
        <!-- penampingan tab -->
        <div class="tab-pane fade " id="pendampingan" role="tabpanel" aria-labelledby="pendampingan-tab">
          <h3 class="py-6 text-jacarta-600 text-xl ">Isi Formulir Pendampingan</h3>
          <form id="pendampingan-form" action="" method="POST">
            @csrf

            <!-- Klasifikasi Usaha -->
            <div class="mb-6">
              <label for="klasifikasi_usaha" class="mb-1 block font-display text-sm text-jacarta-700">Klasifikasi Usaha<span class="text-red">*</span></label>
              <!-- select mikro kecil menengah -->
              <select name="klasifikasi_usaha" id="klasifikasi_usaha" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" required>
                <option value="">Pilih Klasifikasi Usaha</option>
                <option value="0">Mikro</option>
                <option value="1">Kecil</option>
                <option value="2">Menengah</option>
              </select>
            </div>

            <!-- NPWP -->
            <div class="mb-6">
              <label for="npwp" class="mb-1 block font-display text-sm text-jacarta-700">NPWP<span class="text-red">*</span></label>
              <input type="text" id="npwp" name="npwp" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" placeholder="Enter NPWP" required />
            </div>

            <!-- Bidang Usaha -->
            <div class="mb-6">
              <label for="bidang_usaha_id" class="mb-1 block font-display text-sm text-jacarta-700">Bidang Usaha<span class="text-red">*</span></label>
              <select name="bidang_usaha_id" id="bidang_usaha_id" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" required>
                <!-- Assuming you have a list of bidang usahas -->
                @foreach($bidangUsaha as $b)
                <option value="{{ $b->id }}">{{ $b->nama }}</option>
                @endforeach
              </select>
            </div>

            <!-- Nama Produk -->
            <div class="mb-6">
              <label for="nama_produk" class="mb-1 block font-display text-sm text-jacarta-700">Nama Produk<span class="text-red">*</span></label>
              <input type="text" id="nama_produk" name="nama_produk" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" placeholder="Enter Nama Produk" required />
            </div>

            <!-- Deskripsi Usaha -->
            <div class="mb-6">
              <label for="deskripsi_usaha" class="mb-1 block font-display text-sm text-jacarta-700">Deskripsi Usaha<span class="text-red">*</span></label>
              <textarea id="deskripsi_usaha" name="deskripsi_usaha" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" placeholder="Enter Deskripsi Usaha" required></textarea>
            </div>

            <!-- Web -->
            <div class="mb-6">
              <label for="web" class="mb-1 block font-display text-sm text-jacarta-700">Website</label>
              <input type="text" id="web" name="web" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" placeholder="Enter Website" />
            </div>

            <!-- Instagram -->
            <div class="mb-6">
              <label for="ig" class="mb-1 block font-display text-sm text-jacarta-700">Instagram</label>
              <input type="text" id="ig" name="ig" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" placeholder="Enter Instagram Handle" />
            </div>

            <!-- TikTok -->
            <div class="mb-6">
              <label for="tiktok" class="mb-1 block font-display text-sm text-jacarta-700">TikTok</label>
              <input type="text" id="tiktok" name="tiktok" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" placeholder="Enter TikTok Handle" />
            </div>

            <!-- WhatsApp -->
            <div class="mb-6">
              <label for="wa" class="mb-1 block font-display text-sm text-jacarta-700">WhatsApp</label>
              <input type="text" id="wa" name="wa" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" placeholder="Enter WhatsApp Number" />
            </div>

            <!-- Tahun Berdiri -->
            <div class="mb-6">
              <label for="tahun_berdiri" class="mb-1 block font-display text-sm text-jacarta-700">Tahun Berdiri<span class="text-red">*</span></label>
              <input type="text" id="tahun_berdiri" name="tahun_berdiri" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" placeholder="Enter Tahun Berdiri" required />
            </div>

            <!-- Jumlah Karyawan -->
            <div class="mb-6">
              <label for="jumlah_karyawan" class="mb-1 block font-display text-sm text-jacarta-700">Jumlah Karyawan<span class="text-red">*</span></label>
              <input type="text" id="jumlah_karyawan" name="jumlah_karyawan" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" placeholder="Enter Jumlah Karyawan" required />
            </div>

            <!-- Modal Usaha -->
            <div class="mb-6">
              <label for="modal_usaha" class="mb-1 block font-display text-sm text-jacarta-700">Modal Usaha<span class="text-red">*</span></label>

              <select name="modal_usaha" id="modal_usaha" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" required>
                <option value="">Pilih Modal Usaha</option>
                <option value="0">Modal Sendiri</option>
                <option value="1">Modal dari Pinjaman Pribadi</option>
                <option value="2">Modal
                  dari Pinjaman Bank</option>
              </select>
            </div>

            <!-- Jumlah Modal -->
            <div class="mb-6">
              <label for="jumlah_modal" class="mb-1 block font-display text-sm text-jacarta-700">Jumlah Modal<span class="text-red">*</span></label>
              <input type="number" id="jumlah_modal" name="jumlah_modal" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" placeholder="Enter Jumlah Modal" required />
            </div>

            <!-- NIB -->
            <div class="mb-6">
              <label for="nib" class="mb-1 block font-display text-sm text-jacarta-700">NIB</label>
              <input type="text" id="nib" name="nib" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" placeholder="Enter NIB" />
            </div>

            <!-- Perizinan -->
            <div class="mb-6">
              <label for="perizinan" class="mb-1 block font-display text-sm text-jacarta-700">Perizinan</label>
              <input type="text" id="perizinan" name="perizinan" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" placeholder="Enter Perizinan" />
            </div>

            <!-- Pendampingan -->
            <div class="mb-6">
              <label for="pendampingan" class="mb-1 block font-display text-sm text-jacarta-700">Pendampingan<span class="text-red">*</span></label>

              <select name="pendampingan" id="pendampingan" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent" required>
                <option value="">Pilih Pendampingan</option>
                <option value="0">NIB (NOMOR INDUK BERUSAHA)</option>
                <option value="1">HALAL</option>
                <option value="2">SNI BINA UMK</option>
                <option value="3">SPPIRT</option>
                <option value="4">HAKI</option>
                <option value="5">E-KATALOG</option>
                <option value="6">BPOM MD</option>
              </select>

            </div>

            <!-- Submit Button -->
            <button type="submit" class="rounded-full bg-accent py-3 px-8 text-center font-semibold text-white shadow-accent-volume transition-all">
              Submit
            </button>
          </form>
        </div>

      </div>
    </div>
  </section>
  <!-- end collection -->
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    toggleDomisiliField();
    $('input[name="is_garut"]').on('change', function() {
      toggleDomisiliField();
    });

    function toggleDomisiliField() {
      if ($('input[name="is_garut"]:checked').val() === 'tidak') {
        $('#domisili_field').show();
        $('#domisili').prop('required', true);
      } else {
        $('#domisili_field').hide();
        $('#domisili').prop('required', false);
      }
    }
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
              provinsi_id: item.provinsi_id,
              kota_id: item.kota_id,
              kecamatan_id: item.kecamatan_id,
              kelurahan_id: item.kelurahan_id,
              provinsi: item.nama_provinsi,
              kota: item.nama_kota,
              kecamatan: item.nama_kecamatan,
              kelurahan: item.nama_kelurahan
            };
          }),
          pagination: {
            more: data.more_pagination
          }
        };
      },
      cache: true
    }
  });

  $('.wilayah').on('select2:select', function(e) {
    var data = e.params.data;
    var address = `${data.provinsi}, ${data.kota}, ${data.kecamatan}, ${data.kelurahan}`;
    $('#address-preview').val(address);
    $('#provinsi_id').val(data.provinsi_id);
    $('#kota_id').val(data.kota_id);
    $('#kecamatan_id').val(data.kecamatan_id);
    $('#kelurahan_id').val(data.id);
  });
</script>

<script>
  $(document).ready(function() {

    // Handle form submission
    $('#update-profile-form').on('submit', function(e) {
      e.preventDefault();
      var form = $(this);
      $.ajax({
        url: form.attr('action'),
        method: form.attr('method'),
        data: form.serialize(),
        success: function(response) {
          Swal.fire({
            icon: 'success',
            title: 'Profile updated successfully',
            showConfirmButton: false,
            timer: 1500
          });
        },
        error: function(response, xhr) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: response.responseJSON.message,
          });
        }
      });
    });
  });
</script>
<!-- handle form pendampingan submit -->
<script>
  $(document).ready(function() {
    $('#pendampingan-form').on('submit', function(e) {
      e.preventDefault();
      var form = $(this);
      $.ajax({
        url: `{{route('pendampingan.store')}}`,
        method: form.attr('method'),
        data: form.serialize(),
        success: function(response) {
          Swal.fire({
            icon: 'success',
            title: 'Pendampingan Berhasil di kirim',
            text: 'Silahkan tunggu pesan dari pihak Dinas',
            showConfirmButton: false,
            timer: 2500
          });
          setTimeout(() => {
            location.reload();
          }, 3000);
        },
        error: function(response, xhr) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: response.responseJSON.message,
          });
        }
      });
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('.svg-icon').click(function() {
      let svgIcon = $(this);
      let svgDoc = svgIcon.find('.svg-doc');
      svgDoc.hide();

      let loadingSvg = `
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 transform rotating svg-load">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
      </svg>
    `;
      svgIcon.append(loadingSvg);

      const inputOptions = new Promise((resolve) => {
        setTimeout(() => {
          resolve({
            'pdf': "PDF",
            'ai': "AI",
            'dxf': "DXF",
          });
        }, 1000);
      });

      Swal.fire({
        title: "Select format",
        input: "radio",
        inputOptions,
        inputValidator: (value) => {
          if (!value) {
            return "You need to choose something!";
          }
        }
      }).then((result) => {
        if (result.value) {
          Swal.fire({
            html: `You selected: ${result.value.toUpperCase()}`
          });

          let csrf = "{{csrf_token()}}";
          var id = svgIcon.closest('.relative.flex.items-center').data('id');

          if (`{{Auth::user()->umkm->approved != 1}}`) {
            Swal.fire({
              icon: 'error',
              title: 'Tidak Terverifikasi',
              text: 'Akun Anda Belum Di Verifikasi Silahkan Hubungi Pihak DINAS',
            });
            svgIcon.find('.svg-load').remove();
            svgDoc.show();
            return;
          } else {
            let exportUrl = '';

            if (result.value === 'pdf') {
              exportUrl = 'https://api.pacdora.com/open/v1/user/projects/export/pdf';
            } else if (result.value === 'ai') {
              exportUrl = 'https://api.pacdora.com/open/v1/user/projects/export/ai';
            } else if (result.value === 'dxf') {
              exportUrl = 'https://api.pacdora.com/open/v1/user/projects/export/dxf';
            }

            $.ajax({
              url: exportUrl,
              type: 'POST',
              contentType: 'application/json',
              headers: {
                'appId': '71ee73045e3480fe',
                'appKey': 'a3e831ccfa3ffd84',
                'X-CSRF-TOKEN': csrf
              },
              data: JSON.stringify({
                projectIds: [id]
              }),
              success: function(data) {
                console.log(data.data[0].taskId);
                let taskId = data.data[0].taskId;

                let intervalId = setInterval(function() {
                  $.ajax({
                    url: exportUrl,
                    type: 'GET',
                    headers: {
                      'appId': '71ee73045e3480fe',
                      'appKey': 'a3e831ccfa3ffd84',
                      'X-CSRF-TOKEN': csrf
                    },
                    data: {
                      taskId: taskId
                    },
                    success: function(response) {
                      console.log(response.data);
                      if (response.data.filePath) {
                        clearInterval(intervalId);
                        window.location.href = response.data.filePath;
                        svgIcon.find('.svg-load').remove();
                        svgDoc.show();
                      } else {
                        console.log('Processing...');
                      }
                    },
                    error: function(error) {
                      console.log('Error:', error);
                    }
                  });
                }, 5000);
              },
              error: function(error) {
                console.log('Error:', error);
              }
            });
          }
        }
      });
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#modal-title').click(function(e) {
      var id = $(this).closest('.relative.flex.items-center').data('id');
      var nama_project = $(this).closest('.relative.flex.items-center').find('.judul').text();

      Swal.fire({
        title: "Masukan Nama Project",
        input: "text",
        inputLabel: "Nama Project",
        inputValue: nama_project,
        showCancelButton: true,
        inputValidator: (value) => {
          if (!value) {
            return "Kamu harus mengisi judul nama project!";
          }
        }
      }).then((result) => {
        if (result.isConfirmed) {
          Pacdora.init({
            userId: "{{hashId(Auth::user()->id)}}",
            appId: "71ee73045e3480fe",
            isDelay: true,
            theme: "#dc2626",
            doneBtn: "Save",
            localeResource: {
              "Upload & Design": "Online design",
            },
          });
          var newProjectName = result.value;
          Pacdora.rename(newProjectName, id);
          // wait 2 detik
          setTimeout(() => {
            window.location.reload();
          }, 2000);
        }
      });

    });
  });
</script>

<script>
  // kirim ajax saat delete button
  function deleteconfirm(id) {
    console.log(id);
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
        type: 'DELETE',
        url: "https://api.pacdora.com/open/v1/user/projects",
        contentType: 'application/json',
        headers: {
          'appId': '71ee73045e3480fe',
          'appKey': 'a3e831ccfa3ffd84',
        },
        data: JSON.stringify({
          projectIds: [id] 
        }),
        success: function(response) {
          console.log(response);
          Swal.fire(
            'Deleted!',
            'Behasil Menghapus Project.',
            'success'
          );
          setTimeout(() => {
            window.location.reload();
          }, 2000);
        },
        error: function(response) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Error deleting template! ' + response.responseText,
          });
        }
      });
      }
  

    })  
  }

</script>
@push('css')
<style>
  @-webkit-keyframes rotating {
    from {
      -webkit-transform: rotate(0deg);
    }

    to {
      -webkit-transform: rotate(360deg);
    }
  }

  .rotating {
    -webkit-animation: rotating 2s linear infinite;
  }
</style>
@endpush
@endsection

<!-- jqeury cdn -->