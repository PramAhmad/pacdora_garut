@extends("front.layouts.app")
@section("content")
<main class="py-[135px]">
  <!-- <div class="py-[100px]"></div> -->
  <div class="xl:px-24 ">

    <div class="flex flex-col">
      <div class="relative w-full py-[20px]">
        <div class=" z-1">

          <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-10 mb-4">

            <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-4 xl:col-span-3">
              <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl rounded-2xl shadow-lg w-full relative p-4 mb-4">
                <h3 class="text-accent text-left text-xl font-semibold">Category</h3>
              </div>

              <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
                <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-12 xl:col-span-12">
                  <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl rounded-2xl shadow-lg w-full relative p-4">
                    <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
                      <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 xl:col-span-2">
                        <img src="{{ $category->image }}" alt="" class="max-w-30px h-auto rounded-xl">
                      </div>
                      <div class="col-span-12 sm:col-span-8 md:col-span-6 lg:col-span-8 xl:col-span-10">
                        <div class="h-full flex flex-col p-3">
                          <a href="#" class="subcategory-link text-base font-semibold text-gray-600 dark:text-slate-200 block leading-5 truncate hover:underline hover:underline-offset-[4px] {{ request()->is('category/'.$category->key) ? 'text-accent' : '' }}">
                            Semua Kategori
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @forelse ($category->subcategory as $sub)
              <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
                <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-12 xl:col-span-12">
                  <div class="bg-white dark:bg-gray-800/40 backdrop-blur-2xl rounded-2xl shadow-lg w-full relative p-4">
                    <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
                      <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 xl:col-span-2">
                        <img src="{{ $sub->image }}" alt="" class="max-w-30px h-auto rounded-xl">
                      </div>
                      <div class="col-span-12 sm:col-span-8 md:col-span-6 lg:col-span-8 xl:col-span-10">
                        <div class="h-full flex flex-col p-3">
                          <a href="#" class="subcategory-link text-base font-semibold text-gray-600 dark:text-slate-200 block leading-5 truncate hover:underline hover:underline-offset-[4px] {{ request()->is('subcategory/'.$sub->key) ? 'text-accent' : '' }}" data-key="{{ $sub->key }}">
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
              <div class="grid grid-cols-1 gap-[1.875rem] md:grid-cols-2 lg:grid-cols-3" id="category-items">

                @include('front.category.items', ['items' => $model])

              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
</main>
<!-- import jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- handle realtime sub category -->
<script>
  $(document).ready(function() {
    $('a[data-key]').on('click', function(e) {
      e.preventDefault();
      var key = $(this).data('key');
      $.ajax({
        url: '/subcategory/' + key,
        method: 'GET',
        success: function(response) {
          $('#category-items').html(response.items);
        }
      });
    });
  });
</script>
@endsection