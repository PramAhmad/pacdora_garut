@extends('front.layouts.app')

@section('content')
<div class="container">

    <div class="px-[12px] md:px-[36px] mt-[70px] xl:px-0 items-center lg:flex"> 
            <div class="lg:w-[70%] mb-[80px]"><span class="font-chivo inline-block bg-green-900 text-white py-[14px] px-[28px] rounded-[50px] text-[14px] leading-[14px] mb-[29px]">Myopia - Best Service</span>
              <h1 class="font-chivo font-bold lg:text-display-2 md:text-[64px] md:leading-[70px] sm:text-[50px] sm:leading-[58px] text-[40px] leading-[48px] mb-[54px]">Dampingi UMKM untuk Dokumentasi dan Pengembangan Bisnis
              </h1>
              <p class="text-quote md:text-lead-lg text-jacarta-500 pr-[40px] lg:pr-[150px] mb-[44px]">Kami adalah agensi kreatif yang berfokus pada pengembangan bisnis. Kami membantu bisnis Anda untuk berkembang dan meningkatkan penjualan melalui strategi digital yang tepat.
              </p>
              <div class="flex items-center justify-start mb-[50px]">
                <button type="button"> <a class="flex items-center inline-block z-10 relative transition-all duration-200 group px-[22px] py-[15px] lg:px-[32px] lg:py-[22px] rounded-md bg-jacarta-900 text-white hover:bg-jacarta-100 hover:text-jacarta-900 hover:-translate-y-[2px] text-white bg-black text-heading-6 tracking-wide mr-[22px]" href="#"><span class="block text-inherit w-full h-full rounded-md text-lg font-chivo font-semibold">Mulai</span><i> <img class="ml-[7px] w-[12px] filter-white group-hover:filter-black" src="agency/assets/images/icons/icon-right.svg" alt="arrow right icon"></i></a></button>
                <div class="flex items-center gap-3"><i> <img src="agency/assets/images/icons/icon-button.svg" alt=""></i><a class="text-base flex items-center font-chivo font-medium text-[18px] leading-[18px] gap-[5px]" href="/">Bagaimana</a>
                </div>
              </div>
            </div>
            <div class="hidden relative lg:block"><img class="relative z-10 animate-hero-thumb-sm-animation" src="agency/assets/images/hero-6.png" alt="Agon"><img class="absolute z-0 animate-float -right-1/4 top-[15%]" src="agency/assets/images/chart-1.png" alt="chart image"><img class="absolute animate-float top-1/2" src="agency/assets/images/icons/line-chart.svg" alt="line image"></div>
          </div>
          <div class="full-width bg-bg-6 z-50">
        <div class="px-[12px] md:px-[36px] mt-[70px] xl:px-0 mx-auto hidden !mt-0 max-w-[1320px] lg:flex gap-[30px] -translate-y-[30%]"> 
          <div class="rounded-2xl p-[20px] xl:p-[30px] border border-jacarta-200 bg-white group flex-1"><a class="flex flex-col justify-between h-full" href="#">
              <div class="flex items-center gap-4 mb-5">
                <div class="bg-opacity-20 rounded-full transition-all duration-200 grid place-items-center w-[40px] h-[40px] xl:w-[60px] xl:h-[60px] bg-[#0B7B3F] group-hover:bg-[#158E99]"><img class="rounded-full xl:p-[18px] max-w-[20px] xl:max-w-[60px] group-hover:filter-white" src="agency/assets/images/icons/icon-media.svg" alt=""></div>
                <h4 class="font-bold font-chivo text-[14px] xl:text-heading-5">Halal
                </h4>
              </div><img class="object-cover rounded-2xl aspect-[285/160]" src="agency/assets/images/thumbnail-3.png" alt="Agon"></a>
          </div>
          <div class="rounded-2xl p-[20px] xl:p-[30px] border border-jacarta-200 bg-white group flex-1"><a class="flex flex-col justify-between h-full" href="#">
              <div class="flex items-center gap-4 mb-5">
                <div class="bg-opacity-20 rounded-full transition-all duration-200 grid place-items-center w-[40px] h-[40px] xl:w-[60px] xl:h-[60px] bg-[#0B7B3F] group-hover:bg-[#158E99]"><img class="rounded-full xl:p-[18px] max-w-[20px] xl:max-w-[60px] group-hover:filter-white" src="agency/assets/images/icons/icon-account.svg" alt=""></div>
                <h4 class="font-bold font-chivo text-[14px] xl:text-heading-5">BPOM MD
                </h4>
              </div><img class="object-cover rounded-2xl aspect-[285/160]" src="agency/assets/images/thumbnail-4.png" alt="Agon"></a>
          </div>
          <div class="rounded-2xl p-[20px] p-[30px] border border-jacarta-200 group bg-white flex-[1.4]"><a class="flex h-full" href="#">
              <div class="flex flex-col gap-1">
                <div class="bg-opacity-20 rounded-full transition-all duration-200 w-[40px] h-[40px] xl:w-[60px] xl:h-[60px] bg-[#0B7B3F] group-hover:bg-green-900"><img class="rounded-full p-[8px] xl:p-[18px] max-w-[60px] group-hover:filter-white" src="agency/assets/images/icons/icon-business.svg" alt=""></div>
                <h4 class="font-bold font-chivo text-[14px] xl:text-heading-5">Haki
                </h4>
                <p class="text-jacarta-500 text-[14px] xl:text-lead-lg xl:mb-5 pr-10">Dokumen</p><img class="w-[18px]" src="agency/assets/images/icons/icon-right-arrow.svg" alt="arrow icon">
              </div><img class="object-cover rounded-2xl xl:max-h-[249px] xl:max-w-[188px] max-w-[50%]" src="agency/assets/images/thumbnail-2.png" alt="Agon"></a>
          </div>
          <div class="flex items-center gap-5">
            <div class="grid place-items-center border border-jacarta-200 bg-jacarta-100 rounded-full cursor-pointer group transition-colors duration-200 w-[48px] xl:w-[64px] h-[48px] xl:h-[64px] hover:bg-jacarta-900 undefined-prev"><img class="group-hover:filter-white" src="agency/assets/images/icons/icon-prev.svg" alt="control icon button"></div>
            <div class="grid place-items-center border border-jacarta-200 bg-jacarta-100 rounded-full cursor-pointer group transition-colors duration-200 w-[48px] xl:w-[64px] h-[48px] xl:h-[64px] hover:bg-jacarta-900 undefined-next"><img class="group-hover:filter-white" src="agency/assets/images/icons/icon-next.svg" alt="control icon button"></div>
          </div>
        </div>
      </div>
        
</div>
    
@endsection