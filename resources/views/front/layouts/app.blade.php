<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
  <meta charset="utf-8">
  <title>Home Page 5</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
  <link rel="icon" href="favicon-16x16.png" type="image/x-icon" sizes="16x16">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
  @vite('resources/css/app.css')
<!-- <link rel="stylesheet" href="{{asset('template/dist/css/style.css')}}"> -->
  <script src="{{asset('darkMode.bundle.js')}}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/languages/go.min.js"></script>
  <style>
    .select2.select2-container {
      width: 100% !important;
    }

    .select2.select2-container .select2-selection {
      border: 1px solid rgb(231 232 236);
      -webkit-border-radius: 7px;
      -moz-border-radius: 7px;
      border-radius: 7px;
      height: 55px;
      margin-bottom: 15px;
      outline: none !important;
      transition: all .15s ease-in-out;
    }

    .select2.select2-container .select2-selection .select2-selection__rendered {
      color: #333;
      line-height: 55px;
      padding-right: 33px;
    }

    .select2.select2-container .select2-selection .select2-selection__arrow {
      background: #f8f8f8;
      border-left: 1px solid rgb(231 232 236);
      -webkit-border-radius: 0 3px 3px 0;
      -moz-border-radius: 0 3px 3px 0;
      border-radius: 0 7px 7px 0;
      height: 53px;
      width: 33px;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
      background: #f8f8f8;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
      -webkit-border-radius: 0 3px 0 0;
      -moz-border-radius: 0 3px 0 0;
      border-radius: 0 3px 0 0;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--multiple {
      border: 1px solid #34495e;
    }

    .select2.select2-container .select2-selection--multiple {
      height: auto;
      min-height: 34px;
    }

    .select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
      margin-top: 0;
      height: 44px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__rendered {
      display: block;
      padding: 0 4px;
      line-height: 29px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice {
      background-color: #f8f8f8;
      border: 1px solid rgb(231 232 236);
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 9px;
      margin: 4px 4px 0 0;
      padding: 0 6px 0 22px;
      height: 44px;
      line-height: 44px;
      font-size: 12px;
      position: relative;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
      position: absolute;
      top: 0;
      left: 0;
      height: 46px;
      width: 46px;
      margin: 0;
      text-align: center;
      color: #e74c3c;
      font-weight: bold;
      font-size: 16px;
    }

    .select2-container .select2-dropdown {
      background: transparent;
      border: none;
      margin-top: -5px;
    }

    .select2-container .select2-dropdown .select2-search {
      padding: 0;
    }

    .select2-container .select2-dropdown .select2-search input {
      outline: none !important;
      border: 1px solid #34495e !important;
      border-bottom: none !important;
      padding: 8px 12px !important;
    }

    .select2-container .select2-dropdown .select2-results {
      padding: 0;
    }

    .select2-container .select2-dropdown .select2-results ul {
      background: #fff;
      border: 1px solid #34495e;
    }

    .select2-container .select2-dropdown .select2-results ul .select2-results__option--highlighted[aria-selected] {
      background-color: #3498db;
    }
    
  </style>
    <style>

.burger-icon {
    cursor: pointer;
    height: 20px;
    position: absolute;
    right: 13px;
    top: 50%;
    transform: translateY(-50%);
    width: 24px;
    z-index: 1002
}

@media (min-width:768px) {
    .burger-icon {
        right: 37px
    }
}

.burger-icon.burger-icon-white>span:after,
.burger-icon.burger-icon-white>span:before {
    background-color:black
}

.burger-icon>span {
    display: block;
    height: 2px;
    left: 0;
    position: absolute;
    width: 100%
}

.burger-icon>span:after,
.burger-icon>span:before {
    content: "";
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%
}

.burger-icon>span.burger-icon-top {
    top: 2px
}

.burger-icon>span.burger-icon-mid {
    top: 9px
}

.burger-icon>span.burger-icon-bottom {
    bottom: 2px
}

.burger-icon.burger-close {
    filter: invert(8%) sepia(34%) saturate(870%) hue-rotate(181deg) brightness(97%) contrast(98%) !important
}

@media screen and (max-width:1023.98px) {
    .burger-icon.burger-close {
        position: fixed;
        right: 10px;
        top: 20px
    }
}

.burger-icon.burger-close>span.burger-icon-top {
    display: none;
    opacity: 0
}

.burger-icon.burger-close>span.burger-icon-mid {
    top: 8px;
    transform: rotate(45deg)
}

.burger-icon.burger-close>span.burger-icon-bottom {
    bottom: 10px;
    transform: rotate(-45deg)
}

.burger-icon.burger-close>span.burger-icon-top {
    display: none;
    opacity: 0
}

.burger-icon.burger-close>span.burger-icon-mid {
    top: 8px;
    transform: rotate(45deg)
}

.burger-icon.burger-close>span.burger-icon-bottom {
    bottom: 10px;
    transform: rotate(-45deg)
}
@media (min-width:768px) {
    .menu{
      display: none;
    }
}
  </style>
  <link rel="stylesheet" href="{{asset('agency/app.min.css')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Chivo:wght@400;700;900&amp;family=Noto+Sans:wght@400;500;600;700;800&amp;display=swap">
  @stack('css')
</head>

<body class="overflow-x-hidden w-screen relative home-page-5">
<div class=""><a name="top"> </a>
      <div class="absolute top-0 left-0 w-screen h-full bg-opacity-80 hidden video-iframe bg-[#0b0b0b] z-[999999]">
        <div class="mx-auto video w-1/2">
          <div class="flex justify-end">
            <button class="text-white close-video text-[20px]" type="button" title="Close (Esc)">x</button>
          </div>
          <iframe class="aspect-video w-full" src="https://www.youtube.com/embed/oRI37cOPBQQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
      <div class="overlay"></div>
      <header class="h-auto full-width relative py-[15px] first-letter:lg:py-[26px]">
        <div class="px-[12px] md:px-[36px] mt-[70px] xl:px-0 flex items-center justify-between mx-auto relative !mt-0 max-w-[1320px]"><a class="flex" href="/"><img class="logo z-50 w-[60px]" src="{{asset('assets/img/logo.png')}}" alt="logo image"><span class="my-auto mx-2 font-bold text-jacarta-900">Myopia</span></a>
          <nav class="z-50 absolute hidden top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 lg:block"> 
            <ul class="navbar flex flex-col justify-center font-chivo gap-[34px] lg:flex-row">
              <li class="flex items-center group"><a class="hover:text-green-900 text-base font-inter menu-link lg:text-heading-6 mr-[7px]" href="/">Home</a>
               
              </li>
               
              </li>
              <li class="flex items-center group"><a class="hover:text-green-900 text-base font-inter menu-link lg:text-heading-6 mr-[7px]" href="/">Category Desain</a><i><img class="icon-caret group-hover:filter-green" src="agency/assets/images/icons/icon-caret.svg" alt="caret"></i>
                <ul class="menu-child translate-y-4 opacity-0 bg-white top-full z-50 py-2 grid menu-shadow -translate-x-6 translate-y-8 transition-all duration-200 pointer-events-none group-hover:pointer-events-auto lg:absolute rounded-[4px] group-hover:grid group-hover:opacity-100 before:content-[''] before:block before:absolute before:w-full before:h-12 before:top-[-35px] before:left-0 grid-cols-1 w-[185px]">
                  <li class="menu-child-item font-chivo group transition-all duration-200 py-[10px] px-[22px] hover:filter-green hover:pl-[25px] hover:opacity-100" data-menu="sv1"><a class="flex items-center text-[14px]" href="/services-1.html"><img class="opacity-40 w-[12px] h-[12px] mr-[8px] -translate-y-[1px]" src="agency/assets/images/icons/icon-gem.svg" alt=""><span class="whitespace-nowrap">Services 01</span></a></li>
                  <li class="menu-child-item font-chivo group transition-all duration-200 py-[10px] px-[22px] hover:filter-green hover:pl-[25px] hover:opacity-100" data-menu="sv2"><a class="flex items-center text-[14px]" href="/services-2.html"><img class="opacity-40 w-[12px] h-[12px] mr-[8px] -translate-y-[1px]" src="agency/assets/images/icons/icon-gem.svg" alt=""><span class="whitespace-nowrap">Services 02</span></a></li>
                  <li class="hr px-[22px]"> <span class="block bg-gray-100 w-full h-[1px] my-[5px]"></span></li>
                  <li class="menu-child-item font-chivo group transition-all duration-200 py-[10px] px-[22px] hover:filter-green hover:pl-[25px] hover:opacity-100" data-menu="p1"><a class="flex items-center text-[14px]" href="/pricing-1.html"><img class="opacity-40 w-[12px] h-[12px] mr-[8px] -translate-y-[1px]" src="agency/assets/images/icons/icon-database.svg" alt=""><span class="whitespace-nowrap">Pricing 01</span></a></li>
                  <li class="menu-child-item font-chivo group transition-all duration-200 py-[10px] px-[22px] hover:filter-green hover:pl-[25px] hover:opacity-100" data-menu="p2"><a class="flex items-center text-[14px]" href="/pricing-2.html"><img class="opacity-40 w-[12px] h-[12px] mr-[8px] -translate-y-[1px]" src="agency/assets/images/icons/icon-database.svg" alt=""><span class="whitespace-nowrap">Pricing 02</span></a></li>
                  <li class="hr px-[22px]"> <span class="block bg-gray-100 w-full h-[1px] my-[5px]"></span></li>
                  <li class="menu-child-item font-chivo group transition-all duration-200 py-[10px] px-[22px] hover:filter-green hover:pl-[25px] hover:opacity-100" data-menu="faqs1"><a class="flex items-center text-[14px]" href="/faqs-1.html"><img class="opacity-40 w-[12px] h-[12px] mr-[8px] -translate-y-[1px]" src="agency/assets/images/icons/icon-headset.svg" alt=""><span class="whitespace-nowrap">FAQS 01</span></a></li>
                  <li class="menu-child-item font-chivo group transition-all duration-200 py-[10px] px-[22px] hover:filter-green hover:pl-[25px] hover:opacity-100" data-menu="faqs2"><a class="flex items-center text-[14px]" href="/faqs-2.html"><img class="opacity-40 w-[12px] h-[12px] mr-[8px] -translate-y-[1px]" src="agency/assets/images/icons/icon-headset.svg" alt=""><span class="whitespace-nowrap">FAQS 02</span></a></li>
                  <li class="hr px-[22px]"> <span class="block bg-gray-100 w-full h-[1px] my-[5px]"></span></li>
                  <li class="menu-child-item font-chivo group transition-all duration-200 py-[10px] px-[22px] hover:filter-green hover:pl-[25px] hover:opacity-100" data-menu="career"><a class="flex items-center text-[14px]" href="/career.html"><img class="opacity-40 w-[12px] h-[12px] mr-[8px] -translate-y-[1px]" src="agency/assets/images/icons/icon-briefcase.svg" alt=""><span class="whitespace-nowrap">Career</span></a></li>
                  <li class="menu-child-item font-chivo group transition-all duration-200 py-[10px] px-[22px] hover:filter-green hover:pl-[25px] hover:opacity-100" data-menu="career-details"><a class="flex items-center text-[14px]" href="/career-details.html"><img class="opacity-40 w-[12px] h-[12px] mr-[8px] -translate-y-[1px]" src="agency/assets/images/icons/icon-briefcase.svg" alt=""><span class="whitespace-nowrap">Career Detials</span></a></li>
                </ul>
              </li>
          
              <li class="flex items-center group"><a class="hover:text-green-900 text-base font-inter menu-link lg:text-heading-6 mr-[7px]" href="/">Pendampingan</a></li>
              <li class="flex items-center group"><a class="hover:text-green-900 text-base font-inter menu-link lg:text-heading-6 mr-[7px]" href="/">Konsultasi</a></li>

             
            </ul>
          </nav>
          <div class="hidden xl:block">
      <!--login register -->
      <div class="flex items-center gap-8">
        @if (Auth::check())
          <a class="text-base font-inter text-white font-medium rounded-lg bg-accent p-2 px-3 hover:scale-105 transition duration-300" href="{{route('profile')}}">Dashboard</a>
          <!-- logout -->
          <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="text-base font-inter text-accent border-accent font-medium border rounded-lg p-2 px-3 hover:scale-105 transition duration-300" type="submit">Logout</button>
          </form>

         
        @else
          
        <a class="text-base font-inter text-white font-medium rounded-lg bg-accent p-2 px-3 hover:scale-105 transition duration-300" href="{{route('login')}}">Login</a>
        <a class="text-base font-inter text-accent border-accent font-medium border rounded-lg p-2 px-3 hover:scale-105 transition duration-300" href="{{route('register')}}">Register</a>
        @endif
      </div>
        </div>
        </div>
        <div  class="menu burger-icon burger-icon-white menu__icon"><span class="burger-icon-top"></span><span class="burger-icon-mid"> </span><span class="burger-icon-bottom"></span></div>
        <nav class="fixed top-0 right-0 bg-white flex flex-col h-screen nav-shadow overflow-y-scroll nav-mobile opacity-0 pointer-events-none transition-all duration-200 w-[380px] z-[100]">
          <div class="flex items-center border-b p-[15px] lg:p-[26px] gap-[10px] border-[#F2F4F7]"><img class="max-w-[50px]" src="agency/assets/images/avatar-9.png" alt="avatar">
            <div>
              <p class="font-bold">Hi! Steven</p>
              <p class="text-sm font-chivo text-gray-500">You have 5 new messages</p>
            </div>
          </div>
          <div class="p-[30px]">
            <ul class="font-chivo font-medium text-[16px] leading-[16px]">
              <li class="group menu-mobile-item py-[13px]">
                <div class="flex items-center justify-between transition-all duration-200 hover:text-green-900 hover:translate-x-[2px]">
                  <p>Home</p><img class="w-[18px] h-[18px]" src="agency/assets/images/icons/icon-angle-down-fill.svg" alt="angle icon">
                </div>
                <ul class="pl-5 menu-child hidden pt-[10px]">
                  <li class="text-md py-[10px]" id="hp1"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/">Homepage 01</a></li>
                  <li class="text-md py-[10px]" id="hp2"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/home-2.html">Homepage 02</a></li>
                  <li class="text-md py-[10px]" id="hp3"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/home-3.html">Homepage 03</a></li>
                  <li class="text-md py-[10px]" id="hp4"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/home-4.html">Homepage 04</a></li>
                  <li class="text-md py-[10px]" id="hp5"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/home-5.html">Homepage 05</a></li>
                  <li class="text-md py-[10px]" id="hp6"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/home-6.html">Homepage 06</a></li>
                  <li class="text-md py-[10px]" id="hp7"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/home-7.html">Homepage 07</a></li>
                  <li class="text-md py-[10px]" id="hp8"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/home-8.html">Homepage 08</a></li>
                </ul>
              </li>
              <li class="group menu-mobile-item py-[13px]">
                <div class="flex items-center justify-between transition-all duration-200 hover:text-green-900 hover:translate-x-[2px]">
                  <p>About</p><img class="w-[18px] h-[18px]" src="agency/assets/images/icons/icon-angle-down-fill.svg" alt="angle icon">
                </div>
                <ul class="pl-5 menu-child hidden pt-[10px]">
                  <li class="text-md py-[10px]" id="ab1"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/about-1.html">About 01</a></li>
                  <li class="text-md py-[10px]" id="ab2"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/about-2.html">About 02</a></li>
                  <li class="text-md py-[10px]" id="ab3"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/about-3.html">About 03</a></li>
                </ul>
              </li>
              <li class="group menu-mobile-item py-[13px]">
                <div class="flex items-center justify-between transition-all duration-200 hover:text-green-900 hover:translate-x-[2px]">
                  <p>Services</p><img class="w-[18px] h-[18px]" src="agency/assets/images/icons/icon-angle-down-fill.svg" alt="angle icon">
                </div>
                <ul class="pl-5 menu-child hidden pt-[10px]">
                  <li class="text-md py-[10px]" id="sv1"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/services-1.html">Services 01</a></li>
                  <li class="text-md py-[10px]" id="sv2"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/services-2.html">Services 02</a></li>
                  <li class="text-md py-[10px]" id="p1"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/pricing-1.html">Pricing 01</a></li>
                  <li class="text-md py-[10px]" id="p2"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/pricing-2.html">Pricing 02</a></li>
                  <li class="text-md py-[10px]" id="faqs1"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/faqs-1.html">FAQS 01</a></li>
                  <li class="text-md py-[10px]" id="faqs2"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/faqs-2.html">FAQS 02</a></li>
                  <li class="text-md py-[10px]" id="career"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/career.html">Career</a></li>
                  <li class="text-md py-[10px]" id="career-details"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/career-details.html">Career Detials</a></li>
                </ul>
              </li>
              <li class="group menu-mobile-item py-[13px]">
                <div class="flex items-center justify-between transition-all duration-200 hover:text-green-900 hover:translate-x-[2px]">
                  <p>Pages</p><img class="w-[18px] h-[18px]" src="agency/assets/images/icons/icon-angle-down-fill.svg" alt="angle icon">
                </div>
                <ul class="pl-5 menu-child hidden pt-[10px]">
                  <li class="text-md py-[10px]" id="contact"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/contact.html">Contact</a></li>
                  <li class="text-md py-[10px]" id="singup"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/signup.html">Sign Up</a></li>
                  <li class="text-md py-[10px]" id="login"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/login.html">Log In</a></li>
                  <li class="text-md py-[10px]" id="rp"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/reset-password.html">Reset Password</a></li>
                  <li class="text-md py-[10px]" id="error404"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/error-404.html">Error 404</a></li>
                </ul>
              </li>
              <li class="group menu-mobile-item py-[13px]">
                <div class="flex items-center justify-between transition-all duration-200 hover:text-green-900 hover:translate-x-[2px]">
                  <p>Blog</p><img class="w-[18px] h-[18px]" src="agency/assets/images/icons/icon-angle-down-fill.svg" alt="angle icon">
                </div>
                <ul class="pl-5 menu-child hidden pt-[10px]">
                  <li class="text-md py-[10px]" id="b1"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/blog-1.html">Blog 01</a></li>
                  <li class="text-md py-[10px]" id="b2"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/blog-2.html">Blog 02</a></li>
                  <li class="text-md py-[10px]" id="single"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/single.html">Blog Single</a></li>
                </ul>
              </li>
              <li class="group menu-mobile-item py-[13px]">
                <div class="flex items-center justify-between transition-all duration-200 hover:text-green-900 hover:translate-x-[2px]">
                  <p>Shop</p><img class="w-[18px] h-[18px]" src="agency/assets/images/icons/icon-angle-down-fill.svg" alt="angle icon">
                </div>
                <ul class="pl-5 menu-child hidden pt-[10px]">
                  <li class="text-md py-[10px]" id="s1"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/shop-1.html">Shop 01</a></li>
                  <li class="text-md py-[10px]" id="s2"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/shop-2.html">Shop 02</a></li>
                  <li class="text-md py-[10px]" id="product"><a class="block transition-all duration-200 hover:text-green-900 hover:translate-x-1" href="/single-product.html">Product Details</a></li>
                </ul>
              </li>
            </ul>
            <div class="mt-5 border-t border-b border-gray-100 pb-5 mb-[25px] pt-[30px]">
              <p class="font-bold text-heading-6 mb-[10px]">Your Account</p>
              <ul class="text-[15px]"> 
                <li class="py-[13px]"><a class="transition-all duration-200 hover:text-green-900 hover:translate-x-[2px]" href="/">Profile</a></li>
                <li class="py-[13px]"><a class="transition-all duration-200 hover:text-green-900 hover:translate-x-[2px]" href="/">Work Preferences</a></li>
                <li class="py-[13px]"><a class="transition-all duration-200 hover:text-green-900 hover:translate-x-[2px]" href="/">My Boosted Shots</a></li>
                <li class="py-[13px]"><a class="transition-all duration-200 hover:text-green-900 hover:translate-x-[2px]" href="/">My Collections</a></li>
                <li class="py-[13px]"><a class="transition-all duration-200 hover:text-green-900 hover:translate-x-[2px]" href="/">Account Settings</a></li>
                <li class="py-[13px]"><a class="transition-all duration-200 hover:text-green-900 hover:translate-x-[2px]" href="/">Go Pro</a></li>
                <li class="py-[13px]"><a class="transition-all duration-200 hover:text-green-900 hover:translate-x-[2px]" href="/">Sign Out</a></li>
              </ul>
            </div>
            <div class="text-gray-400 font-chivo text-[13px]">Copyright 2022 © Agon - Agency Template.<br><span>Designed by</span><a class="text-green-900" href="http://alithemes.com">&nbsp;AliThemes</a></div>
          </div>
        </nav>
      </header>
  <div class="">
    @yield('content')
 
   
  </div>
  <div class="container">

    <div class="bg fixed bottom-28 rounded-full grid place-items-center opacity-0 invisible transition-all duration-300 right-[20px] z-[9999] w-[48px] h-[48px]" id="backToTop"><a class="rounded-full bg-accent grid place-items-center w-[48px] h-[48px]" href="#top"><img src="/agency/assets/images/icons/icon-up.svg" alt="to top icon"></a></div>
    <footer class="mt-[92px] lg:mt-[150px] xl:mt-[200px] mb-[30px]">
      <div class="px-[12px] md:px-[36px] mt-[70px] xl:px-0">
        <div class="flex flex-col items-center gap-2 mb-14 md:flex-row md:justify-between"> <img class="h-full w-full object-cover max-w-[80px]" src="{{asset('assets/img/logo.png')}}" alt="logo">
          <div class="flex items-center flex-col gap-5 md:flex-row lg:gap-[30px]">
            <p class="text-heading-6 font-chivo font-bold">Ready to get started?</p>
            <button type="button"> <a class="flex items-center inline-block z-10 relative transition-all duration-200 group px-[22px] py-[15px] lg:px-[32px] lg:py-[22px] rounded-md bg-gray-900 text-white hover:bg-gray-100 hover:text-gray-900 hover:-translate-y-[2px] text-white bg-gray-900 w-fit" href="#"><span class="block text-inherit w-full h-full rounded-md text-lg font-chivo font-semibold">Create an Account</span></a></button>
          </div>
        </div>
        <div class="w-full bg-gray-200 h-[1px] mb-[52px]"></div>
        <div class="text-gray-600 grid gird-cols-1 gap-8 mb-[48px] md:grid-cols-2 lg:grid-cols-5 xl:gap-[98px]">
          <div>
            <h5 class="text-heading-5 font-chivo font-bold text-gray-900 mb-5 text-[18px]">Contact</h5>
            <p class="text-text mb-5">4517 Washington Ave. Manchester, Kentucky 39495
            </p>
            <p class="text-text underline">(239) 555-0108
            </p>
            <p class="text-text underline">contact@agon.com
            </p>
          </div>
          <div>
            <h5 class="text-heading-5 font-chivo font-bold text-gray-900 mb-5 text-[18px]">About Us</h5>
            <ul>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Mission &amp; Vision</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Our Team</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Careers</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Press &amp; Media</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Advertising</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Testimonials</a></li>
            </ul>
          </div>
          <div>
            <h5 class="text-heading-5 font-chivo font-bold text-gray-900 mb-5 text-[18px]">Discover</h5>
            <ul>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Our Blog</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Plans &amp; Pricing</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Knowledge Base</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Cookie Policy</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Office Center</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">News &amp; Events</a></li>
            </ul>
          </div>
          <div>
            <h5 class="text-heading-5 font-chivo font-bold text-gray-900 mb-5 text-[18px]">Support</h5>
            <ul>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">FAQs</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Editor Help</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Community</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Live Chatting</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Contact Us</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Support Center</a></li>
            </ul>
          </div>
          <div>
            <h5 class="text-heading-5 font-chivo font-bold text-gray-900 mb-5 text-[18px]">Useful links</h5>
            <ul>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Request an offer</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">How it works</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Pricing</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Reviews</a></li>
              <li class="mb-2"><a class="transition-all duration-200 hover:text-green-900 hover:pl-[3px]" href="/">Stories</a></li>
            </ul>
          </div>
        </div>
        <div class="w-full bg-gray-200 h-[1px] mb-[46px]"></div>
        <div class="text-gray-400 lg:flex lg:items-center lg:justify-between">
          <div class="md:flex md:items-center md:gap-6">
            <p class="text-lead font-bold">©Agon Official 2022
            </p>
            <div class="flex items-center justify-between md:gap-6"><a class="text-text" href="/">Privacy policy</a><a class="text-text" href="/">Cookies</a><a class="text-text" href="/">Terms of service</a></div>
          </div>
          <div class="flex items-center justify-center gap-5 mt-5 lg:mt-0"><a class="w-8 h-8 transition-all duration-300 hover:opacity-70 hover:-translate-y-1" href="/"><img class="h-full w-full object-cover" src="/agency/assets/images/icons/icon-facebook-green.svg" alt="facebook icon"></a><a class="w-8 h-8 transition-all duration-300 hover:opacity-70 hover:-translate-y-1" href="/"><img class="h-full w-full object-cover" src="/agency/assets/images/icons/icon-instagram-green.svg" alt="instagram icon"></a><a class="w-8 h-8 transition-all duration-300 hover:opacity-70 hover:-translate-y-1" href="/"><img class="h-full w-full object-cover" src="/agency/assets/images/icons/icon-twitter-green.svg" alt="twitter icon"></a><a class="w-8 h-8 transition-all duration-300 hover:opacity-70 hover:-translate-y-1" href="/"><img class="h-full w-full object-cover" src="/agency/assets/images/icons/icon-linkedin-green.svg" alt="linkedin icon"></a></div>
        </div>
      </div>
    </footer>
  </div>
  </div>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const Sliders = {
        initFullSlider: function() {
          const swiperThumbs = new Swiper(".full-slider-thumbs", {
            modules: [Swiper.Thumbs, Swiper.Autoplay, Swiper.Lazy],
            loop: true,
            slidesPerView: 2,
            breakpoints: {
              1024: {
                slidesPerView: 3
              }
            },
            freeMode: true,
            preloadImages: false,
            lazy: true,
            watchSlidesProgress: true
          });

          const swiper = new Swiper(".full-slider", {
            modules: [Swiper.Thumbs, Swiper.Autoplay, Swiper.Lazy],
            speed: 400,
            slidesPerView: 1,
            loop: true,
            preloadImages: false,
            lazy: true,
            autoplay: {
              delay: 5000,
              disableOnInteraction: false
            },
            thumbs: {
              swiper: swiperThumbs
            }
          });
        },
        initCenteredSlider: function() {
          const swiper = new Swiper(".centered-slider", {
            modules: [Swiper.Lazy],
            speed: 400,
            spaceBetween: 30,
            slidesPerView: 2,
            slidesPerGroup: 1,
            centeredSlides: true,
            breakpoints: {
              560: {
                slidesPerView: 2,
                slidesPerGroup: 2
              },
              768: {
                slidesPerView: 4
              },
              1024: {
                slidesPerView: 4
              },
              1280: {
                slidesPerView: 6
              }
            },
            loop: true,
            preloadImages: false,
            lazy: true
          });
        },
        initCardSlider: function() {
          const swiper = new Swiper(".card-slider-4-columns", {
            modules: [Navigation, Lazy],
            speed: 400,
            spaceBetween: 30,
            slidesPerView: 1,
            breakpoints: {
              560: {
                slidesPerView: 2,
                slidesPerGroup: 2
              },
              768: {
                slidesPerView: 3,
                slidesPerGroup: 3
              },
              1024: {
                slidesPerView: 3,
                slidesPerGroup: 3
              },
              1200: {
                slidesPerView: 4,
                slidesPerGroup: 4
              }
            },
            preloadImages: false,
            lazy: true,
            navigation: {
              nextEl: ".swiper-button-next-1",
              prevEl: ".swiper-button-prev-1"
            }
          })
        }

      };

      Sliders.initFullSlider();
      Sliders.initCenteredSlider();
      Sliders.initCardSlider()

    });
  </script>
  <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>

  <script type="text/javascript" src="agency/assets/scripts/vendors/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="agency/assets/scripts/vendors/slick.min.js"></script>
  <script src="agency/assets/scripts/app.js"></script>
  <script src="{{asset('template/dist/js/app.bundle.js')}}"></script>
  <script src="{{ asset('template/src/js/dark-mode.js') }}"></script>
  <script src="https://cdn.pacdora.com/Pacdora-v1.1.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  @stack('js')

</body>

</html>