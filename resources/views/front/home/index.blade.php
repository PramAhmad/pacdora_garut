@extends('front.layouts.app')

@section('content')
@push('css')
<link rel="stylesheet" href="{{asset('agency/tailwind.min.css')}}">

@endpush
<div class="container">


  <div class="px-[12px] md:px-[36px]  xl:px-0 text-center  pt-20"><span class="font-chivo inline-block bg-bg-6 text-green-900 py-[14px] px-[28px] rounded-[50px] text-[14px] leading-[14px] mb-[29px] md:mb-[43px]">MyOPia - Support Your Bussines. </span>
    <div class="text-center mb-[35px] md:mb-[50px]">
      <h2 class="font-bold font-chivo mx-auto text-[35px] leading-[44px] md:text-[46px] md:leading-[52px] lg:text-heading-1 text-gray-900 mb-5 md:mb-[30px] max-w-[725px]">Solusi masalah desain kemasan anda</h2>
      <p class="text-quote md:text-lead-lg text-gray-600 mx-auto max-w-[976px]">Tingkatkan performa bisnis anda dengan menggunakan myopia, kami akan membantu anda dalam pengembangan bisnis anda
      </p>
    </div>
    <div class="md:flex  items-center justify-center gap-[22px] mb-[40px] md:mb-[70px]">
      <button type="button"> <a class="flex md:my-0 my-5 items-center inline-block z-10 relative transition-all duration-200 group px-[22px] py-[15px] lg:px-[32px] lg:py-[22px] rounded-[50px] bg-gray-900 text-white hover:bg-gray-100 hover:text-gray-900 hover:-translate-y-[2px] text-white bg-black text-heading-6 tracking-wide" href="#"><span class="block text-inherit w-full h-full rounded-[50px] text-lg font-chivo font-semibold">Daftar Sekarang</span><i> <img class="ml-[7px] w-[12px] filter-white group-hover:filter-black" src="/agency/assets/images/icons/icon-right.svg" alt="arrow right icon"></i></a></button>
      <button type="button"> <a class="flex items-center inline-block z-10 relative border border-jacarta-900 transition-all duration-200 group px-[22px] py-[15px] lg:px-[32px] lg:py-[22px] rounded-[50px] bg-white text-gray-900 hover:bg-gray-900 hover:text-white hover:-translate-y-[2px] text-gray-900 bg-gray-100 text-heading-6 tracking-wide" href="#"><span class="block text-inherit w-full h-full rounded-[50px] text-lg font-chivo font-semibold">Tentang Kami</span><i> <img class="ml-[7px] w-[12px] filter-black group-hover:filter-white" src="/agency/assets/images/icons/icon-right.svg" alt="arrow right icon"></i></a></button>
    </div>
    <div class="relative mx-auto max-w-[1190px] h-full">
      <iframe class="w-full md:h-[650px] h-[190px] rounded-3xl" src="https://www.youtube.com/embed/yzsalAKMYCI?si=hQzetCIXqwTVx5F4"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
      </iframe>
    </div>

  </div>
  <div class="px-[12px] md:px-[36px] mt-[70px] xl:px-0 lg:mt-[40px]">
    <div class="text-center mb-[45px] lg:mb-[88px] lg:mb-[88px]">
      <h2 class="font-bold font-chivo mx-auto text-[35px] leading-[44px] md:text-[46px] md:leading-[52px] lg:text-heading-1 text-gray-900 mb-5 md:mb-[30px] max-w-full">Mulai Kembangkan Bisnis Anda</h2>
      <p class="text-quote md:text-lead-lg text-gray-600 mx-auto max-w-[743px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint temporibus quae suscipit et, similique ad?
      </p>
    </div>
    <div class="lg:flex lg:items-center gap-[30px]">
      <div class="flex items-start gap-5 transition-all duration-300 mb-[33px] hover:translate-y-[-3px] border-b border-gray-200 pb-[50px] last:mb-0"><img class="h-full w-full object-cover max-w-[64px]" src="agency/assets/images/icons/icon-resources.svg" alt="icon">
        <div>
          <h3 class="font-bold font-chivo text-[20px] leading-[26px] md:text-heading-4 mb-[14px]">1. Daftar
          </h3>
          <p class="text-excerpt">Isi data bisnis dan juga akun myopia, sesuaikan dengan data yang ada di pendaftaran</p>
        </div>
      </div>
      <div class="flex items-start gap-5 transition-all duration-300 mb-[33px] hover:translate-y-[-3px] border-b border-gray-200 pb-[50px] last:mb-0"><img class="h-full w-full object-cover max-w-[64px]" src="agency/assets/images/icons/icon-cards.svg" alt="icon">
        <div>
          <h3 class="font-bold font-chivo text-[20px] leading-[26px] md:text-heading-4 mb-[14px]">2. Validasi Data
          </h3>
          <p class="text-excerpt">Admin akan memvalidasi data anda apakah sudah sesuai dengan kriteria yang sudah ada</p>
        </div>
      </div>
      <div class="flex items-start gap-5 transition-all duration-300 mb-[33px] hover:translate-y-[-3px] border-b border-gray-200 pb-[50px]"><img class="h-full w-full object-cover max-w-[64px]" src="agency/assets/images/icons/icon-stats.svg" alt="icon">
        <div>
          <h3 class="font-bold font-chivo text-[20px] leading-[26px] md:text-heading-4 mb-[14px]">3. Mulai Bisnis
          </h3>
          <p class="text-excerpt">Selamat kamu sudah dapat menggunakan semua fitur yang ada di myopia</p>
        </div>
      </div>
    </div>
  </div>
  <div class="px-[12px] md:px-[36px] mt-[70px] xl:px-0 lg:mt-[150px]">
    <div class="lg:grid lg:grid-cols-2 gap-[150px]"><img class="h-full w-full object-cover rounded-2xl order-0 mb-[30px] lg:mb-0 lg:flex-1" src="{{asset('assets/img/kemasan1.png')}}" alt="Agon">
      <div class="flex-1 order-1 items-center lg:gap-[30px] xl:gap-[45px] !grid-cols-[637px_1fr]"><span class="font-chivo inline-block bg-bg-6 text-green-900 py-[14px] px-[28px] rounded-[50px] text-[14px] leading-[14px] mb-[22px]">Fitur Apa Saja Yang ada di Myopia</span>
        <h3 class="font-chivo font-bold lg:text-heading-1 md:text-[46px] md:leading-[52px] text-[35px] leading-[44px] mb-[22px]">Myopia Membantu Pengembangan Bisnis Anda!!</h3>
        <p class="text-quote md:text-lead-lg text-gray-600 mb-[50px]">Mulai melangkah ke jenjang digitalisasi dengan menggunakan myopia, kami akan membantu anda dalam pengembangan bisnis anda</p>

        <div class="border border-green-900 border-dashed mb-[48px]"></div>
        <div class="md:grid md:grid-cols-2 md:gap-y-[22px] lg:gap-x-[70px]">
          <div class="mb-[30px] lg:mb-0">
            <div class="flex items-center"><img class="mr-[9px]" src="agency/assets/images/icons/icon-leaf.svg" alt="leaf icon">
              <h4 class="text-heading-6 font-chivo font-bold">Desain Kemasan Produk</h4>
            </div>
          </div>
          <div class="mb-[30px] lg:mb-0">
            <div class="flex items-center"><img class="mr-[9px]" src="agency/assets/images/icons/icon-leaf.svg" alt="leaf icon">
              <h4 class="text-heading-6 font-chivo font-bold">Point Of Sale</h4>
            </div>
          </div>
          <div class="mb-[30px] lg:mb-0">
            <div class="flex items-center"><img class="mr-[9px]" src="agency/assets/images/icons/icon-leaf.svg" alt="leaf icon">
              <h4 class="text-heading-6 font-chivo font-bold">Konsultasi Dokumen Bisnis</h4>
            </div>
          </div>
          <div class="mb-[30px] lg:mb-0">
            <div class="flex items-center"><img class="mr-[9px]" src="agency/assets/images/icons/icon-leaf.svg" alt="leaf icon">
              <h4 class="text-heading-6 font-chivo font-bold">Fitur ke 4</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="px-[12px] md:px-[36px] mt-[70px] xl:px-0 lg:mt-[111px]">
    <div class="flex items-center justify-between md:mb-[82px] mb-[40px]">
      <h2 class="font-bold font-chivo text-[28px] leading-[32px] md:text-heading-2 w-[16ch]">Kategori Desain Kemasan Produk
      </h2>
      <div class="flex items-center gap-5">
        <div class="grid place-items-center border border-gray-200 bg-gray-100 rounded-full cursor-pointer group transition-colors duration-200 w-[48px] xl:w-[64px] h-[48px] xl:h-[64px] hover:bg-gray-900 undefined-prev"><img class="group-hover:filter-white" src="/agency/assets/images/icons/icon-prev.svg" alt="control icon button"></div>
        <div class="grid place-items-center border border-gray-200 bg-gray-100 rounded-full cursor-pointer group transition-colors duration-200 w-[48px] xl:w-[64px] h-[48px] xl:h-[64px] hover:bg-gray-900 undefined-next"><img class="group-hover:filter-white" src="/agency/assets/images/icons/icon-next.svg" alt="control icon button"></div>
      </div>
    </div>
    <div class="grid grid-cols-1 gap-[30px] md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

      <!-- Slides -->

      @foreach ($category as $item )

      <div class="swiper-slide">
        <article>
          <div
            class="block rounded-2.5xl border border-jacarta-100 bg-white p-[1.08rem] transition-shadow hover:shadow-lg dark:border-jacarta-700 dark:bg-jacarta-700">
            <figure>
              <a href="/category/{{$item->key}}">
                <img
                  src="{{$item->image}}"
                  alt="item 1"
                  width="230"
                  height="230"
                  class="w-full h-[250px] rounded-[0.625rem]"
                  loading="lazy" />
              </a>
            </figure>
            <div class="mt-4 flex items-center justify-between">
              <a href="/category/{{$item->key}}">
                <span class="font-display text-base text-jacarta-700 hover:text-accent dark:text-white">{{$item->name}}</span>
              </a>
              <!-- <span
                             class="flex items-center whitespace-nowrap rounded-md border border-jacarta-100 py-1 px-2 dark:border-jacarta-600"
                           >
                             <span data-tippy-content="ETH">
                               <svg
                                 version="1.1"
                                 xmlns="http://www.w3.org/2000/svg"
                                 x="0"
                                 y="0"
                                 viewBox="0 0 1920 1920"
                                 xml:space="preserve"
                                 class="h-4 w-4"
                               >
                                 <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z" />
                                 <path
                                   fill="#62688F"
                                   d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z"
                                 />
                                 <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z" />
                                 <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z" />
                                 <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z" />
                               </svg>
                             </span>
                             <span class="text-sm font-medium tracking-tight text-green">1.55 ETH</span>
                           </span> -->
            </div>
            <div class="mt-2 text-sm">
            </div>

            <div class="mt-8 flex items-center justify-between">
              <button
                type="button"
                class="font-display text-sm font-semibold text-accent"
                data-bs-toggle="modal"
                data-bs-target="#placeBidModal">
                Preview
              </button>

              <div class="flex items-center space-x-1">
                <span
                  class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('template/src/img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                  data-tippy-content="Favorite">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="h-4 w-4 fill-jacarta-500 hover:fill-red dark:fill-jacarta-200 dark:hover:fill-red">
                    <path fill="none" d="M0 0H24V24H0z" />
                    <path
                      d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z" />
                  </svg>
                </span>
                <span class="text-sm dark:text-jacarta-200">159</span>
              </div>
            </div>
          </div>
        </article>
      </div>
      @endforeach



    </div>
  </div>

  <div class="px-[12px] md:px-[36px] mt-[70px] xl:px-0 text-center mx-auto max-w-[905px]"> <span class="font-chivo inline-block bg-bg-2 text-orange-900 py-[14px] px-[28px] rounded-[50px] text-[14px] leading-[14px] mb-4">Meningkatkan bisnis lewat kemasan</span>
    <div class="text-center mb-[88px]">
      <h2 class="font-bold font-chivo mx-auto text-[35px] leading-[44px] md:text-[46px] md:leading-[52px] lg:text-heading-1 text-gray-900 mb-5 md:mb-[30px] max-w-[725px]">Tingkatkan Performa Bisnis Kamu </h2>
      <p class="text-quote md:text-lead-lg text-gray-600 mx-auto max-w-[976px]">
      </p>
    </div>
    <div class="flex flex-col gap-5 items-center justify-center relative md:flex-wrap md:flex-row lg:gap-[30px] xl:gap-[110px]">
      <div class="rounded-2xl p-[30px] md:py-[20px] md:px-[53px] self-stretch relative bg-bg-2 md:w-[calc(50%-20px)] lg:w-[calc(33.33%-30px)] xl:w-[calc(33.33%-75px)] transition-all duration-300 hover:translate-y-[-3px]">
        <div class="bg-white rounded-full grid place-items-center mx-auto mb-8 w-[80px] h-[80px]"><img class="max-w-[36px]" src="/agency/assets/images/icons/icon-dharma-wheel.svg" alt="icon"></div>
        <h4 class="font-bold font-chivo text-[14px] xl:text-heading-5 mb-[15px]">Daftar
        </h4>
        <p class="text-text text-gray-500">Isi Data UMKM yang tersedia
        </p><img class="hidden absolute right-0 lg:block top-1/2 translate-x-[30px] z-[-1] xl:translate-x-full xl:right-[-15px]" src="/agency/assets/images/icons/icon-arrow-1.svg" alt="direction arrow">
      </div>
      <div class="rounded-2xl p-[30px] md:py-[20px] md:px-[53px] self-stretch relative bg-bg-3 md:w-[calc(50%-20px)] lg:w-[calc(33.33%-30px)] xl:w-[calc(33.33%-75px)] transition-all duration-300 hover:translate-y-[-3px]">
        <div class="bg-white rounded-full grid place-items-center mx-auto mb-8 w-[80px] h-[80px]"><img class="max-w-[36px]" src="/agency/assets/images/icons/icon-wave.svg" alt="icon"></div>
        <h4 class="font-bold font-chivo text-[14px] xl:text-heading-5 mb-[15px]">Verifikasi
        </h4>
        <p class="text-text text-gray-500">Verifikasi Data UMKM
        </p><img class="hidden absolute right-0 lg:block top-1/2 translate-x-[30px] z-[-1] xl:translate-x-full xl:right-[-15px]" src="/agency/assets/images/icons/icon-arrow-2.svg" alt="direction arrow">
      </div>
      <div class="rounded-2xl p-[30px] md:py-[20px] md:px-[53px] self-stretch relative bg-bg-5 md:w-[calc(50%-20px)] lg:w-[calc(33.33%-30px)] xl:w-[calc(33.33%-75px)] transition-all duration-300 hover:translate-y-[-3px]">
        <div class="bg-white rounded-full grid place-items-center mx-auto mb-8 w-[80px] h-[80px]"><img class="max-w-[36px]" src="/agency/assets/images/icons/icon-headphones.svg" alt="icon"></div>
        <h4 class="font-bold font-chivo text-[14px] xl:text-heading-5 mb-[15px]">Desain
        </h4>
        <p class="text-text text-gray-500">Pilih Desain yang sesuai
        </p><img class="hidden absolute right-0 top-full lg:block translate-x-[-60px] z-[-1] xl:translate-y-[30px]" src="/agency/assets/images/icons/icon-arrow-3.svg" alt="direction arrow">
      </div>
      <div class="rounded-2xl p-[30px] md:py-[20px] md:px-[53px] self-stretch relative bg-bg-9 md:w-[calc(50%-20px)] lg:w-[calc(33.33%-30px)] xl:w-[calc(33.33%-75px)] transition-all duration-300 hover:translate-y-[-3px] lg:order-1">
        <div class="bg-white rounded-full grid place-items-center mx-auto mb-8 w-[80px] h-[80px]"><img class="max-w-[36px]" src="/agency/assets/images/icons/icon-trees.svg" alt="icon"></div>
        <h4 class="font-bold font-chivo text-[14px] xl:text-heading-5 mb-[15px]">Export
        </h4>
        <p class="text-text text-gray-500">Export Desain yang sudah dibuat
        </p><img class="hidden absolute left-0 lg:block top-1/2 translate-x-[-30px] z-[-1] xl:-translate-x-full xl:left-[-15px]" src="/agency/assets/images/icons/icon-arrow-4.svg" alt="direction arrow">
      </div>
      <div class="rounded-2xl p-[30px] md:py-[20px] md:px-[53px] self-stretch relative bg-bg-5 md:w-[calc(50%-20px)] lg:w-[calc(33.33%-30px)] xl:w-[calc(33.33%-75px)] transition-all duration-300 hover:translate-y-[-3px]">
        <div class="bg-white rounded-full grid place-items-center mx-auto mb-8 w-[80px] h-[80px]"><img class="max-w-[36px]" src="/agency/assets/images/icons/icon-flower.svg" alt="icon"></div>
        <h4 class="font-bold font-chivo text-[14px] xl:text-heading-5 mb-[15px]">Order
        </h4>
        <p class="text-text text-gray-500">Order Desain yang sudah dibuat
        </p>
      </div>
    </div>
  </div>
  <div class="px-[12px] md:px-[36px] mt-[70px] xl:px-0 md:mt-[150px]">
  </div>
  <div class="px-[12px] py-16 md:px-[36px] mt-[70px] xl:px-0">
    <div class="items-center justify-between md:flex mb-[30px] md:mb-[90px]">
      <div class="mb-8">
        <h2 class="text-gray-900 font-bold font-chivo mb-5 text-[35px] leading-[44px] md:text-[46px] md:leading-[52px] lg:text-heading-1 md:mb-[30px] max-w-[725px]">Testimoni Myopia </h2>
        <p class="text-quote md:text-lead-lg text-gray-600">Mengatahui tentang beberapa client yang bekerjasama
        </p>
      </div>
      <div class="flex items-center gap-5">
        <div class="grid place-items-center border border-gray-200 bg-gray-100 rounded-full cursor-pointer group transition-colors duration-200 w-[48px] xl:w-[64px] h-[48px] xl:h-[64px] hover:bg-gray-900 feedback-prev"><img class="group-hover:filter-white" src="agency/assets/images/icons/icon-prev.svg" alt="control icon button"></div>
        <div class="grid place-items-center border border-gray-200 bg-gray-100 rounded-full cursor-pointer group transition-colors duration-200 w-[48px] xl:w-[64px] h-[48px] xl:h-[64px] hover:bg-gray-900 feedback-next"><img class="group-hover:filter-white" src="agency/assets/images/icons/icon-next.svg" alt="control icon button"></div>
      </div>
    </div>
    <div class="feedback-list ml-[-15px]">
      <div class="border p-10 transition-all duration-300 border-[10px] mx-[15px] hover:translate-y-[-2px] mt-[2px] border-bg-4"><img class="h-full w-full object-cover w-[55px] h-[55px] mb-[22px]" src="agency/assets/images/avatar-1.png" alt="avatar">
        <p class="text-heading-6 font-chivo font-bold mb-[6px]">Pramudita Ahmad</p>
        <p class="text-sm font-bold mb-5 text-gray-700">Astacode</p>
        <p class="text-text text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis itaque natus nostrum temporibus dolorum minima.
        </p>
      </div>
      <div class="border p-10 transition-all duration-300 border-[10px] mx-[15px] hover:translate-y-[-2px] mt-[2px] border-bg-6"><img class="h-full w-full object-cover w-[55px] h-[55px] mb-[22px]" src="agency/assets/images/avatar-2.png" alt="avatar">
        <p class="text-heading-6 font-chivo font-bold mb-[6px]">Pramudita Ahmad</p>
        <p class="text-sm font-bold mb-5 text-gray-700">Astacode</p>
        <p class="text-text text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis itaque natus nostrum temporibus dolorum minima.
        </p>
      </div>
      <div class="border p-10 transition-all duration-300 border-[10px] mx-[15px] hover:translate-y-[-2px] mt-[2px] border-bg-10"><img class="h-full w-full object-cover w-[55px] h-[55px] mb-[22px]" src="agency/assets/images/avatar-3.png" alt="avatar">
        <p class="text-heading-6 font-chivo font-bold mb-[6px]">Pramudita Ahmad</p>
        <p class="text-sm font-bold mb-5 text-gray-700">Astacode</p>
        <p class="text-text text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis itaque natus nostrum temporibus dolorum minima.
        </p>
      </div>
      <div class="border p-10 transition-all duration-300 border-[10px] mx-[15px] hover:translate-y-[-2px] mt-[2px] border-bg-9"><img class="h-full w-full object-cover w-[55px] h-[55px] mb-[22px]" src="agency/assets/images/avatar-4.png" alt="avatar">
        <p class="text-heading-6 font-chivo font-bold mb-[6px]">Pramudita Ahmad</p>
        <p class="text-sm font-bold mb-5 text-gray-700">Astacode</p>
        <p class="text-text text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis itaque natus nostrum temporibus dolorum minima.
        </p>
      </div>
      <div class="border p-10 transition-all duration-300 border-[10px] mx-[15px] hover:translate-y-[-2px] mt-[2px] border-bg-4"><img class="h-full w-full object-cover w-[55px] h-[55px] mb-[22px]" src="agency/assets/images/avatar-5.png" alt="avatar">
        <p class="text-heading-6 font-chivo font-bold mb-[6px]">Pramudita Ahmad</p>
        <p class="text-sm font-bold mb-5 text-gray-700">Astacode</p>
        <p class="text-text text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis itaque natus nostrum temporibus dolorum minima.
        </p>
      </div>
      <div class="border p-10 transition-all duration-300 border-[10px] mx-[15px] hover:translate-y-[-2px] mt-[2px] border-bg-6"><img class="h-full w-full object-cover w-[55px] h-[55px] mb-[22px]" src="agency/assets/images/avatar-6.png" alt="avatar">
        <p class="text-heading-6 font-chivo font-bold mb-[6px]">Pramudita Ahmad</p>
        <p class="text-sm font-bold mb-5 text-gray-700">Astacode</p>
        <p class="text-text text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis itaque natus nostrum temporibus dolorum minima.
        </p>
      </div>
      <div class="border p-10 transition-all duration-300 border-[10px] mx-[15px] hover:translate-y-[-2px] mt-[2px] border-bg-10"><img class="h-full w-full object-cover w-[55px] h-[55px] mb-[22px]" src="agency/assets/images/avatar-7.png" alt="avatar">
        <p class="text-heading-6 font-chivo font-bold mb-[6px]">Pramudita Ahmad</p>
        <p class="text-sm font-bold mb-5 text-gray-700">Astacode</p>
        <p class="text-text text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis itaque natus nostrum temporibus dolorum minima.
        </p>
      </div>
      <div class="border p-10 transition-all duration-300 border-[10px] mx-[15px] hover:translate-y-[-2px] mt-[2px] border-bg-9"><img class="h-full w-full object-cover w-[55px] h-[55px] mb-[22px]" src="agency/assets/images/avatar-8.png" alt="avatar">
        <p class="text-heading-6 font-chivo font-bold mb-[6px]">Pramudita Ahmad</p>
        <p class="text-sm font-bold mb-5 text-gray-700">Astacode</p>
        <p class="text-text text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis itaque natus nostrum temporibus dolorum minima.
        </p>
      </div>
    </div>
  </div>

  <div class="px-[12px]  md:px-[36px] mt-[70px] xl:px-0 mt-[30px] md:mt-[80px] lg:mt-[143px]">
    <h2 class="font-bold font-chivo text-[25px] leading-[30px] md:text-heading-3 text-center mb-[40px] md:mb-[60px] lg:mb-[84px]">Mitra Kami
    </h2>
    <div class="flex flex-wrap items-center justify-around mb-[30px] md:mb-[60px] lg:mb-[80px]">
      <a class="transition-all duration-300 partner-item p-[15px] md:pr-[15px] xl:w-auto lg:w-[184px] hover:translate-y-[-3px]" href="/"><img src="{{asset('upload/mitra/mitra1.png')}}" alt="partner logo" class="w-32"></a>
      <a class="transition-all duration-300 partner-item p-[15px] md:pr-[15px] xl:w-auto lg:w-[184px] hover:translate-y-[-3px]" href="/"><img src="{{asset('upload/mitra/mitra2.jpg')}}" alt="partner logo" class="w-32"></a>
      <a class="transition-all duration-300 partner-item p-[15px] md:pr-[15px] xl:w-auto lg:w-[184px] hover:translate-y-[-3px]" href="/"><img src="{{asset('upload/mitra/mitra3.png')}}" alt="partner logo" class="w-32"></a>
      <a class="transition-all duration-300 partner-item p-[15px] md:pr-[15px] xl:w-auto lg:w-[184px] hover:translate-y-[-3px]" href="/"><img src="{{asset('upload/mitra/mitra4.jpg')}}" alt="partner logo" class="w-32"></a>
      <a class="transition-all duration-300 partner-item p-[15px] md:pr-[15px] xl:w-auto lg:w-[184px] hover:translate-y-[-3px]" href="/"><img src="{{asset('upload/mitra/mitra5.png')}}" alt="partner logo" class="w-32"></a>
    </div>
  </div>
  <div class="px-[12px] pb-20 md:px-[36px] mt-[70px] xl:px-0 lg:mt-[150px]">
    <div class="bg-gray-100 relative p-[40px] md:pt-[91px] md:pr-[98px] md:pb-[86px] md:pl-[92px] rounded-[58px]">
      <div class="mx-auto relative max-w-[1320px]"><img class="absolute right-0 max-w-[129px] top-[-50px]" src="agency/assets/images/mail.png" alt="mail image">
        <p class="text-capitalized text-gray-500 uppercase tracking-[2px] mb-[15px]">Contact us</p>
        <h2 class="font-bold font-chivo text-[25px] leading-[30px] md:text-heading-3 mb-[22px]">Mempunyai pertanyaan?
        </h2>
        <p class="text-text text-gray-600 mb-[30px] md:mb-[60px]">Kami akan membantu anda dalam pengembangan bisnis anda
        </p>
        <div class="flex flex-col gap-8 mb-[15px] md:mb-[25px] lg:flex-row lg:gap-[50px] xl:gap-[98px]">
          <div>
            <div class="flex gap-[13px] mb-[15px] md:mb-[25px]"> <i> <img src="agency/assets/images/icons/icon-home-fill.svg" alt="home icon"></i>
              <p class="text-heading-6 font-bold font-chivo">Myopia</p>
            </div>
            <p class="text-text text-gray-600">4517 Washington Ave.
            </p>
            <p class="text-text text-gray-600 mb-[10px] md:mb-[16px]">Garut, Kentucky 39495
            </p>
            <p class="text-text text-gray-600 underline">(239) 555-0108
            </p>
            <p class="text-text text-gray-600 underline">contact@myopia.com
            </p>
          </div>
          <form class="flex-1" action="/">
            <div class="flex flex-col gap-6 mb-6 lg:flex-row xl:gap-[30px]">
              <input class="outline-none flex-1 placeholder:text-gray-400 placeholder:text-md placeholder:font-chivo py-5 px-[30px]" type="text" placeholder="Enter your name">
              <input class="outline-none flex-1 placeholder:text-gray-400 placeholder:text-md placeholder:font-chivo py-5 px-[30px]" type="text" placeholder="Company (optional)">
            </div>
            <div class="flex flex-col gap-6 mb-6 lg:flex-row xl:gap-[30px]">
              <input class="outline-none flex-1 placeholder:text-gray-400 placeholder:text-md placeholder:font-chivo py-5 px-[30px]" type="text" placeholder="Your email">
              <input class="outline-none flex-1 placeholder:text-gray-400 placeholder:text-md placeholder:font-chivo py-5 px-[30px]" type="text" placeholder="Phone number">
            </div>
            <textarea class="w-full py-5 resize-none outline-0 px-[30px] max-h-[150px] mb-[35px] md:mb-[56px]" name="" cols="100" rows="10" placeholder="Tell us about yourself"></textarea>
            <div class="flex flex-col gap-5">
              <button class="flex items-center transition-colors duration-200 px-[22px] py-[15px] lg:px-[32px] lg:py-[22px] rounded-[50px] font-chivo font-semibold text-md md:text-lg text-white bg-gray-900 w-fit" type="submit">Send Message<i> <img class="ml-[7px] w-[12px] filter-white" src="agency/assets/images/icons/icon-right.svg" alt="arrow right icon"></i>
              </button>
              <p class="text-md text-gray-500">By clicking contact us button, you agree our terms and policy,</p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="rounded-2xl p-[30px] md:py-[53px] md:px-[48px] gap-5 mx-auto bg-bg-6 px-[15px] py-[50px] md:flex md:px-[52px] md:py-[72px] lg:gap-[40px] lg:h-[420px] xl:h-[390px] max-w-[1190px]">
    <div class="flex-1 mb-[30px]">
      <p class="text-capitalized uppercase text-gray-500 tracking-[2px] mb-[13px]">newsletter</p>
      <h4 class="font-bold font-chivo text-[28px] leading-[32px] md:text-heading-2 mb-[20px]">Dapatkan Informasi terbaru</h4>
      <p class="text-text text-gray-500">Dengan ngirim kamu setuju dengan
      </p><a class="text-green-900" href="/">Ketentuan & Kebijakan</a>
      <form class="mt-[30px]" action="/">
        <div class="bg-white flex items-center justify-between p-3 rounded-[55px]">
          <input class="ml-[25px] w-[80%] border-none" type="text" placeholder="Enter your mail ...">
          <button class="rounded-full bg-green-900 grid place-items-center w-[56px] h-[56px]" type="submit"> <img class="filter-white" src="agency/assets/images/icons/icon-right.svg" alt=""></button>
        </div>
      </form>
    </div>
    <div class="relative flex-1"> <img class="h-full w-full object-cover rounded-2xl img-shadow lg:absolute lg:max-w-[332px] lg:h-[403px] lg:right-0" src="https://as1.ftcdn.net/v2/jpg/04/23/72/40/1000_F_423724053_V8czoVpPBpQWF7SYnbsJ6DsdKpJPcWax.jpg" alt="Agon"><img class="h-full w-full object-cover absolute animate-float w-[225px] h-[170px] rounded-[14px] bottom-[-20px] left-[-10px]" src="agency/assets/images/chart.png" alt="Agon">
    </div>
  </div>

</div>
@endsection