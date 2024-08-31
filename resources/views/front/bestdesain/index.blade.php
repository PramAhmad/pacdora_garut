@extends('front.layouts.app')
@section('content')
@push('css')
<link rel="stylesheet" href="{{asset("css/index.css")}}" />
<link rel="stylesheet" href="{{asset('css/base.css')}}">
<link rel="stylesheet" href="{{asset('agency/tailwind.min.css')}}">
    <!-- #region q-->
@endpush
<div class="container">
<div class="px-[12px] md:px-[36px] mt-[70px] xl:px-0 lg:mt-[111px]">
  <div class="text-center mb-[88px]">
      <h2 class="font-bold font-chivo mx-auto text-[35px] leading-[44px] md:text-[46px] md:leading-[52px] lg:text-heading-1 text-gray-900 mb-5 md:mb-[30px] max-w-[725px]">Desain Kemasan Terbaik </h2>
      <p class="text-quote md:text-lead-lg text-gray-600 mx-auto max-w-[976px]">
        Gunakan Desain Terbaik untuk meningkatkan penjualan produk anda
      </p>
    </div>
    <div class="list">
      @foreach ($bestdesain as  $b)
        
      <a class="list-item" href="{{route('detail',['modelId'=>$b->model_id])}}">
        <img
          src="{{$b->model->image}}" />
        <p>
          {{$b->model->title}}
        </p>
      </a>
      @endforeach

      
      
    </div>

     
  </div>
</div>
@endsection