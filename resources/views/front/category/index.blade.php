@extends("front.layouts.app")
@section("content")
<div style="display: inline-block" data-ui-tip="model-list">
            <h2 class="title" id="title"></h2>
          </div>
          <!-- The list of boxes for a specific category in Pacdora -->
          <div class="list pb60" id="list">
          @forelse ($category as $c )
                <a class="category-item" href="{{route('category',["mockupNameKey"=>$c->mockupNameKey])}}">
                    <div class="category-name">{{$c->name}}</div>
                    <img src="{{$c->icon}}" class="category-image"/>
                </a>
           @empty
            <div class="list-item skeleton-loading"></div>
            <div class="list-item skeleton-loading"></div>
            <div class="list-item skeleton-loading"></div>
            <div class="list-item skeleton-loading"></div>
          </div>
          @endforelse
@endsection