@extends("front.layouts.app")

@section("content")
<main class="w-full max-w-7xl mx-auto">
  <div class="">
    <div class="flex flex-col">
      <div class="relative w-full py-[20px]">
        <div class="z-1">
          <div class="grid grid-cols-12 gap-10 mb-4">
            <div class="col-span-12 lg:col-span-4 xl:col-span-3 sticky top-4">
              <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl rounded-2xl shadow-lg w-full relative p-4 mb-4">
                <h3 class="text-accent text-left text-xl font-semibold">Category</h3>
              </div>
              <div class="grid grid-cols-12 gap-4 mb-4">
                <div class="col-span-12">
                  <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl rounded-2xl shadow-lg w-full relative p-4">
                    <div class="grid grid-cols-12 gap-4">
                      <div class="col-span-2">
                        <img src="{{ $category->image ?? '' }}" alt="" class="max-w-30px h-12 rounded-xl">
                      </div>
                      <div class="col-span-10">
                        <div class="h-full flex flex-col p-3">
                          <a href="/category/{{ $category->key ?? '' }}" class="text-base font-semibold text-gray-600 dark:text-slate-200 block leading-5 truncate hover:underline hover:underline-offset-[4px] {{ request()->is('category/'.($category->key ?? '')) ? 'text-accent' : '' }}" id="all-categories-link">
                            Semua SubKatagori
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @forelse ($category->subcategory ?? [] as $sub)
                <div class="grid grid-cols-12 gap-4 mb-4">
                  <div class="col-span-12">
                    <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl rounded-2xl shadow-lg w-full relative p-4">
                      <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-2">
                          <img src="{{ $sub->image }}" alt="" class="max-w-[3rem] h-12 rounded-xl">
                        </div>
                        <div class="col-span-10">
                          <div class="h-full flex flex-col p-3">
                            <a href="#" class="text-base font-semibold text-jacarta-600 dark:text-slate-200 block leading-5 truncate hover:underline hover:underline-offset-[4px] subcategory-link" data-key="{{ $sub->key }}">
                              {{ $sub->name }}
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @empty
                <p>No subcategories available.</p>
              @endforelse
            </div>

            <div class="col-span-9">
              <div id="category-items">
                @include('front.category.items_with_pagination', ['items' => $items])
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function loadContent(url) {
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#category-items').html(response.html);
                attachEventListeners();
                window.history.pushState({}, '', url);
            }
        });
    }

    function attachEventListeners() {
        $('a.subcategory-link').off('click').on('click', function(e) {
            e.preventDefault();
            var key = $(this).data('key');
            loadContent('/subcategory/' + key);

            $('a.subcategory-link').removeClass('text-accent');
            $('a#all-categories-link').removeClass('text-accent');
            $(this).addClass('text-accent');
        });

        $('a#all-categories-link').off('click').on('click', function(e) {
            e.preventDefault();
            loadContent('/category/{{ $category->key }}');

            $('a.subcategory-link').removeClass('text-accent');
            $(this).addClass('text-accent');
        });

        $(document).off('click', '.pagination a').on('click', '.pagination a', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            loadContent(url);
        });
    }

    attachEventListeners();
});
</script>
@endsection
