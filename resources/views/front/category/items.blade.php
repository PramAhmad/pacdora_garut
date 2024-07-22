<div class="grid grid-cols-1 gap-[1.875rem] md:grid-cols-2 lg:grid-cols-3 pb-10" >
@forelse ($items as $m)
    <article>
        <div class="block rounded-2.5xl border border-jacarta-100 bg-white p-[1.1875rem] transition-shadow hover:shadow-lg dark:border-jacarta-700 dark:bg-jacarta-700">
            <figure class="relative">
                <a href="/detail/{{$m->model}}">
                    <img src="{{ $m->image }}" alt="item 5" class="w-full h-[300px] rounded-[0.625rem]" loading="lazy" />
                </a>
                @if ($m->subimageone)
                    <div class="absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-1 dark:bg-jacarta-700">
                        <img src="{{ $m->subimageone }}" class="h-10" alt="">
                    </div>
                @endif
                @if ($m->subimagetwo)
                    <div class="absolute top-16 right-3 flex items-center space-x-1 rounded-md bg-white p-1 dark:bg-jacarta-700">
                        <img src="{{ $m->subimagetwo }}" class="h-10" alt="">
                    </div>
                @endif
                <div class="absolute left-3 -bottom-3">
                    <div class="flex -space-x-2">
                        @if ($m->flute)
                            
                        <a href="#">
                            <img src="{{ $m->flute }}" alt="creator" class="h-6 w-6 rounded-full border-2 border-white hover:border-accent dark:border-jacarta-600 dark:hover:border-accent"  />
                        </a>
                        @endif
                        @if ($m->white_board)
                            
                        <a href="">
                            <img src="{{ $m->white_board }}" alt="owner" class="h-6 w-6 rounded-full border-2 border-white hover:border-accent dark:border-jacarta-600 dark:hover:border-accent"  />
                        </a>
                        @endif
                    </div>
                </div>
            </figure>
            <div class="mt-7 flex items-center justify-between">
                <a href="/detail/{{$m->model}}">
                    <span class="font-display text-base text-jacarta-700 hover:text-accent dark:text-white">{{ $m->title }}</span>
                </a>
                <div class="dropup rounded-full hover:bg-jacarta-100 dark:hover:bg-jacarta-600">
                    <a href="#" class="dropdown-toggle inline-flex h-8 w-8 items-center justify-center text-sm" role="button" id="itemActions" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg width="16" height="4" viewBox="0 0 16 4" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-jacarta-500 dark:fill-jacarta-200">
                            <circle cx="2" cy="2" r="2" />
                            <circle cx="8" cy="2" r="2" />
                            <circle cx="14" cy="2" r="2" />
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl dark:bg-jacarta-800" aria-labelledby="itemActions">
                        <button class="block w-full rounded-xl px-5 py-2 text-left font-display text-sm transition-colors hover:bg-jacarta-50 dark:text-white dark:hover:bg-jacarta-600">
                            New bid
                        </button>
                        <hr class="my-2 mx-4 h-px border-0 bg-jacarta-100 dark:bg-jacarta-600" />
                        <button class="block w-full rounded-xl px-5 py-2 text-left font-display text-sm transition-colors hover:bg-jacarta-50 dark:text-white dark:hover:bg-jacarta-600">
                            Refresh Metadata
                        </button>
                        <button class="block w-full rounded-xl px-5 py-2 text-left font-display text-sm transition-colors hover:bg-jacarta-50 dark:text-white dark:hover:bg-jacarta-600">
                            Share
                        </button>
                        <button class="block w-full rounded-xl px-5 py-2 text-left font-display text-sm transition-colors hover:bg-jacarta-50 dark:text-white dark:hover:bg-jacarta-600">
                            Report
                        </button>
                    </div>
                </div>
            </div>
            <div class="mt-8 flex items-center justify-between">
                <button class="font-display text-sm font-semibold text-accent" data-bs-toggle="modal" data-bs-target="#buyNowModal">
                    Design
                </button>
            </div>
        </div>
    </article>
@empty
    <p>No items available.</p>
@endforelse
</div>
