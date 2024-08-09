@extends('front.layouts.app')
@section('content')
<main class="pt-[5.5rem] lg:pt-24 overflow-x-hidden ">
  <!-- Banner -->
  <div class="relative">
    <img src="{{asset('template/dist/img/user/banner.jpg')}}" alt="banner" class="h-[18.75rem] object-cover" />
  </div>
  <!-- end banner -->

  <!-- Profile -->
  <section class="relative bg-light-base pb-12 pt-28 dark:bg-jacarta-800">
    <!-- Avatar -->
    <div class="absolute left-1/2 top-0 z-10 flex -translate-x-1/2 -translate-y-1/2 items-center justify-center">
      <figure class="relative">
        <img src="{{asset('template/dist/img/user/user_avatar.gif')}}" alt="collection avatar" class="rounded-xl border-[5px] border-white dark:border-jacarta-600" />
        <div class="absolute -right-3 bottom-0 flex h-6 w-6 items-center justify-center rounded-full border-2 border-white bg-green dark:border-jacarta-600" data-tippy-content="Verified Collection">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-[.875rem] w-[.875rem] fill-white">
            <path fill="none" d="M0 0h24v24H0z"></path>
            <path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
          </svg>
        </div>
      </figure>
    </div>

    <div class="container">
      <div class="text-center">
        <h2 class="mb-2 font-display text-4xl font-medium text-jacarta-700 dark:text-white">{{Auth::user()->name}}</h2>
        <div class="mb-8 inline-flex items-center justify-center rounded-full border border-accent bg-accent py-1.5 px-4 dark:border-accent dark:bg-accent">

          <button class="js-copy-clipboard max-w-[10rem] select-none overflow-hidden text-ellipsis whitespace-nowrap text-white dark:text-jacarta-100" data-tippy-content="Copy">
            <span>{{$umkm->approved == 1 ? 'Terverifikasi' : 'Tidak Terverifikasi'}}</span>
          </button>
        </div>

        <p class="mx-auto mb-2 max-w-xl text-lg dark:text-jacarta-300">
          {{$umkm->nama_usaha}}
        </p>
        <span class="text-jacarta-400">Bergabung {{ Carbon\Carbon::parse($umkm->created_at)->format('d F Y') }}
        </span>

        <div class="mt-6 flex items-center justify-center space-x-2.5">
          @if ($umkm->approved == 1)
          <div class="p-3 rounded-full bg-accent-lightest ">

            <span class="text-accent">Akun sudah berhasil di terima sekarang kamu dapat menggunakan semua fitur
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
    <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
      <img src="{{asset('template/dist/img/gradient_light.jpg')}}" alt="gradient" class="h-full w-full" />
    </picture>
    <div class="container">
      <!-- Tabs Nav -->
      <ul class="nav nav-tabs scrollbar-custom mb-12 flex items-center justify-start overflow-x-auto overflow-y-hidden border-b border-jacarta-100 pb-px dark:border-jacarta-600 md:justify-center" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active relative flex items-center whitespace-nowrap py-3 px-6 text-jacarta-400 hover:text-jacarta-700 dark:hover:text-white" id="informasi-tab" data-bs-toggle="tab" data-bs-target="#informasi" type="button" role="tab" aria-controls="informasi" aria-selected="true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-1 h-5 w-5 fill-current">
              <path fill="none" d="M0 0h24v24H0z" />
              <path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm1 2v14h16V5H4zm4.5 9H14a.5.5 0 1 0 0-1h-4a2.5 2.5 0 1 1 0-5h1V6h2v2h2.5v2H10a.5.5 0 1 0 0 1h4a2.5 2.5 0 1 1 0 5h-1v2h-2v-2H8.5v-2z" />
            </svg>
            <span class="font-display text-base font-medium">Informasi</span>
          </button>
        </li>

        <li class="nav-item" role="presentation">
          <button class="nav-link relative flex items-center whitespace-nowrap py-3 px-6 text-jacarta-400 hover:text-jacarta-700 dark:hover:text-white" id="collections-tab" data-bs-toggle="tab" data-bs-target="#collections" type="button" role="tab" aria-controls="collections" aria-selected="false">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-1 h-5 w-5 fill-current">
              <path fill="none" d="M0 0h24v24H0z" />
              <path d="M10.9 2.1l9.899 1.415 1.414 9.9-9.192 9.192a1 1 0 0 1-1.414 0l-9.9-9.9a1 1 0 0 1 0-1.414L10.9 2.1zm.707 2.122L3.828 12l8.486 8.485 7.778-7.778-1.06-7.425-7.425-1.06zm2.12 6.364a2 2 0 1 1 2.83-2.829 2 2 0 0 1-2.83 2.829z" />
            </svg>
            <span class="font-display text-base font-medium">Order</span>
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link relative flex items-center whitespace-nowrap py-3 px-6 text-jacarta-400 hover:text-jacarta-700 dark:hover:text-white" id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity" type="button" role="tab" aria-controls="activity" aria-selected="false">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-1 h-5 w-5 fill-current">
              <path fill="none" d="M0 0h24v24H0z" />
              <path d="M11.95 7.95l-1.414 1.414L8 6.828 8 20H6V6.828L3.465 9.364 2.05 7.95 7 3l4.95 4.95zm10 8.1L17 21l-4.95-4.95 1.414-1.414 2.537 2.536L16 4h2v13.172l2.536-2.536 1.414 1.414z" />
            </svg>
            <span class="font-display text-base font-medium">History Design</span>
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
                  <label for="profile-username" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">Nama Pemilik<span class="text-red">*</span></label>
                  <input type="text" id="profile-username" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300" placeholder="Enter username" value="{{ $umkm->nama }}" name="nama" required />
                </div>
                <div class="mb-6">
                  <label for="profile-bio" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">NIK<span class="text-red">*</span></label>
                  <input type="text" id="profile-bio" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300" required placeholder="Enter NIK" value="{{ $umkm->nik }}" name="nik" />
                </div>
                <div class="mb-6">
                  <!-- is garut -->
                  <div class="mb-6">
                    <label for="is_garut" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">Domisili<span class="text-red">*</span></label>
                    <div class="flex items-center space-x-2">
                      <input type="radio" id="is_garut_ya" name="is_garut" value="ya" {{ $umkm->is_garut == 'ya' ? 'checked' : '' }} class="h-4 w-4 text-accent border-accent focus:ring-accent/20 dark:border-jacarta-600 dark:bg-jacarta-700" />
                      <label for="is_garut_ya" class="text-jacarta-700 dark:text-white">Garut</label>
                      <input type="radio" id="is_garut_tidak" name="is_garut" value="tidak" {{ $umkm->is_garut == 'tidak' ? 'checked' : '' }} class="h-4 w-4 text-accent border-accent focus:ring-accent/20 dark:border-jacarta-600 dark:bg-jacarta-700" />
                      <label for="is_garut_tidak" class="text-jacarta-700 dark:text-white">Bukan Garut</label>
                    </div>
                  </div>

                  <div class="mb-6" id="domisili_field" style="display: none;">
                    <input type="text" id="domisili" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300" placeholder="Masukin Domisili" value="{{ old('domisili', $umkm->domisili ?? '') }}" name="domisili" />
                  </div>
                </div>

                <div class="mb-6">
                  <label for="referensi" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">Referensi<span class="text-red">*</span></label>
                  @php
                  $referensi = [
                  0 => 'Dinas Koperasi dan UKM Kab. Garut',
                  1 => 'Website',
                  2 => 'Social Media',
                  3 => 'Lainya',
                  ];
                  @endphp
                  <select name="referensi" id="referensi" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300">
                    <option value="">Pilih Referensi</option>
                    @foreach ($referensi as $key => $item)
                    <option value="{{ $key }}" {{ $umkm->referensi == $key ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-6">
                  <label class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">No Hp</label>
                  <input type="text" id="profile-phone" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300" required placeholder="Enter phone number" value="{{ $umkm->nohp }}" name="nphp" />
                </div>
                <button type="submit" class="rounded-full bg-accent py-3 px-8 text-center font-semibold text-white shadow-accent-volume transition-all hover:bg-accent-dark">
                  Update Profile
                </button>
              </div>

              <div class="md:w-1/2 md:pl-8">
                <!-- Nama Usaha -->
                <div class="mb-6">
                  <label for="profile-username" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">
                    Nama Usaha<span class="text-red">*</span>
                  </label>
                  <input type="text" id="profile-username" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300" placeholder="Enter username" value="{{ $umkm->nama_usaha }}" name="nama_usaha" required />
                </div>

                <!-- Alamat Usaha -->
                <div class="mb-6">
                  <label for="profile-username" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">
                    Alamat Usaha<span class="text-red">*</span>
                  </label>
                  <input type="text" id="profile-username" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300" placeholder="Enter username" value="{{ $umkm->alamat_usaha }}" name="alamat_usaha" required />
                </div>

                <!-- Disabilitas -->
                <div class="mb-6">
                  <label for="disabilitas" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">
                    Disabilitas<span class="text-red">*</span>
                  </label>
                  <div class="flex items-center space-x-2">
                    <input type="radio" id="disabilitas_ya" name="disabilitas" value="ya" {{ $umkm->disabilitas == 'ya' ? 'checked' : '' }} class="h-4 w-4 text-accent border-accent focus:ring-accent/20 dark:border-jacarta-600 dark:bg-jacarta-700" />
                    <label for="disabilitas_ya" class="text-jacarta-700 dark:text-white">Ya</label>
                    <input type="radio" id="disabilitas_tidak" name="disabilitas" value="tidak" {{ $umkm->disabilitas == 'tidak' ? 'checked' : '' }} class="h-4 w-4 text-accent border-accent focus:ring-accent/20 dark:border-jacarta-600 dark:bg-jacarta-700" />
                    <label for="disabilitas_tidak" class="text-jacarta-700 dark:text-white">Tidak</label>
                  </div>
                </div>

                <!-- Wilayah Select -->
                <div class="mb-6">
                  <label for="wilayah" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">
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
                  <input type="text" id="address-preview" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300" value="{{ $umkm->provinsi->nama_provinsi . ', ' . $umkm->kota->nama_kota . ', ' . $umkm->kecamatan->nama_kecamatan . ', ' . $umkm->kelurahan->nama_kelurahan }}" name="wilayah" readonly />
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
              <div href="" class="relative flex items-center rounded-2.5xl border border-jacarta-100 bg-white p-8 transition-shadow hover:shadow-lg dark:border-jacarta-700 dark:bg-jacarta-700" data-id="{{$item['id']}}">
                <figure class="mr-5 self-start">
                  <img src="{{$item['screenshot']}}" alt="avatar 2" class="rounded-2lg w-32 h-32 object-cover" loading="lazy" />
                </figure>

                <div>
                  <a href="{{route('profile.design', ['id' => $item['id']])}}" class="mb-1 font-display text-base font-semibold text-jacarta-700 dark:text-white">
                    {{$item['name']}}
                  </a>
                  <span class="mb-3 block text-sm text-jacarta-500">width {{$item['width']}} / height
                    {{$item['height']}}</span>
                  <span class="block text-xs text-jacarta-300">Panjang {{$item['length']}}</span>
                </div>
                <div class="ml-auto rounded-full border border-jacarta-100 p-3 dark:border-jacarta-600 svg-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24" stroke-width="1.5" stroke="currentColor" class=" ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" id="icon" />
                  </svg>
                </div>
              </div>
              @empty
              <h3 class="text-left text-accent text-sm py-5">Belum Ada Design</h3>
              @endforelse
            </div>

            <!-- Filters -->
            <aside class="basis-4/12 lg:pl-5">
              <form action="search" class="relative mb-12 block">
                <input type="search" class="w-full rounded-2xl border border-jacarta-100 py-[0.6875rem] px-4 pl-10 text-jacarta-700 placeholder-jacarta-500 focus:ring-accent dark:border-transparent dark:bg-white/[.15] dark:text-white dark:placeholder-white" placeholder="Search" />
                <span class="absolute left-0 top-0 flex h-full w-12 items-center justify-center rounded-2xl">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-4 w-4 fill-jacarta-500 dark:fill-white">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z">
                    </path>
                  </svg>
                </span>
              </form>

              <h3 class="mb-4 font-display font-semibold text-jacarta-500 dark:text-white">Filters</h3>
              <div class="flex flex-wrap">
                <button class="group mr-2.5 mb-2.5 inline-flex items-center rounded-xl border border-jacarta-100 bg-white px-4 py-3 hover:border-transparent hover:bg-accent hover:text-white dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:hover:border-transparent dark:hover:bg-accent">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2 h-4 w-4 group-hover:fill-white dark:fill-white">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M10.9 2.1l9.899 1.415 1.414 9.9-9.192 9.192a1 1 0 0 1-1.414 0l-9.9-9.9a1 1 0 0 1 0-1.414L10.9 2.1zm.707 2.122L3.828 12l8.486 8.485 7.778-7.778-1.06-7.425-7.425-1.06zm2.12 6.364a2 2 0 1 1 2.83-2.829 2 2 0 0 1-2.83 2.829z" />
                  </svg>
                  <span class="text-2xs font-medium">Listing</span>
                </button>
                <button class="group mr-2.5 mb-2.5 inline-flex items-center rounded-xl border border-jacarta-100 bg-white px-4 py-3 hover:border-transparent hover:bg-accent hover:text-white dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:hover:border-transparent dark:hover:bg-accent">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2 h-4 w-4 group-hover:fill-white dark:fill-white">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M14 20v2H2v-2h12zM14.586.686l7.778 7.778L20.95 9.88l-1.06-.354L17.413 12l5.657 5.657-1.414 1.414L16 13.414l-2.404 2.404.283 1.132-1.415 1.414-7.778-7.778 1.415-1.414 1.13.282 6.294-6.293-.353-1.06L14.586.686zm.707 3.536l-7.071 7.07 3.535 3.536 7.071-7.07-3.535-3.536z" />
                  </svg>
                  <span class="text-2xs font-medium">Bids</span>
                </button>
                <button class="group mr-2.5 mb-2.5 inline-flex items-center rounded-xl border border-jacarta-100 bg-white px-4 py-3 hover:border-transparent hover:bg-accent hover:text-white dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:hover:border-transparent dark:hover:bg-accent">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2 h-4 w-4 group-hover:fill-white dark:fill-white">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M16.05 12.05L21 17l-4.95 4.95-1.414-1.414 2.536-2.537L4 18v-2h13.172l-2.536-2.536 1.414-1.414zm-8.1-10l1.414 1.414L6.828 6 20 6v2H6.828l2.536 2.536L7.95 11.95 3 7l4.95-4.95z" />
                  </svg>
                  <span class="text-2xs font-medium">Transfer</span>
                </button>
                <button class="group mr-2.5 mb-2.5 inline-flex items-center rounded-xl border border-jacarta-100 bg-white px-4 py-3 hover:border-transparent hover:bg-accent hover:text-white dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:hover:border-transparent dark:hover:bg-accent">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2 h-4 w-4 group-hover:fill-white dark:fill-white">
                    <path fill="none" d="M0 0H24V24H0z" />
                    <path d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z" />
                  </svg>
                </button>
                <button class="group mr-2.5 mb-2.5 inline-flex items-center rounded-xl border border-jacarta-100 bg-white px-4 py-3 hover:border-transparent hover:bg-accent hover:text-white dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:hover:border-transparent dark:hover:bg-accent">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="mr-2 h-4 w-4 group-hover:fill-white dark:fill-white">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M6.5 2h11a1 1 0 0 1 .8.4L21 6v15a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6l2.7-3.6a1 1 0 0 1 .8-.4zM19 8H5v12h14V8zm-.5-2L17 4H7L5.5 6h13zM9 10v2a3 3 0 0 0 6 0v-2h2v2a5 5 0 0 1-10 0v-2h2z" />
                  </svg>
                  <span class="text-2xs font-medium">Purchases</span>
                </button>
              </div>
            </aside>
          </div>
        </div>
        <!-- end activity tab -->
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
        error: function(xhr) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
          });
        }
      });
    });
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.svg-icon').click(function() {
      let csrf = "{{csrf_token()}}";
      var id = $(this).closest('.relative.flex.items-center').data('id');
      console.log(id);
      $.ajax({
        url: 'https://api.pacdora.com/open/v1/user/projects/export/pdf',
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
              url: "https://api.pacdora.com/open/v1/user/projects/export/pdf",
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
                console.log(response.data)
                console.log(response.data.filePath);
                if (response.data.filePath) {
                  clearInterval(intervalId);
                  window.location.href = response.data.filePath;
                } else {
                  console.log('proses cuy');
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
    });
  });
</script>
@endsection

<!-- jqeury cdn -->