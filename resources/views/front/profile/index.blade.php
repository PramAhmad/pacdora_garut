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
                    
                    <span class="text-accent">Akun sudah berhasil di terima sekarang kamu dapat menggunakan semua fitur myopia</span>
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
          <div class="mx-auto md:flex pt-16">
            <!-- Form -->
            <div class="mb-12 md:w-1/2 md:pr-8">
              <div class="mb-6">
                <label for="profile-username" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">Nama Usaha<span class="text-red">*</span></label>
                <input type="text" id="profile-username" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300" placeholder="Enter username" value="{{$umkm->nama_usaha}}" required />
              </div>
              <div class="mb-6">
                <label for="profile-bio" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">Bio<span class="text-red">*</span></label>
                <textarea id="profile-bio" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300" required placeholder="Tell the world your story!"></textarea>
              </div>
              <div class="mb-6">
                <label for="profile-email" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">Email address<span class="text-red">*</span></label>
                <input type="text" id="profile-email" class="w-full rounded-lg border-jacarta-100 py-3 hover:ring-2 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300" placeholder="Enter email" required />
              </div>
              <div class="mb-6">
                <label for="profile-twitter" class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">Links<span class="text-red">*</span></label>
                <div class="relative">
                  <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="pointer-events-none absolute top-1/2 left-4 h-4 w-4 -translate-y-1/2 fill-jacarta-300 dark:fill-jacarta-400" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                  </svg>
                  <input type="text" id="profile-twitter" class="w-full rounded-t-lg border-jacarta-100 py-3 pl-10 hover:ring-2 hover:ring-accent/10 focus:ring-inset focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300" placeholder="@twittername" />
                </div>
                <div class="relative">
                  <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="pointer-events-none absolute top-1/2 left-4 h-4 w-4 -translate-y-1/2 fill-jacarta-300 dark:fill-jacarta-400" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                  </svg>
                  <input type="text" id="profile-instagram" class="-mt-px w-full border-jacarta-100 py-3 pl-10 hover:ring-2 hover:ring-accent/10 focus:ring-inset focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300" placeholder="instagramname" />
                </div>
                <div class="relative">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="pointer-events-none absolute top-1/2 left-4 h-4 w-4 -translate-y-1/2 fill-jacarta-300 dark:fill-jacarta-400">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-2.29-2.333A17.9 17.9 0 0 1 8.027 13H4.062a8.008 8.008 0 0 0 5.648 6.667zM10.03 13c.151 2.439.848 4.73 1.97 6.752A15.905 15.905 0 0 0 13.97 13h-3.94zm9.908 0h-3.965a17.9 17.9 0 0 1-1.683 6.667A8.008 8.008 0 0 0 19.938 13zM4.062 11h3.965A17.9 17.9 0 0 1 9.71 4.333 8.008 8.008 0 0 0 4.062 11zm5.969 0h3.938A15.905 15.905 0 0 0 12 4.248 15.905 15.905 0 0 0 10.03 11zm4.259-6.667A17.9 17.9 0 0 1 15.973 11h3.965a8.008 8.008 0 0 0-5.648-6.667z" />
                  </svg>
                  <input type="url" id="profile-website" class="-mt-px w-full rounded-b-lg border-jacarta-100 py-3 pl-10 hover:ring-2 hover:ring-accent/10 focus:ring-inset focus:ring-accent dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-white dark:placeholder:text-jacarta-300" placeholder="yoursitename.com" />
                </div>
              </div>
              <div class="mb-6">
                <label class="mb-1 block font-display text-sm text-jacarta-700 dark:text-white">Wallet Address</label>
                <button class="js-copy-clipboard flex w-full select-none items-center rounded-lg border border-jacarta-100 bg-white py-3 px-4 hover:bg-jacarta-50 dark:border-jacarta-600 dark:bg-jacarta-700 dark:text-jacarta-300" data-tippy-content="Copy">
                  <span>0x7a9fe22691c811ea339401bbb2leb</span>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="ml-auto mb-px h-4 w-4 fill-jacarta-500 dark:fill-jacarta-300">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path d="M7 7V3a1 1 0 0 1 1-1h13a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-4v3.993c0 .556-.449 1.007-1.007 1.007H3.007A1.006 1.006 0 0 1 2 20.993l.003-12.986C2.003 7.451 2.452 7 3.01 7H7zm2 0h6.993C16.549 7 17 7.449 17 8.007V15h3V4H9v3zM4.003 9L4 20h11V9H4.003z"></path>
                  </svg>
                </button>
              </div>

              <button class="rounded-full bg-accent py-3 px-8 text-center font-semibold text-white shadow-accent-volume transition-all hover:bg-accent-dark">
                Update Profile
              </button>
            </div>

            <!-- Avatar -->
            <div class="flex space-x-5 md:w-1/2 md:pl-8">
              <form class="shrink-0">
                <!-- <figure class="relative inline-block">
                  <img src="img/user/user_avatar.gif" alt="collection avatar" class="rounded-xl border-[5px] border-white dark:border-jacarta-600" />
                  <div class="group absolute -right-3 -bottom-2 h-8 w-8 overflow-hidden rounded-full border border-jacarta-100 bg-white text-center hover:border-transparent hover:bg-accent">
                    <input type="file" accept="image/*" class="absolute top-0 left-0 w-full cursor-pointer opacity-0" />
                    <div class="flex h-full items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-4 w-4 fill-jacarta-400 group-hover:fill-white">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z" />
                      </svg>
                    </div>
                  </div>
                </figure> -->
              </form>
              
            </div>
          </div>
        </div>
        <!-- end activity tab -->

        <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
          <!-- Records / Filter -->
          <div class="lg:flex">
            <!-- Records -->
            <div class="mb-10 shrink-0 basis-8/12 space-y-5 lg:mb-0 lg:pr-10">
              @forelse ($design['data'] as $item)
              <div href="" class="relative flex items-center rounded-2.5xl border border-jacarta-100 bg-white p-8 transition-shadow hover:shadow-lg dark:border-jacarta-700 dark:bg-jacarta-700" data-id="{{$item['id']}}">
                <figure class="mr-5 self-start">
                  <img src="{{$item['screenshot']}}" alt="avatar 2" class="rounded-2lg w-32 h-32 object-cover" loading="lazy" />
                </figure>

                <div>
                  <a href="{{route('profile.design',['id'=>$item['id']])}}" class="mb-1 font-display text-base font-semibold text-jacarta-700 dark:text-white">
                    {{$item['name']}}
                  </a> 
                  <span class="mb-3 block text-sm text-jacarta-500">width {{$item['width']}} / height {{$item['height']}}</span>
                  <span class="block text-xs text-jacarta-300">Panjang {{$item['length']}}</span>
                </div>
                <div class="ml-auto rounded-full border border-jacarta-100 p-3 dark:border-jacarta-600 svg-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24" stroke-width="1.5" stroke="currentColor" class=" ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" id="icon" />
                  </svg>
                </div>
              </div>
              @empty
              <h3 class="text-center text-accent text-2xl">Belum Ada Design</h3>
              @endforelse
            </div>

            <!-- Filters -->
            <aside class="basis-4/12 lg:pl-5">
              <form action="search" class="relative mb-12 block">
                <input type="search" class="w-full rounded-2xl border border-jacarta-100 py-[0.6875rem] px-4 pl-10 text-jacarta-700 placeholder-jacarta-500 focus:ring-accent dark:border-transparent dark:bg-white/[.15] dark:text-white dark:placeholder-white" placeholder="Search" />
                <span class="absolute left-0 top-0 flex h-full w-12 items-center justify-center rounded-2xl">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="h-4 w-4 fill-jacarta-500 dark:fill-white">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"></path>
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
                  <span class="text-2xs font-medium">Likes</span>
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
@endsection
<!-- jqeury cdn -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function(){
    $('.svg-icon').click(function(){
      let csrf = "{{csrf_token()}}";
      var id = $(this).closest('.relative.flex.items-center').data('id');
      console.log(id);
      $.ajax({
        url:'/export/' +id,
        type:'POST',
        data:{
          _token:csrf,

        },
        success:function(data){
          console.log(data);
        }
      })

    });
  });
</script>